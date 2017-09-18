<?php
date_default_timezone_set('Asia/Manila');

	include("inc/class.db.php");



	
	$db =  new Db();
	$process = $_POST["process"] ? $_POST["process"] : $_GET["preview"];


	if($process == "getrates") {
		$now = date("Y-m-d h:m:s");
  		$date = date("Y-m-d h:m:s", strtotime('-12 hour'));

  		$query = "SELECT * FROM btc_rates WHERE `timestamp` > '$date' GROUP BY hour( `timestamp` ) ORDER BY rates_id DESC LIMIT 12";
		$rates = $db->select($query);

		file_put_contents("query.txt", PHP_EOL . $query, FILE_APPEND);

		$labels = "";
		$series = "";
		$timestamp = "";


		for ($i=0; $i < count($rates); $i++) { 
			$now = $rates[$i]["timestamp"];
 			$next_five = date("H:m A", strtotime( ceil( $now / 300 ) * 300 ));

 			$labels[] = everyFifth($now, 5);
 			$timestamp[] = $now;
 			$bidding = $rates[$i]["rate_high"];
 			$series["A"][] = number_format($bidding,2,".","");
 			$asking = $rates[$i]["rate_low"];
 			$series["B"][] = number_format($asking,2,".",""); 

		}


		$r_labels = array_reverse($labels);
		$r_seriesa = array_reverse($series["A"]);
		$r_seriesb = array_reverse($series["B"]);


		unset($r_labels[(count($r_labels) - 1 )]);
		unset($r_labels[(count($r_labels) - 1 )]);

		$query = "SELECT * FROM btc_rates ORDER BY rates_id DESC LIMIT 1";
		$recent = $db->select($query);

		$respond = array(
				"data" => array(
					"labels" => $r_labels, 
					"series" => array(
						$r_seriesa,
						$r_seriesb
						)
					),				
				"counts" => array(
						"labels" => count($r_labels),
						"seriesA" => count($r_seriesa),
						"seriesB" => count($r_seriesb),						
						"highest_bidding" => number_format(max($series["A"]),2),
						"lowest_bidding" => number_format(min($series["A"]),2),
						"highest_asking" => number_format(max($series["B"]),2),
						"lowest_asking" => number_format(min($series["B"]),2),
						"current_bidding" => number_format($recent[0]["rate_high"],2),
						"current_asking" => number_format($recent[0]["rate_low"],2),
						"last_update" => time_elapsed_string($recent[0]["timestamp"]),
						"now" => $recent[0]["timestamp"],
						//"timestamp" => array_reverse($timestamp)

					),
				"query" => $query
				);

		

		http_response_code(200);
		echo json_encode($respond);


		//echo "<pre>";
		//print_r($rates);
		//echo "</pre>";

	} else {
		echo json_encode(array("type" => "error", "message" => "process is not included"));
	}

if($_SERVER["REQUEST_METHOD"] == "POST") {
}

function everyFifth($timestring, $div = 60) {
	$hour = date('h', strtotime($timestring));
    $minutes = date('i', strtotime($timestring));
    $indicator = date('A', strtotime($timestring));
    $everyFifth =  sprintf("%02d", $minutes - ($minutes % $div));

    return $hour . ":" . $everyFifth . $indicator;
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? 'Updated ' . implode(', ', $string) . ' ago' : 'just now';
}