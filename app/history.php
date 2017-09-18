<?php 

$title = "History - Satoshi Bot";
$active = "history";

include_once("inc/class.db.php");
$db = new Db();


$start = date("Y-m-01 00:00:00");
$end = date("Y-m-t 23:59:59");

$query = "SELECT *, DATE(timestamp) AS day, HOUR(timestamp) as now FROM btc_rates WHERE `timestamp` BETWEEN '$start' AND '$end' GROUP BY DATE(timestamp), floor(HOUR(timestamp)/24)";
$rates = $db->select($query);

include("inc/header.php");

?>
	<div class="row">
		<div class="col-md-12">
            <div class="card card-plain">
                <div class="header">
                    <h4 class="title">BTC Rates</h4>
                    <p class="category">This month BTC-PHP rates is listed here. Data from coins.ph</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Asking</th>
                            <th>Bidding</th>
                        </tr></thead>
                        <tbody>

                        <?php 
                        for ($i=0; $i < count($rates); $i++) { 
                            echo "<tr>";
                                echo "<td>" . date("M. jS, Y", strtotime($rates[$i]["timestamp"])) . "</td>";
                                echo "<td>" . date("h:i A", strtotime($rates[$i]["timestamp"])) . "</td>";
                                echo "<td>" . number_format($rates[$i]["rate_high"],2) . "</td>";
                                echo "<td>" . number_format($rates[$i]["rate_low"],2) . "</td>";
                                
                                
                            echo "</tr>";
                        }

                         ?>

                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Bitcoin PHP Rate</h4>
                    <p class="category">12 Hours performance</p>
                </div>
                <div class="content">
                    <div id="chartRates" class="ct-chart"></div>
                    <div class="footer">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Buying
                            <i class="fa fa-circle text-danger"></i> Selling
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>


<?php include("inc/footer.php"); ?>