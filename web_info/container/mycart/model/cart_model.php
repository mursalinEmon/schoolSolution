<?php 
	class Cart_Model extends Model{

    function __construct(){
        parent::__construct();
    }
    
    public function getBusiness(){
        return $this->db->select("pabuziness", array(), " bizid=100");
    }
    public function getmaincategories(){
        return $this->db->select("secodes m", array("xcode, (select count(*) from educourse c where c.xcat=m.xcode and zactive=1) as totalcourse"), " m.bizid=100 and m.xcodetype='Course Category'");
    }
    public function getcategories(){
        return $this->db->select("educat", array("xcat,xsubcat"), " bizid=100 and zactive=1");
    }
}

?>