<?php

namespace Nickcheek\Atdconnect\Services;

class Location {
	use \Nickcheek\Atdconnect\Traits\ApiTrait;
	
	private $location;
	private $wsdl;

	public function __construct()
	{
	    $config = include(realpath(dirname(__FILE__) . '/../config/config.php'));
	    $this->location = $config->location;
		$this->wsdl = 'https://testws.atdconnect.com/ws/3_4/locations.wsdl';
		
	}
	
	//************************************************
    //               Location Service
    //************************************************
    
    public  function getLocationByCriteria()
    {
        return $this->apiCall('getLocationByCriteria','',$this->wsdl);
    }
    
    public  function getLocationCutoffTimes()
    {
        return $this->apiCall('getLocationCutoffTimes',['location' => $this->location],$this->wsdl);
    }
    
    public  function getDistributionCenter($dc = '059')
    {
        return $this->apiCall('getDistributionCenter',array('servicingDC' => $dc),$this->wsdl);
    }
    
        

}