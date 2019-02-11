<?php

require_once 'vendor/autoload.php';

use \Nickcheek\Atdconnect\Atdconnect;

$atd = new Atdconnect();

$response = $client->Location()->getLocationByCriteria();

echo "<pre>";
var_dump($response); 
echo "</pre>";
