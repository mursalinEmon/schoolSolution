<?php 
	class Facprofile_Model extends Model{

    function __construct(){
        parent::__construct();
    }

    public function update($table, $data, $where){
        return $this->db->dbupdate($table, $data, $where);
    }

    function dbinsert($table,$data){
        return $this->db->insert($table,$data);
    }
    
    public function getteacherdt(){
        return $this->db->select("eduteacher", array(), " xteacher='".Session::get("fuser")."'");
    }
    public function getcategories(){
        return $this->db->select("educat", array("xcat,xsubcat"), " bizid=100 and zactive=1");
    }
    public function getteachers(){
        return $this->db->select("eduteacher", array(), " zactive=1 LIMIT 6");
    }
    public function getcoursedt(){
        return $this->db->select("educourse", array(), " xteacher='".Session::get("fuser")."'");
    }
    public function mycurcourses(){
        return $this->db->select("educourse m", array("*"), " m.xteacher='".Session::get("fusername")."'");
    }
}

?>