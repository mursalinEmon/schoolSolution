<?php
class Codesetting_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	public function create($data){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("secodes", $data);
	}
	public function updatecode($data, $where){
		//$this->log->modellog( serialize($data));die;
		return $this->db->dbupdate("secodes", $data, $where);
	}
	public function deletecode($st){
		//$this->log->modellog( serialize($data));die;
		return $this->db->executecrud($st);
	}
	function getcodes($type){
		$data = $this->db->select("vsecodes", array("codeid,xcodetype,xcode,xdesc as xdepcode"), " xcodetype='$type'");
		echo json_encode($data);
	}
	function gettemplates($type){
		$data = $this->db->select("senotestemplate", array("xsl as codeid,xtemplatefor as xcodetype,xtemplatename as xcode,'' as xdepcode"), " xtemplatefor='$type'");
		echo json_encode($data);
	}
	function getsinglecode($type, $code){
		$data = $this->db->select("vsecodes", array("codeid,xcodetype,xcode,xdesc as xdepcode"), " xcodetype='$type' and xcode='$code'");
		echo json_encode($data);
	}
	function getsingletemplate($type, $template){
		$data = $this->db->select("senotestemplate", array("xsl as codeid,xtemplatefor as xcodetype,xtemplatename as xcode,xtemplate as xdepcode"), " xtemplatefor='$type' and xtemplatename='$template'");
		echo json_encode($data);
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
}