<?php
class Sendsms{
	
	/*public function sendSingleSms($url, $username, $password, $fromnumber, $tonumber, $message){
		$URL = $url;
	
		$postdata = http_build_query(
			array(
			'Username' => $username,
			'Password' => $password,
			'From' => $fromnumber,
			'To' => $tonumber,
			'Message' => $message
			)
		);

		$opts = array('http' => array('method'  => 'POST', 'header'  => 'Content-type: application/x-www-form-urlencoded', 'timeout'=>5,'content' => $postdata),
		"ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        )
		);
		https://api.mobireach.com.bd/SendTextMessage?Username=dotbd&Password=Dhaka@123&From=8801810025181&To=01841923270&Message=test
https://smsportal.dotbdcloud.com/smsapi/sendsms?apitoken=5467486464hsgczzDAS6457FRTvVhdfbdhdhdgd464563ndhh&username=dotademy&tono=01841923270&priority=0&company=dotademy&message=test;
		$context  = stream_context_create($opts);

		$result = file_get_contents($URL, false, $context);
		return $result;	
	}*/
		

	function send_sms($sms_text, $recipients, $ta='pv', $mask='', $type='text')
	{
		
		//$url = "https://smsportal.dotbdcloud.com/smsapi/sendsms?apitoken=5467486464hsgczzDAS6457FRTvVhdfbdhdhdgd464563ndhh&username=dotademy&tono=".rawurlencode($recipients)."&priority=0&company=dotademy&message=".rawurlencode($sms_text);
		// $url = "https://smsportal.dotbdcloud.com/smsapi/sendsms?apitoken=5467486464hsgczzDAS6457FRTvVhdfbdhdhdgd464563ndhh&username=dotademy&tono=".rawurlencode($recipients)."&priority=0&company=dotademy&message=".rawurlencode($sms_text);
		// //Logdebug::appendlog($url);
		
		// return file_get_contents($url);

		$url = "http://104.248.147.225:8080/smsapi/sendsms?apitoken=5467486464hsgczzDAS6457FRTvVhdfbdhdhdgd464563ndhh&username=dotademy&tono=".rawurlencode($recipients)."&priority=0&company=dotademy&message=".rawurlencode($sms_text);

		$cSession = curl_init();
		curl_setopt($cSession,CURLOPT_URL,$url);
		curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($cSession,CURLOPT_HEADER, false);
		$result=curl_exec($cSession);
		curl_close($cSession);

		return $result;
	}


	
}