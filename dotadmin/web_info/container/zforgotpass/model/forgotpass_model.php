<?php
class Forgotpass_model extends Model{
    function __construct(){
        parent::__construct();
    }

    function createlog($data){
        return $this->db->insert('ablsmslog', $data);
    }
    
    function checkAdmin($bizid, $user){
        $conditions[]= "bizid = ?";
        $conditions[]= "zemail = ? ";
        $params[]= $bizid;
        $params[]= $user;
		return $this->db->dbselectbyparam('pausers','zusermobile, zuserfullname',$conditions,$params);
    }

    function checkTeacher($bizid, $user){
        $conditions[]= "bizid = ?";
        $conditions[]= "xemailaddr = ? ";
        $params[]= $bizid;
        $params[]=$user;
		return $this->db->dbselectbyparam('eduteacher','xmobile, xteachername',$conditions,$params);
    }

    function lasttime($rin, $mobile){
        $conditions[]= "xrdin = ?";
        $conditions[]= "xmobile like ?";
        $conditions[]= " 1=1 order by xsl desc LIMIT 1";
        $params[]= $rin;    
        $params[]= "%".$mobile."%";
		return $this->db->dbselectbyparam('ablsmslog',"ztime",$conditions,$params);
    }

    function updatepass($table, $udata, $where){
        return $this->db->dbupdate($table, $udata, $where);
    }
}