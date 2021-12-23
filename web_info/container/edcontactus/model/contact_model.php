<?php 
class Contact_model extends Model{
    function __construct(){
        parent::__construct();
    }

    public function getBusiness(){
        return $this->db->select("pabuziness", array(), " bizid=100");
    }
    public function getcategories(){
        return $this->db->select("educat", array("xcat"), " bizid=100 and zactive=1");
    }
}