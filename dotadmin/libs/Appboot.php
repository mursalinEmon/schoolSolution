<?php

class Appboot{
	
		
		private $_controller = null;
		private $_controllerPath = "web_info/"; 
		private $_modelPath = ""; 		
		private $websttings = null;
		private $_url = null;
		
		function __construct(){
			$this->websttings = Conf::websettings();
		}
	
	public function init(){

						
		$this->_getUrl();

		$_req = array();
		$_p = array();
		
		$length = count($this->_url);
		
						
		if($this->_url[0]==""){
			$_req["page"]=INDEX_PAGE;
			$_req["action"]="init";
		}else{
			$_req["page"]=$this->_url[0];
			$_req["action"]=INDEX_PAGE_ACTION;			
		}
		if($length > 1)
			$_req["action"]=$this->_url[1];

		if($length > 2){
			for($i=0; $i < $length-2; $i++){
				$_p[$i] = $this->_url[$i+2];
			}
		}
			
		
				if(array_key_exists($_req["page"],$this->websttings)){
					
					if($_req["page"]==ERROR_PAGE){
						$this->callerrorpage("This is not your requested page!");
						return;
					}
					
					
					$_pagepath = $this->splitCamelCase($this->websttings[$_req["page"]]); 
					
					foreach($_pagepath as $ak=>$av){
						if ($av == end($_pagepath)) 
							break;
						$this->_controllerPath.=lcfirst($av)."/";
					}					
					 
					$this->_modelPath .= $this->_controllerPath."model/"; 
					$this->_controllerPath.= "controller/";
					$_req["page"] = lcfirst(end($_pagepath));
					$file = $this->_controllerPath.$_req["page"].".php";
					
					if(file_exists($file)){
						require $file; 
						$this->_controller = new $_req["page"]();						
						
							
								if(method_exists($this->_controller,$_req["action"])){ 
									$ReflectionMethod =  new \ReflectionMethod($this->_controller, $_req["action"]);
									$reqparams = $ReflectionMethod->getNumberOfRequiredParameters();
									$params = $ReflectionMethod->getParameters();
									
									if(sizeof($params)==0){
										$this->_controller->loadModel($_req["page"], $this->_modelPath);
										$this->_controller->{$_req["action"]}();
									}
									else if(sizeof($_p)>=$reqparams){									
										$this->_controller->loadModel($_req["page"], $this->_modelPath);
										call_user_func_array(array($this->_controller, $_req["action"]), $_p);
									}
									else										
										$this->callerrorpage("Parameters not matched");
								}
								else
									$this->callerrorpage("Controller Action Not Found!");

					}
					else
					$this->callerrorpage("Controller not foud!");
				}
				else
					$this->callerrorpage("404!page not foud!");
						
			
	}
	private function _getUrl(){
		$url = "";
		$newurl = "";
			foreach($_GET as $key=>$pcs) 
			{
				if($newurl=="")
					$newurl = $pcs;
				else
					$newurl .= "& ".rtrim($key,"_");
			}

		if($newurl!='') 
			$url=$newurl;
		//previuosly started from here
		//$url = isset($_GET['url']) ? $_GET['url'] : null;
		
		$url = rtrim($url,'/');
		$url = rawurlencode($url);
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = rawurldecode($url);
		
		$this->_url = explode('/',$url);
		
	}

	private function callerrorpage($er){
		$erpg = ERROR_PAGE;
		
		$_pagepath = $this->splitCamelCase($this->websttings[$erpg]); 
		$this->_controllerPath = "web_info/";
		$this->_modelPath = "";
		$this->_controller = null;
		
					foreach($_pagepath as $ak=>$av){
						if ($av == end($_pagepath)) 
							break;
						$this->_controllerPath.=lcfirst($av)."/";
					}
					$this->_modelPath .= $this->_controllerPath."model/"; 
					$this->_controllerPath.= "controller/";
					$page = lcfirst(end($_pagepath));
					$pg =array("page"=>$page);
					$file = $this->_controllerPath.$page.".php";
					
					if(file_exists($file)){
						
						require $file; 
						$this->_controller = new $pg["page"]();
						
						$this->_controller->loadModel($page, $this->_modelPath);
						$this->_controller->{ERROR_PAGE_ACTION}($er);
					}			

	}

	private function splitCamelCase($input)
	{
		return preg_split(
			'/(^[^A-Z]+|[A-Z][^A-Z]+)/',
			$input,
			-1, /* no limit for replacement count */
			PREG_SPLIT_NO_EMPTY /*don't return empty elements*/
				| PREG_SPLIT_DELIM_CAPTURE /*don't strip anything from output array*/
		);
	}
		
}
