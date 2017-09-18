<?php 

$title = "Alerts - Satoshi Bot";
$active = "alerts";
include("inc/header.php");
?>
	<div class="row">
		<div class="col-md-8">
            <div class="card ">
                <div class="header">
                    <h4 class="title">Alerts</h4>
                    <p class="category">Mark checked are active alerts.</p>
                </div>
                <div class="content">
                    <div class="table-full-width">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="checkbox">
                                            <input type="checkbox" value="" data-toggle="checkbox">
                                        </label>
                                    </td>
                                    <td>Alert every five minutes.</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Alert" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkbox">
                                            <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                        </label>
                                    </td>
                                    <td>Alert when bidding rate is greater than <b>210,000.00</b></td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Alert" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkbox">
                                            <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                        </label>
                                    </td>
                                    <td>Alert when bidding rate is lower than <b>170,000.00</b></td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Alert" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkbox">
                                            <input type="checkbox" value="" data-toggle="checkbox">
                                        </label>
                                    </td>
                                    <td>Alert when asking rate is greater than <b>220,000.00</b></td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Alert" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkbox">
                                            <input type="checkbox" value="" data-toggle="checkbox">
                                        </label>
                                    </td>
                                    <td>Alert <b>every 5 minutes</b> when asking rate is greater than <b>210,000.00</b> <span class="label label-success">Sell Time</span></td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Alert" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkbox">
                                            <input type="checkbox" value="" data-toggle="checkbox">
                                        </label>
                                    </td>
                                    <td>Alert <b>every 5 minutes</b> when bidding rate is lower than <b>200,000.00</b> <span class="label label-primary">Buy Time</span></td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Alert" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-bell-o"></i> As a premium user, you have six total alerts. Learn here on how to use them.
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
                            <i class="fa fa-history"></i> updating...
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>


<?php include("inc/footer.php"); ?>