<?php 

include_once("class.coins.php");

$coin = new Coins();

$coins = $coin->withOAuthToken('ozVwMwkhU1CFvcG8QMqMLIjFJMoaNtnz8z2b96Yb');



$responseObj = json_decode($response->body);


print_r($responseObj);