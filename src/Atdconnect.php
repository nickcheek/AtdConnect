<?php

namespace Nickcheek\Atdconnect;

use SoapClient;


class Atdconnect
{
    
    public static $wsshead;
    private static $statuswsdl		= 'https://testws.atdconnect.com/ws/3_4/orderStatus.wsdl';
    private static $brandwsdl 		= 'https://testws.atdconnect.com/ws/3_4/brandstyles.wsdl';
    private static $locationwsdl	= 'https://testws.atdconnect.com/ws/3_4/locations.wsdl';
    private static $productwsdl 	= 'https://testws.atdconnect.com/ws/3_4/products.wsdl';
    private static $orderwsdl		= 'https://testws.atdconnect.com/ws/3_4/orders.wsdl';
    
    protected static $location;
    
    
    public function __construct()
    {
        $config = include('config/config.php');
        self::$wsshead = $this->getWSSHeader($config->user, $config->pass, $config->client);
        self::$location = $config->location;
       
    }
    
    public static function getWSSHeader($user, $pass, $client)
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
    
    public static function apiCall($call,$query,$service)
    {
        $client     = new \SoapClient($service);
        $client->__setSoapHeaders(self::$wsshead);
        $response 	= $client->$call($query);
        return $response;
    }
    
    public function setLocation($location)
    {
	    static::$location = $location;
        return static::$location;
    }
    
    public function getLocation()
    {
	    return static::$location;
    }
    
    //************************************************
    //               Location Service
    //************************************************
    
    public static function getLocationByCriteria()
    {
        return self::apiCall('getLocationByCriteria','',self::$locationwsdl);
    }
    
    public static function getLocationCutoffTimes()
    {
        return self::apiCall('getLocationCutoffTimes',['location' => self::$location],self::$locationwsdl);
    }
    
    public static function getDistributionCenter($dc = '059')
    {
        return self::apiCall('getDistributionCenter',array('servicingDC' => $dc),self::$locationwsdl);
    }
    
    //************************************************
    //               Brand Styles Service
    //************************************************
    
    public static function getBrand($product = null)
    {
    	return self::apiCall('getBrand',array('locationNumber' => static::$location,'productGroup' => $product),self::$brandwsdl);
    }
    
    public static function getStyle($brand = null)
    {
    	return self::apiCall('getStyle',array('locationNumber' => static::$location,'brand' => $brand),self::$brandwsdl);
    }
    
    
    //************************************************
    //               Products Service
    //************************************************
    
    public static function getProdBrand($product = null)
    {
    	return self::apiCall('getProdBrand',array('locationNumber' => static::$location,'productGroup' => $product),self::$productwsdl);
    }
    
    public static function getProductByCriteria($search)
    {
        return self::apiCall('getProductByCriteria',$search,self::$productwsdl);
    }
    
    public static function getProductByKeyword($search)
    {
        return self::apiCall('getProductByKeyword',$search,self::$productwsdl);
    }
    
    //************************************************
    //               Order Service
    //************************************************
    
    public static function placeOrder($order)
    {
        return self::apiCall('placeOrder',$order,self::$orderwsdl);
    }
    
    public static function previewOrder($order)
    {
        return self::apiCall('previewOrder',$order,self::$orderwsdl);
    }
    
    //************************************************
    //               Order Status Service
    //************************************************
    
    public static function getOrderDetail($status)
    {
        return self::apiCall('getOrderDetail',$status,self::$statuswsdl);
    }
    
    public static function getOrderStatusByCriteria($criteria)
    {
        return self::apiCall('getOrderStatusByCriteria',$status,self::$statuswsdl);
    }
    
    
    
    
    
}
