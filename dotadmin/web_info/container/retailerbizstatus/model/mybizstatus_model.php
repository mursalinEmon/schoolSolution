<?php
class Mybizstatus_model extends Model{
    
    function __construct(){
        parent::__construct();
        
    }

    // function requiredbv(){
    //     echo json_encode($this->db->select("mlmtree m",array("m.bin as bin,m.binstatus as binstatus,
    //     (select lefttotalpoint+lefthitpoint from mlmtree_matching c where m.bin=c.bin) as leftpoint,
    //     (select righttotalpoint+righthitpoint from mlmtree_matching c where m.bin=c.bin) as rightpoint,
    //     (select COALESCE(sum(xcom),0) from mlmtotrep c where m.bin=c.bin and m.binstatus=c.xrintype and xcomtype='Daily Sales Commission') as com")," m.binstatus in ('Primary','Regular') and m.distrisl = ".Session::get('sdistrisl')." order by bin"));
    // }

    function requiredbv(){
        echo json_encode($this->db->select("mlmtree m",array("m.bin as bin,m.binstatus as binstatus,
        (select lefttotalpoint+lefthitpoint from mlmtree_matching c where m.bin=c.bin) as leftpoint,
        (select righttotalpoint+righthitpoint from mlmtree_matching c where m.bin=c.bin) as rightpoint,
        (select basiccom from mlmtree_matching c where m.bin=c.bin) as basiccom,
        (select COALESCE(sum(xcom),0) from mlmtotrep c where m.bin=c.bin and m.binstatus=c.xrintype and xcomtype='Daily Sales Commission') as com")," m.binstatus in ('Primary','Regular') and m.distrisl = ".Session::get('sdistrisl')." order by bin"));
    }

    function mytodaysales($bin){
		$ateam=$this->db->select('mlmtree', array("COALESCE(sum(xpoint),0) as bv"), "  stno='".Session::get('sstno')."' and find_in_set((select leftbin from mlmtree where bin='".$bin."'), parent)");
		$bteam=$this->db->select('mlmtree', array("COALESCE(sum(xpoint),0) as bv"), "  stno='".Session::get('sstno')."' and find_in_set((select rightbin from mlmtree where bin='".$bin."'), parent)");
		
		echo json_encode(array('ateam'=>$ateam[0]['bv'],'bteam'=>$bteam[0]['bv']));
	}

} 