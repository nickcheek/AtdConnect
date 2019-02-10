<?php

namespace Nickcheek\Atdconnect;

use Nickcheek\Atdconnect\Services\Brand;
use Nickcheek\Atdconnect\Services\Location;
use Nickcheek\Atdconnect\Services\Order;
use Nickcheek\Atdconnect\Services\Product;
use Nickcheek\Atdconnect\Services\Status;
use Nickcheek\Atdconnect\Arraybuilder;

class Atdconnect
{
    
    protected $location;
    

    public function __construct()
    {
        $config = include('config/config.php');
        $this->location = $config->location;
    }
    
    public function setLocation($location)
    {
	    $this->location = $location;
        return $this->location;
    }
    
    public function getLocation()
    {
	    return $this->location;
    }
    
    public function setKeywordSearch($word)
    {
	    $search = new Arraybuilder();
	    return $search->setKeywordSearch($word);
    }
    
    public function setATDProductNumber($number)
    {
	    $search = new Arraybuilder();
	    return $search->setATDProductNumber($number);
    }
    
    public function setSizeSearch($size)
    {
	    $search = new Arraybuilder();
	    return $search->setSizeSearch($size);
    }

    public function Brand() {
    	return new Brand;
    }
    
    public function Location() {
    	return new Location;
    }
    
    public function Order() {
    	return new Order;
    }
    
    public function Product() {
    	return new Product;
    }
    
    public function Status() {
    	return new Status;
    }

    
    
    
    
    
    
    
    
    
    
    
    
}
