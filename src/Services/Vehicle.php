<?php

namespace Nickcheek\Atdconnect\Services;

class Vehicle {
	use \Nickcheek\Atdconnect\Traits\ApiTrait;
	
	private $location;
	private $wsdl;
	
	private $vehicle = array();
	
	public $vehicleYear;
	public $vehicleMake;
	public $vehicleModel;

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
    	try { if (empty($year)) { throw new \Exception("A Vehicle Year Has Not Been Set."); } 
    		return $this->apiCall('getVehicleMake',['vehicle' => ['year'=>$year]],$this->wsdl);
        } catch (Exception $e) { return $e; }
    }

    public  function getVehicleModel($year,$make)
    {	
    	
    	try {if (empty($year)||empty($make)) {throw new \Exception("A Vehicle Year OR Make Has Not Been Set.");}
    	
        	return $this->apiCall('getVehicleModel',['vehicle' => ['year'=>$year,'make'=>$make]],$this->wsdl);
        
        } catch (Exception $e) {return $e;}
    }

    
    public  function getVehicleTrim($year,$make,$model)
    {
    	try {if (empty($year)||empty($make)||empty($model)) {throw new \Exception("A Vehicle Year, Make OR Model Has Not Been Set.");}
    	
        	return $this->apiCall('getVehicleTrim',['vehicle' => ['year'=>$year,'make'=>$make,'model'=>$model]],$this->wsdl);
        
        } catch (Exception $e) {return $e;}
    }
    
    public function getVehicleTrimOption($year,$make,$model,$trim)
    {
    	try {if (empty($year)||empty($make)||empty($model)||empty($trim)) {throw new \Exception("A Vehicle Year, Make OR Model Has Not Been Set.");}
    	
	    	return $this->apiCall('getVehicleTrimOption',['vehicle' => ['year'=>$year,'make'=>$make,'model'=>$model,'trim'=>$trim]],$this->wsdl);
	    	
	    } catch (Exception $e) {return $e;}
	    
    }
    
    public function getVehiclePlusSizes($year,$make,$model,$trim)
    {
    	try {if (empty($year)||empty($make)||empty($model)||empty($trim)) {throw new \Exception("A Vehicle Year, Make, Model, or Trim Has Not Been Set.");}
    	
	    	return $this->apiCall('getVehiclePlusSizes',['vehicle' => ['year'=>$year,'make'=>$make,'model'=>$model,'trim'=>$trim]],$this->wsdl);
	    	
	    } catch (Exception $e) {return $e;}
	    
    }
    
    
        

}