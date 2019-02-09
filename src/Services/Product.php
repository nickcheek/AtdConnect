<?php

namespace Nickcheek\Atdconnect\Services;

class Product {
	use \Nickcheek\Atdconnect\Traits\ApiTrait;
	
	private $location;
	private $wsdl;

	public function __construct()
	{
	    $config = include(realpath(dirname(__FILE__) . '/../config/config.php'));
	    $this->location = $config->location;
		$this->wsdl = 'https://testws.atdconnect.com/ws/3_4/products.wsdl';
	}
	
	//************************************************
    //               Products Service
    //************************************************
        
    public  function getProdBrand($product = null)
    {
    	return $this->apiCall('getProdBrand',array('locationNumber' => $this->location,'productGroup' => $product),$this->wsdl);
    }
    
    public  function getProductByCriteria($search)
    {
        return $this->apiCall('getProductByCriteria',$search,$this->wsdl);
    }
    
    public  function getProductByKeyword($search)
    {
        return $this->apiCall('getProductByKeyword',$search,$this->wsdl);
    }    
        

}