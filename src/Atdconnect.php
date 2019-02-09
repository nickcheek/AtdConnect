<?php

namespace Nickcheek\Atdconnect;

use SoapClient;
use Nickcheek\Atdconnect\Arraybuilder;

class Atdconnect
{
    
    private $wsshead;
    protected $location;
    private $statuswsdl		= 'https://testws.atdconnect.com/ws/3_4/orderStatus.wsdl';
    private $brandwsdl 		= 'https://testws.atdconnect.com/ws/3_4/brandstyles.wsdl';
    private $locationwsdl	= 'https://testws.atdconnect.com/ws/3_4/locations.wsdl';
    private $productwsdl 	= 'https://testws.atdconnect.com/ws/3_4/products.wsdl';
    private $orderwsdl		= 'https://testws.atdconnect.com/ws/3_4/orders.wsdl';
    
    
    
    
    public function __construct()
    {
        $config = include('config/config.php');
        $this->wsshead = $this->getWSSHeader($config->user, $config->pass, $config->client);
        $this->location = $config->location;
    }
    
    public  function getWSSHeader($user, $pass, $client)
    {
        $xml = '
		<wsse:Security SOAP-ENV:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
		    <wsse:UsernameToken atd:clientId="' . $client . '" xmlns:atd="http://api.atdconnect.com/atd">
		        <wsse:Username>' . $user . '</wsse:Username>
		        <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . $pass . '</wsse:Password>
		    </wsse:UsernameToken>
		</wsse:Security>
		';
        
        return new \SoapHeader('http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd', 'Security', new \SoapVar($xml, XSD_ANYXML), true);
    }
    
    public  function apiCall($call,$query,$service)
    {
        $client     = new \SoapClient($service);
        $client->__setSoapHeaders($this->wsshead);
        $response 	= $client->$call($query);
        return $response;
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

    
    //************************************************
    //               Location Service
    //************************************************
    
    public  function getLocationByCriteria()
    {
        return $this->apiCall('getLocationByCriteria','',$this->locationwsdl);
    }
    
    public  function getLocationCutoffTimes()
    {
        return $this->apiCall('getLocationCutoffTimes',['location' => $this->location],$this->locationwsdl);
    }
    
    public  function getDistributionCenter($dc = '059')
    {
        return $this->apiCall('getDistributionCenter',array('servicingDC' => $dc),$this->locationwsdl);
    }
    
        
    //************************************************
    //               Brand Styles Service
    //************************************************
    
    
    public  function getBrand($product = null)
    {
    	return $this->apiCall('getBrand',array('locationNumber' => $this->location,'productGroup' => $product),$this->brandwsdl);
    }
    
    public  function getStyle($brand = null)
    {
    	return $this->apiCall('getStyle',array('locationNumber' => $this->location,'brand' => $brand),$this->brandwsdl);
    }
    
    
    //************************************************
    //               Products Service
    //************************************************
    
    
    
    
    public  function getProdBrand($product = null)
    {
    	return $this->apiCall('getProdBrand',array('locationNumber' => $this->location,'productGroup' => $product),$this->productwsdl);
    }
    
    public  function getProductByCriteria($search)
    {
        return $this->apiCall('getProductByCriteria',$search,$this->productwsdl);
    }
    
    public  function getProductByKeyword($search)
    {
        return $this->apiCall('getProductByKeyword',$search,$this->productwsdl);
    }
    
    //************************************************
    //               Order Service
    //************************************************
    
    public  function placeOrder($order)
    {
        return $this->apiCall('placeOrder',$order,$this->orderwsdl);
    }
    
    public  function previewOrder($order)
    {
        return $this->apiCall('previewOrder',$order,$this->orderwsdl);
    }
    
    //************************************************
    //               Order Status Service
    //************************************************
    
    public  function getOrderDetail($status)
    {
        return $this->apiCall('getOrderDetail',$status,$this->statuswsdl);
    }
    
    public  function getOrderStatusByCriteria($criteria)
    {
        return $this->apiCall('getOrderStatusByCriteria',$criteria,$this->statuswsdl);
    }
    
    
    
    
    
}
