<?php 
class Ncheckout_model extends Model{
    function __construct(){
        parent::__construct();
    }

    public function getcourses(){
        return $this->db->select("educourse m", array('*,(select xteachername from eduteacher c where m.xteacher=c.xteacher) as teachername'), " zactive=1");
    }

    public function getBusiness(){
        return $this->db->select("pabuziness", array(), " bizid=100");
    }
    public function getmaincategories(){
        return $this->db->select("secodes m", array("xcode, (select count(*) from educourse c where c.xcat=m.xcode and zactive=1) as totalcourse"), " m.bizid=100 and m.xcodetype='Course Category'");
    }
    public function getcategories(){
        return $this->db->select("educat", array("xcat"), " bizid=100 and zactive=1");
    }
 
    public function getstudentinfo($student){
        return $this->db->select("edustudent m", array('*'), " m.xstudent='".$student."'");
    }
    public function getteacherbyid($id){
        $conditions[]="xteacher = ?";
        $params[]=$id;
        return $this->db->dbselectbyparam("eduteacher", "xteacher,xteachername,xeducation,xmobile,xemailaddr,xexpartarea,xowndesc,xexperience",$conditions,$params);
    }
}