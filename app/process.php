<?php
date_default_timezone_set('Asia/Manila');

include("inc/class.db.php");
	
$db =  new Db();
$process = $_POST["process"] ? $_POST["process"] : $_GET["preview"];



	if($process == "getrates") {
		$now = date("Y-m-d h:m:s");
  		$date = date("Y-m-d h:m:s", strtotime('-1 Day'));

  		$cache_name = strtotime (date("Y-m-d h:00:00", strtotime('-1 Day'))) . ".txt"; //only the hour is added here, minutes and seconds were removed.


  		//check for cache
  		if(file_exists("cache/" . $cache_name)) {

  			file_put_contents("query.txt", PHP_EOL . "[" . date("h:s:i") . "] Cache is being used", FILE_APPEND);

  			$displayRates = json_decode(file_get_contents("cache/" . $cache_name), true);


  		} else {

  			$query = "SELECT * FROM btc_rates WHERE `timestamp` > '$date' GROUP BY hour( `timestamp` ) ORDER BY rates_id DESC LIMIT 24";
			$rates = $db->select($query);

			file_put_contents("query.txt", PHP_EOL . "[" . date("h:s:i") . "]" . $query, FILE_APPEND);
			//file_put_contents("query.txt", $query );

			$labels = "";
			$series = "";
			$timestamp = "";


			for ($i=0; $i < count($rates) / 2 ; $i++) { 
				$now = $rates[$i]["timestamp"];
	 			//$next_five = date("H:m A", strtotime( ceil( $now / 300 ) * 300 ));

	 			$displayRates["labels"][] = everyFifth($now, 5);
	 			$displayRates["timestamp"][] = $now;
	 			$bidding = $rates[$i]["rate_high"];
	 			$displayRates["series"]["A"][] = number_format($bidding,2,".","");
	 			$asking = $rates[($i+6)]["rate_high"];
	 			$displayRates["series"]["B"][] = number_format($asking,2,".",""); 

			}

			$query = "SELECT * FROM btc_rates ORDER BY rates_id DESC LIMIT 1";
			$recent = $db->select($query);

			$displayRates["recent"] = $recent[0];

			//create cache version
			file_put_contents("cache/" . $cache_name, json_encode($displayRates));

  		}

		
  		


		$r_labels = array_reverse($displayRates["labels"]);
		$r_seriesa = array_reverse($displayRates["series"]["A"]);
		$r_seriesb = array_reverse($displayRates["series"]["B"]);


		unset($r_labels[(count($r_labels) - 1 )]);
		unset($r_labels[(count($r_labels) - 1 )]);

		

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
						//"highest_bidding" => number_format(max($displayRates["series"]["A"]),2),
						//"lowest_bidding" => number_format(min($displayRates["series"]["A"]),2),
						"highest_asking" => number_format(max($displayRates["series"]["B"]),2),
						"lowest_asking" => number_format(min($displayRates["series"]["B"]),2),
						"current_bidding" => number_format($displayRates["recent"]["rate_high"],2),
						"current_asking" => number_format($displayRates["recent"]["rate_low"],2),
						"last_update" => time_elapsed_string($displayRates["recent"]["timestamp"]),
						"now" => $displayRates["recent"]["timestamp"],
						//"timestamp" => array_reverse($timestamp)

					),
				"query" => $query
				);

		

		http_response_code(200);
		echo json_encode($respond);


		//echo "<pre>";
		//print_r($rates);
		//echo "</pre>";

	} elseif( $process == "coins-validation" ) {
		$access_token = $db->quote($_POST["access_token"]);
		$db->query("INSERT INTO setters VALUES(0,'1774099995940292','coins-validation',$access_token)");
		echo json_encode(array("type" => "success", "message" => "data has been validated"));
	} else {
		http_response_code(404);
		exit();

		//for testing pusposes
		echo json_encode(array("type" => "error", "message" => "Unrecognized process!"));
	}

if($_SERVER["REQUEST_METHOD"] == "POST") {
} //end server request method

function everyFifth($timestring, $div = 60) {
	$hour = date('h', strtotime($timestring));
    $minutes = date('i', strtotime($timestring));
    //$indicator = date('A', strtotime($timestring));
    $everyFifth =  sprintf("%02d", $minutes - ($minutes % $div));

    //return $hour . ":" . $everyFifth . $indicator;
    return $hour . ":" . $everyFifth;
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