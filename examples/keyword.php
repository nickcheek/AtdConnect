<?php

require_once 'vendor/autoload.php';

use \Nickcheek\Atdconnect\Atdconnect;

$atd = new Atdconnect();

$search = $atd->setSizeSearch('3055520');

return $atd->Product()->getProductByCriteria($search);

echo "<pre>";
var_dump($response); 
echo "</pre>";
