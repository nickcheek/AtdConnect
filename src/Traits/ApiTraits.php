<?php

namespace Nickcheek\Atdconnect\Traits;

use SoapClient;

trait ApiTrait {

	public function __construct(){
		$config = include('config/config.php');
        $this->wsshead = $this->getWSSHeader($config->user, $config->pass, $config->client);
	}

    public function ApiCall($call,$query) {
        $client = new SoapClient($this->wsdl_path, $this->params);
        $response = $client->$call($query);
        return $response;
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
    
}
