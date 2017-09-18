<?php 

$title = "Pricing - Satoshi Bot";
$active = "upgrade";

include_once("inc/class.db.php");
$db = new Db();




include("inc/header.php");

?>
	<div class="row flex-items-xs-middle flex-items-xs-center pricing" style="min-height: 90vh;">

    <!-- Table #1  -->
    <div class="col-xs-12 col-md-3 col-md-offset-1">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="display-2"><span class="currency">$</span>19<span class="period">/month</span></h3>
        </div>
        <div class="card-block">
          <h4 class="card-title"> 
            Basic Plan
          </h4>
          <ul class="list-group">
            <li class="list-group-item">Ultimate Features</li>
            <li class="list-group-item">Responsive Ready</li>
            <li class="list-group-item">Visual Composer Included</li>
            <li class="list-group-item">24/7 Support System</li>
          </ul>
          <a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
        </div>
      </div>
    </div>

    <!-- Table #1  -->
    <div class="col-xs-12 col-md-3">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="display-2"><span class="currency">$</span>29<span class="period">/month</span></h3>
        </div>
        <div class="card-block">
          <h4 class="card-title"> 
            Regular Plan
          </h4>
          <ul class="list-group">
            <li class="list-group-item">Ultimate Features</li>
            <li class="list-group-item">Responsive Ready</li>
            <li class="list-group-item">Visual Composer Included</li>
            <li class="list-group-item">24/7 Support System</li>
          </ul>
          <a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
        </div>
      </div>
    </div>

    <!-- Table #1  -->
    <div class="col-xs-12 col-md-4">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="display-2"><span class="currency">$</span>39<span class="period">/month</span></h3>
        </div>
        <div class="card-block">
          <h4 class="card-title"> 
            Premium Plan
          </h4>
          <ul class="list-group">
            <li class="list-group-item">Ultimate Features</li>
            <li class="list-group-item">Responsive Ready</li>
            <li class="list-group-item">Visual Composer Included</li>
            <li class="list-group-item">24/7 Support System</li>
          </ul>
          <a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
        </div>
      </div>
    </div>

  </div>


<?php include("inc/footer.php"); ?>