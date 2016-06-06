<?php

class Flipkart
{
	private $affiliateId;
    private $token;
    private $response_type;

    private $api_base = 'https://affiliate-api.flipkart.net/affiliate/api/';
    private $verify_ssl   = false;

    function __construct($param=false)
    {	
        $this->affiliateId = $param['affiliateId'];
        $this->token = $param['token'];
        $this->response_type = $param['response_type'];
		$this->api_base.= $this->affiliateId.'.'.$this->response_type;
    }

    public function api_home(){
        return $this->sendRequest($this->api_base);
    }

    public function call_url($url){
        return $this->sendRequest($url);
    }

    private function sendRequest($url, $timeout=''){
    	
    	if (function_exists('curl_init') && function_exists('curl_setopt')){
	       
	        $headers = array(
	            'Cache-Control: no-cache',
	            'Fk-Affiliate-Id: '.$this->affiliateId,
	            'Fk-Affiliate-Token: '.$this->token
	            );

	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, $url);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	        curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-Rohit-Flipkart/0.1');
	        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->verify_ssl);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	        $result = curl_exec($ch);
	        curl_close($ch);

	        return $result ? $result : false;
	    }else{
            
			return false;
	    }        
    }
}