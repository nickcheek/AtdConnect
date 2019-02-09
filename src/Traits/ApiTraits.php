<?php

namespace Nickcheek\Atdconnect\Traits;

use SoapClient;

trait ApiTrait {

        private $config; 
        private $wsshead;
        private $user;
        private $pass;
        private $client;
    
    
        public  function apiCall($call, $query, $service)
        {
                $config = include(realpath(dirname(__FILE__).'/../config/config.php'));
    	
                $this->user = $config->user;
                $this->pass = $config->pass;
                $this->client = $config->client;
                $this->wsshead = $this->getWSSHeader();
    	
        $client = new \SoapClient($service);
        $client->__setSoapHeaders($this->wsshead);
        $response = $client->$call($query);
        return $response;
        }   
    
        public  function getWSSHeader()
        {
        $xml = '
		<wsse:Security SOAP-ENV:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
		    <wsse:UsernameToken atd:clientId="' . $this->client.'" xmlns:atd="http://api.atdconnect.com/atd">
		        <wsse:Username>' . $this->user.'</wsse:Username>
		        <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . $this->pass.'</wsse:Password>
		    </wsse:UsernameToken>
		</wsse:Security>
		';
        
        return new \SoapHeader('http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd', 'Security', new \SoapVar($xml, XSD_ANYXML), true);
        }
    
}
