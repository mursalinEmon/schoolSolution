<?php 
class Courses_model extends Model{
    function __construct(){
        parent::__construct();
    }

    public function getcourses(){
        // $date = date('Y-m-d');
        $data=Session::get('sbizid');
        //$this->log->modellog($data);
    
        return $this->db->select("seitem", array('*'), "bizid = ".BIZID." and zactive='1'");
    }
    public function getcoursesbycat($cat){
        return $this->db->select("educourse m", array('*,xteacher as teachername'), " bizid = ".Session::get('sbizid')." and xcat='".$cat."' and zactive=1");
    }

    function coursesearch($where){
        return $this->db->select("educourse m", array('*,xteacher as teachername'), $where);
    }

    public function getBusiness(){
        return $this->db->select("pabuziness", array(), " bizid = ".Session::get('sbizid')."");
    }
    public function getmaincategories(){
        return $this->db->select("secodes m", array("xcode, (select count(*) from educourse c where c.xcat=m.xcode and zactive=1) as totalcourse"), " m.bizid=100 and m.xcodetype='Course Category'");
    }
    public function getcategories(){
        return $this->db->select("educat", array("xcat"), " bizid=100 and zactive=1");
    }

    public function getcoursedeatil($course){
        // $date = date('Y-m-d');
        // logdebug::appendlog($course);
        return $this->db->select("seitem", array('*'), " xitemcode='$course' and  bizid = ".BIZID."");
    }
    public function getcourselessons($itemcode){
        // logdebug::appendlog($itemcode);

        return $this->db->select("lesson", array('xdesc'), " xitemcode='$itemcode' and  bizid = ".BIZID."");
        // logdebug::appendlog($course);


    }

    public function getteacherbyid($name){
        $conditions[]="xteachername = ?";
        $params[]=$name;
        return $this->db->dbselectbyparam("eduteacher", "xteacher,xteachername,xeducation,xmobile,xemailaddr,xexpartarea,xowndesc,xexperience",$conditions,$params);
    }
}