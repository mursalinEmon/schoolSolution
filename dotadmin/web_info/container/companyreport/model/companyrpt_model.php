<?php

class Companyrpt_model extends Model{
    function __construct(){
        parent::__construct();
    }

    public function gendata($date){
        $where = " xdate='".$date."' and xcompany='".Session::get('sbranch')."'";
        if(Session::get('sbranch')=='Admin'){
            $where = " xdate='".$date."'";
        }
        
        echo json_encode($this->db->select('power_generation',array("xdate,xhourending,xtime,xplant1,xplant2,xcompany"), $where));
    }

    public function offerdata($date){
        $where = " xdate='".$date."'";
        if(Session::get('sbranch')=='Admin'){
            $where = " xdate='".$date."'";
        }
        
        echo json_encode($this->db->select('power_offer',array("xdate,xhourending,xpriceb0,xvolumeb0,xpriceb1,xvolumeb1,xpriceb2,xvolumeb2,xpriceb3,xvolumeb3,xpriceb4,xvolumeb4,xpriceb5,xvolumeb5,xpriceb6,xvolumeb6"), $where));
    }
}