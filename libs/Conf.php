<?php


class Conf{
    
    function __construct(){

    }
    public static function websettings(){
        $settings = array();
        if(file_exists(WEB_CONF)){
            $xml=simplexml_load_file(WEB_CONF);
            if($xml->getName()=="webconf"){
                foreach($xml->children() as $child)
                {
                    echo $child['name']; 
                    if ($child->getname()=="urlmapping")
                        $settings[(string)$child->request]=(string)$child->controllerpath;
                }
            }       
        } 
      
        return $settings;
    }

}