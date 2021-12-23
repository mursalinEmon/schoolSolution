<?php
class Sendsms{

	function validate_msisdn($msisdn){
			$msisdn = trim(preg_replace("/[^0-9]+/", "", $msisdn));
			$msisdn = preg_replace("/^(00)?(88)?0/", "", $msisdn);
			if (strlen($msisdn) != 10 || strncmp($msisdn, "1", 1) != 0)
				return false;

			$msisdn = "880" . $msisdn;
			return $msisdn;
	}

	function send_single_sms($sms_text, $recipients, $ta='pv', $mask='', $type='text'){
			$url = "https://smsportal.dotbdcloud.com/smsapi/sendsms?apitoken=5467486464hsgczzDAS6457FRTvVhdfbdhdhdgd464563ndhh&username=dotademy&tono=".rawurlencode($recipients)."&priority=0&company=dotademy&message=".rawurlencode($sms_text);

			$cSession = curl_init(); 
            curl_setopt($cSession,CURLOPT_URL,$url);
            curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($cSession,CURLOPT_HEADER, false);
            $result=curl_exec($cSession);
            curl_close($cSession);

            return $result;
			//return file_get_contents($url);
	}

	function send_sms($sms_text, $recipients, $ta='pv', $mask='', $type='text'){
		
			$url = "https://smsportal.dotbdcloud.com/smsapi/sendsms?apitoken=5467486464hsgczzDAS6457FRTvVhdfbdhdhdgd464563ndhh&username=dotademy&tono=".rawurlencode($recipients)."&priority=0&company=dotademy&message=".rawurlencode($sms_text);

			$cSession = curl_init(); 
			curl_setopt($cSession,CURLOPT_URL,$url);
			curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($cSession,CURLOPT_HEADER, false);
			$result=curl_exec($cSession);
			curl_close($cSession);

			return $result;
			//return file_get_contents($url);
	}

	function randPass($length, $strength=8) {
		$vowels = 'AEIOU';
		$consonants = 'BDGHJLMNPQRSTVWXZ';
		$consonants .= '23456789';
		$consonants .= '@#$%';
		// if ($strength >= 1) {
		// 	$consonants .= 'BDGHJLMNPQRSTVWXZ';
		// }
		// if ($strength >= 2) {
		// 	$vowels .= "AEUY";
		// }
		// if ($strength >= 4) {
		// 	$consonants .= '23456789';
		// }
		// if ($strength >= 8) {
		// 	$consonants .= '@#$%';
		// }

		$password = '';
		$alt = time() % 2;
		for ($i = 0; $i < $length; $i++) {
			if ($alt == 1) {
				$password .= $consonants[(rand() % strlen($consonants))];
				$alt = 0;
			} else {
				$password .= $vowels[(rand() % strlen($vowels))];
				$alt = 1;
			}
		}
		return $password;
	}

	
}