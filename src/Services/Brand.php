<?php

namespace Nickcheek\Atdconnect\Services;

class Brand {
	use \Nickcheek\Atdconnect\Traits\ApiTrait;
	
	private $location;
	private $wsdl;

	public function __construct()
	{
	    $config = include(realpath(dirname(__FILE__) . '/../config/config.php'));
	    $this->location = $config->location;
		$this->wsdl = 'https://testws.atdconnect.com/ws/3_4/brandstyles.wsdl';
	}
	
    //************************************************
    //               Brand Styles Service
    //************************************************
    
    
    public  function getBrand($product = null)
    {
    	return $this->apiCall('getBrand',array('locationNumber' => $this->location,'productGroup' => $product),$this->wsdl);
    }
    
    public  function getStyle($brand = null)
    {
    	return $this->apiCall('getStyle',array('locationNumber' => $this->location,'brand' => $brand),$this->wsdl);
    }
        

}