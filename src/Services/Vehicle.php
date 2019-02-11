<?php

namespace Nickcheek\Atdconnect\Services;

class Vehicle {
	use \Nickcheek\Atdconnect\Traits\ApiTrait;
	
	private $location;
	private $wsdl;
		
	public $vin;
	

	public function __construct()
	{
	    $config = include(realpath(dirname(__FILE__) . '/../config/config.php'));
	    $this->location = $config->location;
		$this->wsdl = 'http://testws.atdconnect.com/ws/3_4/fitments.wsdl';
		
	}
	
	//************************************************
    //               Vehicle Service
    //************************************************
    public  function getVehicleYear()
    {
        return $this->apiCall('getVehicleYear','',$this->wsdl);
    }
    
    public  function getVehicleMake($year)
    {	
    	return $this->apiCall('getVehicleMake',['vehicle' => ['year'=>$year]],$this->wsdl);
    }

    public  function getVehicleModel($year,$make)
    {	
        return $this->apiCall('getVehicleModel',['vehicle' => ['year'=>$year,'make'=>$make]],$this->wsdl);
    }

    
    public  function getVehicleTrim($year,$make,$model)
    {
        return $this->apiCall('getVehicleTrim',['vehicle' => ['year'=>$year,'make'=>$make,'model'=>$model]],$this->wsdl);
    }
    
    public function getVehicleTrimOption($year,$make,$model,$trim)
    {
    	return $this->apiCall('getVehicleTrimOption',['vehicle' => ['year'=>$year,'make'=>$make,'model'=>$model,'trim'=>$trim]],$this->wsdl);
	}
    
    public function getVehiclePlusSizes($year,$make,$model,$trim)
    {
    	return $this->apiCall('getVehiclePlusSizes',['vehicle' => ['year'=>$year,'make'=>$make,'model'=>$model,'trim'=>$trim]],$this->wsdl);
	}
    
    public function getProductByFitment($year,$make,$model,$trim,$option)
    {
	  	return $this->apiCall('getProductByFitment',['locationNumber'=>$this->location,'vehicle' => ['year'=>$year,'make'=>$make,'model'=>$model,'trim'=>$trim,'trimOption'=>$option]],$this->wsdl);
	}
    
    public function getVehicleByVehicleId($vID)
    {
	  	return $this->apiCall('getProductByFitment',['locationNumber'=>$this->location,'vehicle' => ['vehicleId'=>$vID]],$this->wsdl);
	}
    
    public function getVehicleByLicensePlate($num,$state)
    {
	    return $this->apiCall('getVehicleByLicensePlate',['licensePlateNumber'=>$num,'licensePlateState' => $state],$this->wsdl);
	}
	
	public function getVehicleByVIN($vin)
    {
	    return $this->apiCall('getVehicleByVIN',['VIN'=>$vin],$this->wsdl);
	}
    
    
    
        

}