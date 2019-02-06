<?php

namespace Nickcheek\Atdconnect;

use SoapClient;

class Atdconnect
{

	public static $wsshead;

   public function __construct()
   {
	   self::$wsshead = $this->getWSSHeader($user,$pass,$client);
   }
   
   public static function getWSSHeader($user,$pass,$client){
	    $xml = '
		<wsse:Security SOAP-ENV:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
		    <wsse:UsernameToken atd:clientId="'.$client.'" xmlns:atd="http://api.atdconnect.com/atd">
		        <wsse:Username>'.$user.'</wsse:Username>
		        <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">'.$pass.'</wsse:Password>
		    </wsse:UsernameToken>
		</wsse:Security>
		';
		
		return new \SoapHeader('http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd','Security',new \SoapVar($xml, XSD_ANYXML), true);
    }   
    
    public static function getLocationByCriteria()
    {
	    $client = new \SoapClient('https://testws.atdconnect.com/ws/3_4/locations.wsdl');
		$client->__setSoapHeaders(self::$wsshead);
		$response   = $client->getLocationByCriteria();
		
		return $response;
    }
}
