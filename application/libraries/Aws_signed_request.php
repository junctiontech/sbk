<?php

 class Aws_signed_request
    {   
function  aws_signed_request($region=false,$params=false,$public_key=false,$private_key=false)
{

    $method = "GET";
    $host = "ecs.amazonaws.".$region; 
    $uri = "/onca/xml";
    
    
    $params["Service"]          = "AWSECommerceService";
    $params["AWSAccessKeyId"]   = $public_key;
    $params["Timestamp"]        = gmdate("Y-m-d\TH:i:s\Z");
    $params["Version"]          = "2009-03-31";

    
    ksort($params);
    
    $canonicalized_query = array();

    foreach ($params as $param=>$value)
    {
        $param = str_replace("%7E", "~", rawurlencode($param));
        $value = str_replace("%7E", "~", rawurlencode($value));
        $canonicalized_query[] = $param."=".$value;
    }
    
    $canonicalized_query = implode("&", $canonicalized_query);

    $string_to_sign = $method."\n".$host."\n".$uri."\n".$canonicalized_query;
    
    
    $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $private_key, True));
    
    $signature = str_replace("%7E", "~", rawurlencode($signature));
    
     $request = "http://".$host.$uri."?".$canonicalized_query."&Signature=".$signature;
	//print_r($request);die;
   $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$request);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, '');
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    $xml_response = curl_exec($ch);
    
    if ($xml_response === False)
    {
        return False;
    }
    else
    {
        $parsed_xml = @simplexml_load_string($xml_response);
        return ($parsed_xml === False) ? False : $parsed_xml;
    }
}
	}
?>
