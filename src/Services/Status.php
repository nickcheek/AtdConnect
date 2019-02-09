<?php

namespace Nickcheek\Atdconnect\Services;

class Status {
	use \Nickcheek\Atdconnect\Traits\ApiTrait;
	
	private $wsdl;

	public function __construct()
	{
		$this->wsdl = 'https://testws.atdconnect.com/ws/3_4/orderStatus.wsdl';
	}
	
	//************************************************
    //               Order Status Service
    //************************************************
    
    public  function getOrderDetail($status)
    {
        return $this->apiCall('getOrderDetail',$status,$this->wsdl);
    }
    
    public  function getOrderStatusByCriteria($criteria)
    {
        return $this->apiCall('getOrderStatusByCriteria',$criteria,$this->wsdl);
    }    
        

}