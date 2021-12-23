<?php 
class Itemdatabase_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('seitem',$data, $onduplicate);
	}
	
	public function executest($st){
		return $this->db->executecrud($st);
	}
}

?>