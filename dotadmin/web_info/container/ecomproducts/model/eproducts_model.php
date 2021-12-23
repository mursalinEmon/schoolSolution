<?php 
	class Eproducts_Model extends Model{

    function __construct(){
        parent::__construct();
    }
    
    public function getproducts(){
        return $this->db->select("seitem",array("xitemcode,xdesc,xstdprice,xdp"));
    }

    public function getitembyid($item){
        $cond[] = "xitemcode = ?";
        $param[] = $item;
        return $this->db->dbselectbyparam("seitem","xitemcode,xdesc,xlongdesc,xstdprice,xdp",$cond,$param);
    }

    
}

?>