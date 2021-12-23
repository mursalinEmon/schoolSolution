<?php

class Dbportal_Model extends Model{

    function __construct(){
        parent::__construct();
    }
    
    public function getitems(){
		echo json_encode($this->db->select("seitem",array("xitemcode,xdesc,xstdprice"),""));
	}
}