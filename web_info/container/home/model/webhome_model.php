<?php 
	class Webhome_Model extends Model{

    function __construct(){
        parent::__construct();
    }
    
    public function getBusiness(){
        return $this->db->select("pabuziness", array(), " bizid=100");
    }
    public function getcategories(){
        return $this->db->select("educat m", array("xcatsl,xcat, (select COALESCE(count(*),0) from educourse c where m.xcat=c.xcat and c.xfinished=1) as tc"), " bizid=100 and zactive=1");
    }
    public function getteachers(){
        return $this->db->select("eduteacher", array(), " zactive=1 and category='Popular' order by xsortindex LIMIT 6");
    }
    public function getcourses(){
        // $date = date('Y-m-d');
        return $this->db->select("seitem", array('*'), " bizid = ".BIZID." and zactive='1'");
    }
    public function getcourse($itemcode){
        // $date = date('Y-m-d');
        // logdebug::appendlog($itemcode);
        return $this->db->select("seitem", array('*'), " xitemcode='$itemcode' and  bizid = ".BIZID."");
    }
}

?>