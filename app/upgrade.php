<?php 

$title = "Pricing - Satoshi Bot";
$active = "upgrade";

include_once("inc/class.db.php");
$db = new Db();




include("inc/header.php");

?>
	<div class="row flex-items-xs-middle flex-items-xs-center pricing" style="min-height: 90vh;">
    <div class="col-md-10 col-md-offset-1">
      <!-- Table #1  -->
      <div class="col-xs-12 col-md-4">
        <div class="card text-center">
          <div class="card-header">
            <h3 class="display-2">
              FREE
            </h3>
          </div>
          <div class="card-block">
            <h4 class="card-title"> 
              Basic Plan
            </h4>
            <ul class="list-group">
              <li class="list-group-item">1 Alert</li>
              <li class="list-group-item">7 Days History</li>
              <li class="list-group-item">1 Wallet Transfer Credit*</li>
              <li class="list-group-item">Email Support</li>
              <li class="list-group-item">2k Convertion Limit**</li>
            </ul>
            <a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
          </div>
        </div>
      </div>

      <!-- Table #2  -->
      <div class="col-xs-12 col-md-4">
        <div class="card text-center">
          <div class="card-header">
            <h3 class="display-2"><span class="currency">₱</span>49<span class="period">/month</span></h3>
          </div>
          <div class="card-block">
            <h4 class="card-title"> 
              Regular Plan
            </h4>
            <ul class="list-group">
              <li class="list-group-item">3 Alerts</li>
              <li class="list-group-item">30 Days History</li>
              <li class="list-group-item">5 Wallet Transfer Credits <span class="period">/month</span></li>
              <li class="list-group-item">Email, Chat & Phone Support</li>
              <li class="list-group-item">5k Convertion Limit**</li>
            </ul>
            <a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
          </div>
        </div>
      </div>

      <!-- Table #3  -->
      <div class="col-xs-12 col-md-4">
        <div class="card text-center">
          <div class="card-header">
            <h3 class="display-2"><span class="currency">₱</span>59<span class="period">/ month</span></h3>
          </div>
          <div class="card-block">
            <h4 class="card-title"> 
              Premium Plan
            </h4>
            <ul class="list-group">
              <li class="list-group-item">10 Alerts</li>
              <li class="list-group-item">30 Days History</li>
              <li class="list-group-item">10 Wallet Transfer Credits <span class="period">/ month</span></li>
              <li class="list-group-item">Email, Chat & Phone Support</li>
              <li class="list-group-item">Coins Convertion Limit***</li>
            </ul>
            <a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
          </div>
        </div>
      </div>

    </div>

  </div>


<?php include("inc/footer.php"); ?>