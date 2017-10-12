<?php 

$title = "History - Satoshi Bot";
$active = "history";

include("inc/header.php");

?>
	<div class="row">
		<div class="col-md-12 coinsverification">
            <div class="card card-plain">
                <div class="header">
                    <h4 class="title">BTC Rates</h4>
                    <p class="category">This month BTC-PHP rates is listed here. Data from coins.ph</p>
                </div>
                <div class="content table-responsive table-full-width">

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Bitcoin PHP Rate</h4>
                    <p class="category">Latest 12 hours comparison. Updated every hour.</p>
                </div>
                <div class="content">
                    <div id="chartRates" class="ct-chart"></div>
                    <div class="footer">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Latest 12 hours
                            <i class="fa fa-circle text-danger"></i> Previous 12 hours
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>


<?php include("inc/footer.php"); ?>