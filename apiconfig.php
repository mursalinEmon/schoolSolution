<?php

    if(file_exists('../web_info/app_conf.xml')){
        $xml=simplexml_load_file('../web_info/app_conf.xml');
        if($xml->getName()=="appconf"){
            foreach($xml->children() as $child)
            {
                
                if ($child->getname()=="dbconf"){
                    
                    define ('DB_TYPE','mysql');
                    define ('DB_HOST','localhost');
                    define ('DB_NAME','paidallnetdb');
                    define ('DB_USER','root');
                    define ('DB_PASS','');
                                       
                }
                
            }
        }       
    } 
  
