<?php 

class Val{
	
	public function __construct(){
		
	}
	
	public function minlength($data, $arg = false){
		if(strlen($data) < $arg)
			return  "Your input can only be minimum $arg character long";
			
	}
	public function maxlength($data, $arg = false){
		if(strlen($data) > $arg)
			return "Your input can only be maximum $arg character long";
	}
	
	public function digit($data){
		if(ctype_digit($data)== false)
			return "Your input must be a number type";
	}
	
	public function checkdouble($data){
		if(is_numeric($data)== false)
			return "Your input must be a double type";
	}
	
	public function checkemail($data){
		if(!filter_var($data, FILTER_VALIDATE_EMAIL))
			return "Invalid email format";
	}
}