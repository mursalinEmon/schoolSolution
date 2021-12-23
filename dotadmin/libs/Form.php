<?php

require "form/Val.php";

class Form {

	/**	holds cuurent posted field immediately posted*/
	private $_currentitem = NULL;
	
	/**	Holds post data*/
	private $_postdata = array();
	
	private $_val = array();
	
	private $_error = array();

	public function __construct(){
		$this->_val = new Val();
	}
	
	public function post($field){
		$this->_postdata[$field] = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
		$this->_currentitem = $field;
				
		return $this;
	}
	
	public function fetch($fieldName = false){
		if ($fieldName){
			if (isset($this->_postdata[$fieldName])){
				return mysql_real_escape_string(strip_tags($this->_postdata[$fieldName]));
			}	
			else{
				return false;
			}
		}	
		else
		{
			return $this->_postdata;
		}
	}
	
	public function val($typeOfValidator, $arg = null){
		
		if ($arg == null)
			$error = $this->_val->{$typeOfValidator}($this->_postdata[$this->_currentitem]);
		else
			$error = $this->_val->{$typeOfValidator}($this->_postdata[$this->_currentitem], $arg);
		
		if($error){
			//$this->_error[$this->_currentitem]=$error; 
			$this->_error=array('field'=>$this->_currentitem, 'response'=>$error);
		}
		
		return $this;
	}
	
	public function submit(){
		
		if(count($this->_error)===0){
			
			return true;
		}
		else
		{
			// $str = '';
			
			// foreach($this->_error as $key => $value){
			// 	$str .= $key . '=>' .$value;
			// }
			
			// throw new Exception($str);
			throw new Exception(serialize($this->_error));
		}
	}
} 