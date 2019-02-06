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
    
    
    public function __construct($user, $pass, $client)
    {
        self::$wsshead = $this->getWSSHeader($user, $pass, $client);
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
    
    
    
    //************************************************
    //               Location Service
    //************************************************
    
    public static function getLocationByCriteria()
    {
        
        $client = new \SoapClient(self::$locationwsdl);
        $client->__setSoapHeaders(self::$wsshead);
        $response = $client->getLocationByCriteria();
        
        return $response;
    }
    
    public static function getLocationCutoffTimes($location = '1213421')
    {
        
        $client = new \SoapClient(self::$locationwsdl);
        $client->__setSoapHeaders(self::$wsshead);
        $response = $client->getLocationCutoffTimes(array(
            'location' => $location
        ));
        
        return $response;
    }
    
    public static function getDistributionCenter($dc = '059')
    {
        $client = new \SoapClient(self::$locationwsdl);
        $client->__setSoapHeaders(self::$wsshead);
        $response = $client->getDistributionCenter(array(
            'servicingDC' => $dc
        ));
        
        return $response;
    }
    
    //************************************************
    //               Brand Styles Service
    //************************************************
    
    
    public static function getBrand($location, $product = null)
    {
        $client = new \SoapClient(self::$brandwsdl);
        $client->__setSoapHeaders(self::$wsshead);
        $response = $client->getBrand(array(
            'locationNumber' => $location,
            'productGroup' => $product
        ));
        
        return $response;
    }
    
    public static function getStyle($location, $brand = null)
    {
        $client = new \SoapClient(self::$brandwsdl);
        $client->__setSoapHeaders(self::$wsshead);
        $response = $client->getBrand(array(
            'locationNumber' => $location,
            'brand' => $brand
        ));
        
        return $response;
    }
    
    
    //************************************************
    //               Products Service
    //************************************************
    
    
    
    
    public static function getProdBrand($location, $product = null)
    {
        $client = new \SoapClient(self::$productwsdl);
        $client->__setSoapHeaders(self::$wsshead);
        $response = $client->getBrand(array(
            'locationNumber' => $location,
            'productGroup' => $product
        ));
        
        return $response;
    }
    
    public static function getProductByCriteria()
    {
        
    }
    
    public static function getProductByKeyword()
    {
        
    }
    
    //************************************************
    //               Order Service
    //************************************************
    
    public static function placeOrder()
    {
        
    }
    
    public static function previewOrder()
    {
        
    }
    
    //************************************************
    //               Order Status Service
    //************************************************
    
    public static function getOrderDetail()
    {
        
    }
    
    public static function getOrderStatusByCriteria()
    {
        
    }
    
    
    
    
    
}
