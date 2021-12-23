<?php
class Myacc_model extends Model{
    function __construct(){
        parent::__construct();
    }

    function binlist(){
        echo json_encode($this->db->select("mlmtree",array("bin")," distrisl = ".Session::get('sdistrisl')));
    }

    function myledger($stfrom,$stto,$searchstr){
            $where  = " stno between $stfrom and $stto and bin = $searchstr  order by stno desc";
            
            if($searchstr=='ALL'){
                $where = " stno between $stfrom and $stto and xrdin = '".Session::get('suser')."' order by stno desc, xcomtype";
            }
            //$this->log->modellog($where);
            echo json_encode($this->db->select('mlmtotrep',array("DATE_FORMAT(xdate,'%d-%m-%Y') as txndate,stno,bin,xcomtype as comtype,truncate(xcom-(xcom*(xsrctaxpct/100)),2) as com"),$where));
    }
    
}