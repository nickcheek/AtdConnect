<?php

require_once 'vendor/autoload.php';

use \Nickcheek\Atdconnect\Atdconnect;

$atd = new Atdconnect();

$response = $atd->Vehicle()->getVehicleByVIN('3GTU2MEC2GG267040');

echo "<pre>";
var_dump($response); 
echo "</pre>";
