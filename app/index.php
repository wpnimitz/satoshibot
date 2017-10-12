<?php 

$title = "Dashboard - Satoshi Bot";
$active = "dashboard";
include("inc/header.php");
?>
	<div class="row">
		<div class="col-md-8">
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
        <div class="col-md-4">
        	<div class="card btc-update">
                <div class="header" data-color="purple" data-image="assets/img/bitcoin-update.jpg">
                    <h4 class="title">Bitcoin  Update</h4>
                    <p class="category">Base on coins.ph rates</p>
                </div>
                <div class="content">
                    <div class="table-full-width">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
										<b>Asking Rate</b>
										<div class="block asking-rate"> 
											<span class="asking-rate-price"></span>
											<span class="asking-rate-icon"></span>
										</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
										<b>Bidding Rate</b>
										<div class="block bidding-rate"> 
											<span class="bidding-rate-price"></span>
											<span class="bidding-rate-icon"></span>
										</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="footer">
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