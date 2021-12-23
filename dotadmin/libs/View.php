<?php

class View{

    function __construct(){

    }

	
	public function render($type,$name, $noinclude = false){
		if ($noinclude==true){
			require 'views/' . $name . '.php';
		}else{		
		$settings = $this->getviewfiles($type);
		require 'html/'.$settings['header'].'.php';
		require 'views/' . $name . '.php';
		require 'html/'.$settings['footer'].'.php';	
		}	
	}

	
	public static function getviewfiles($type){
        $settings = array();
        if(file_exists(VIEW_CONF)){
            $xml=simplexml_load_file(VIEW_CONF);
            if($xml->getName()=="viewconf"){
                foreach($xml->children() as $child)
                {
                    if ($child->getname()=="viewtemplate"){
						if($child['name']==$type){
							$settings["header"]=(string)$child->header;
							$settings["footer"]=(string)$child->footer;
						}
					}
                    
                }
            }       
        } 
      
        return $settings;
    }
}