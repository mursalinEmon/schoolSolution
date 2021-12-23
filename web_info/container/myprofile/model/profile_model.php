<?php 
	class Profile_Model extends Model{

    function __construct(){
        parent::__construct();
    }

    public function update($table, $data, $where){
        return $this->db->dbupdate($table, $data, $where);
    }
    
    public function getstudentdt(){
        return $this->db->select("edustudent", array(), " xstudent='".Session::get("suser")."'");
    }
    public function getcategories(){
        return $this->db->select("educat", array("xcat,xsubcat"), " bizid=100 and zactive=1");
    }
    public function getteachers(){
        return $this->db->select("eduteacher", array(), " zactive=1 LIMIT 6");
    }

    public function mycurcourses(){
        return $this->db->select("ecomsalesdet", array("*", "sum(xrate) as xrate", "DATE_FORMAT(xdate, '%d-%m-%Y') as xdate"), " bizid = ".Session::get("sbizid")." and xcus='".Session::get("suser")."' group by xecomsl");
    }
    
    public function getpuritems($invoice){
        $noticedt = $this->db->select("ecomsalesdet", array('*',"(select xdesc from seitem where bizid=ecomsalesdet.bizid and xitemcode=ecomsalesdet.xitemcode) as xitemdesc","(select xbatchname from batch where bizid=ecomsalesdet.bizid and xbatch=ecomsalesdet.xbatch) as xbatchname"), " bizid = ".Session::get('sbizid')." and xecomsl='$invoice'");
        return $noticedt;
    }
}

?>