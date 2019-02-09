<?php

namespace Nickcheek\Atdconnect\Services;

class Order {
	use Nickcheek\Atdconnect\Traits;
	
	private $wsdl;

	public function __construct()
	{
		$this->wsdl = 'https://testws.atdconnect.com/ws/3_4/orders.wsdl';
	}
	
	//************************************************
    //               Order Service
    //************************************************
    
    public  function placeOrder($order)
    {
        return $this->apiCall('placeOrder',$order,$this->wsdl);
    }
    
    public  function previewOrder($order)
    {
        return $this->apiCall('previewOrder',$order,$this->wsdl);
    }
    
        

}