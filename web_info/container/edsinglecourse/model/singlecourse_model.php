<?php 
class Singlecourse_model extends Model{
    function __construct(){
        parent::__construct();
    }

    // public function getcourses(){
    //     $date = date('Y-m-d');
    //     return $this->db->select("educourse m", array('*,xteacher teachername'), " xpriority=1 and zactive=1 and xstartdate>='$date'");
    // }
    // public function getcoursesbycat($cat){
    //     return $this->db->select("educourse m", array('*,xteacher as teachername'), " xcat='".$cat."' and zactive=1");
    // }

    // function coursesearch($where){
    //     return $this->db->select("educourse m", array('*,xteacher as teachername'), $where);
    // }

    // public function getBusiness(){
    //     return $this->db->select("pabuziness", array(), " bizid=100");
    // }
    // public function getmaincategories(){
    //     return $this->db->select("secodes m", array("xcode, (select count(*) from educourse c where c.xcat=m.xcode and zactive=1) as totalcourse"), " m.bizid=100 and m.xcodetype='Course Category'");
    // }
    // public function getcategories(){
    //     return $this->db->select("educat", array("xcat"), " bizid=100 and zactive=1");
    // }

    // public function getcoursedeatil($course){
    //     $date = date('Y-m-d');
    //     return $this->db->select("educourse m", array('*,xteacher as teachername'), " zactive=1 and xstartdate>='$date' and xcourse=$course");
    // }

    // public function getteacherbyid($name){
    //     $conditions[]="xteachername = ?";
    //     $params[]=$name;
    //     return $this->db->dbselectbyparam("eduteacher", "xteacher,xteachername,xeducation,xmobile,xemailaddr,xexpartarea,xowndesc,xexperience",$conditions,$params);
    // }
}