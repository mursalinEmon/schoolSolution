<?php 
	class Adminhome_Model extends Model{

    function __construct(){
        parent::__construct();
    }
    
    public function bizlist(){
		
		$fields = array("bizid", "bizshort", "bizlong", "bizadd1");
		//print_r($this->db->select("pabuziness", $fields));die;
			
		return $this->db->select("pabuziness", $fields, " zactive=1");
	}
}

?>