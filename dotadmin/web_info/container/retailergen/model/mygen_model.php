<?php

class Mygen_model extends Model{

    function __construct(){
        parent::__construct();
    }


    function getgendetail($gentype){

        $conditions[]= $gentype." = ?";
		$params[]= Session::get('suser');
		return $this->db->dbselectbyparam('mlminfo','xrdin as rin,xorg as cusname,xmobile as mobile,(select min(bin) from mlmtree where mlminfo.distrisl=mlmtree.distrisl) as bin',$conditions,$params);

    }

    
}