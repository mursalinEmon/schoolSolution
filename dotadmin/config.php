<?php

if (!defined('PAYGATE_URL')) {
    //define('PAYGATE_URL', 'https://portal2.amarbazarltd.com/payment/paynow/');
    define('PAYGATE_URL', 'http://localhost/dotschool/paynow/');
}

if (!defined('API_DOMAIN_URL')) {
    define('API_DOMAIN_URL', 'https://securepay.sslcommerz.com');
}

if (!defined('STORE_ID')) {
    define('STORE_ID', 'amarbazarltdlive');
}

if (!defined('STORE_PASSWORD')) {
    define('STORE_PASSWORD', 'amarbazarltdlive29019');
}

if (!defined('IS_LOCALHOST')) {
    define('IS_LOCALHOST', false);
}


    if(file_exists('web_info/app_conf.xml')){
        $xml=simplexml_load_file('web_info/app_conf.xml');
        if($xml->getName()=="appconf"){
            foreach($xml->children() as $child)
            {
                if ($child->getname()=="conf"){
                    if (!defined('LIBS')) { 
                        define ('LIBS',''.(string)$child->libs.'');
                    }
                     if(substr((string)$child->url, -1)=="/"){
                        if (!defined('URL')) { 
                            define('URL','http://'.$_SERVER['HTTP_HOST'].''.(string)$child->url.'');
                        }
                     }else{
                        if (!defined('URL')) {
                         define('URL','http://'.$_SERVER['HTTP_HOST'].''.(string)$child->url.'/');
                        }
                     }
                        //define('URL','https://eannex.com/annexapi/');  
                        if (!defined('PROJECT_PATH')) {     
                            define('PROJECT_PATH', 'http://'.$_SERVER['HTTP_HOST'].''.(string)$child->url.'');
                        }   
                    if (!defined('APPNAME'))      
                        define ('APPNAME',''.(string)$child->appname.'');
                    
                    if (!defined('WEB_CONF'))   
                        define ('WEB_CONF',''.(string)$child->webconf.'');
                    
                    if (!defined('DBA_CONF'))   
                        define ('DBA_CONF',''.(string)$child->dbaconf.'');

                    if (!defined('VIEW_CONF'))   
                        define ('VIEW_CONF',''.(string)$child->viewconf.'');

                    if (!defined('INDEX_PAGE'))   
                        define ('INDEX_PAGE',''.(string)$child->indexpage.'');

                    if (!defined('INDEX_PAGE_ACTION'))   
                        define ('INDEX_PAGE_ACTION',''.(string)$child->indexpageaction.'');

                    if (!defined('ERROR_PAGE'))   
                        define ('ERROR_PAGE',''.(string)$child->errorpage.'');

                    if (!defined('ERROR_PAGE_ACTION'))   
                        define ('ERROR_PAGE_ACTION',''.(string)$child->errorpageaction.'');

                    if (!defined('USER_IMAGE_LOCATION'))   
                        define ('USER_IMAGE_LOCATION',''.(string)$child->userimagelocation.'');

                    if (!defined('PRODUCT_IMAGE_LOCATION'))   
                        define ('PRODUCT_IMAGE_LOCATION',''.(string)$child->productimagelocation.'');
                    
                    if (!defined('TEACHER_IMAGE_LOCATION'))   
                        define ('TEACHER_IMAGE_LOCATION',''.(string)$child->teacherimagelocation.'');

                    if (!defined('CAT_IMAGE_LOCATION'))   
                        define ('CAT_IMAGE_LOCATION',''.(string)$child->catimagelocation.'');

                    if (!defined('HW_QUESTION_LOCATION'))   
                        define ('HW_QUESTION_LOCATION',''.(string)$child->homeworklocation.'');

                    if (!defined('HW_ANSWER_LOCATION'))   
                        define ('HW_ANSWER_LOCATION',''.(string)$child->hwanswerlocation.'');
                }
                if ($child->getname()=="dbconf"){
                    if (!defined('DB_TYPE')) 
                        define ('DB_TYPE','mysql');
                    
                    if (!defined('DB_HOST')) 
                        define ('DB_HOST','localhost');
                        
                    if (!defined('DB_NAME')) 
                        define ('DB_NAME','dotschool');
                    
                    if (!defined('DB_USER')) 
                        define ('DB_USER','root');
                    
                    if (!defined('DB_PASS')) 
                        define ('DB_PASS','');
                                       
                }
                if ($child->getname()=="hashkey"){
                    if (!defined('HASH_KEY'))
                        define ('HASH_KEY', 'donotchangeitmylove');
                                       
                }
				if ($child->getname()=="apikey"){
                    if (!defined('API_KEY'))  
                        define ('API_KEY', '36cfce7372fc99723569236e883dc4db39669cdf116a57d6d126e05fdea7be3c');
                                       
                }
            }
        }       
    } 
  
    return [
        'projectPath' => constant("PROJECT_PATH"),
        'apiDomain' => constant("API_DOMAIN_URL"),
        'apiCredentials' => [
            'store_id' => constant("STORE_ID"),
            'store_password' => constant("STORE_PASSWORD"),
        ],
        'apiUrl' => [
            'make_payment' => "/gwprocess/v4/api.php",
            'transaction_status' => "/validator/api/merchantTransIDvalidationAPI.php",
            'order_validate' => "/validator/api/validationserverAPI.php",
            'refund_payment' => "/validator/api/merchantTransIDvalidationAPI.php",
            'refund_status' => "/validator/api/merchantTransIDvalidationAPI.php",
        ],
        'connect_from_localhost' => constant("IS_LOCALHOST"),
        'success_url' => 'sslpay/sslsuccess',
        'failed_url' => 'sslpay/sslfail',
        'cancel_url' => 'sslpay/sslcancel',
        'ipn_url' => 'sslpay/sslipn',
    ];
        