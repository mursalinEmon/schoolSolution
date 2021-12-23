<?php 
class Mainmenu_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	
		public function bindt(){
		
		echo json_encode($this->db->select('mlmtree', array("bin,binstatus,binpoint,leftcurpoint+lefthitpoint as abv,rightcurpoint+righthitpoint as bbv, executivetype"), "  distrisl='".Session::get('sdistrisl')."'"));
	}
	public function getgenerationsum(){

		$gen1 = $this->db->select('mlminfo', array("COALESCE(count(*),0) as gen1"), "  refrin='".Session::get('suser')."'");
		$gen2 = $this->db->select('mlminfo', array("COALESCE(count(*),0) as gen2"), "  refrin1='".Session::get('suser')."'");
		$gen3 = $this->db->select('mlminfo', array("COALESCE(count(*),0) as gen3"), "  refrin2='".Session::get('suser')."'");
		$gen4 = $this->db->select('mlminfo', array("COALESCE(count(*),0) as gen4"), "  refrin3='".Session::get('suser')."'");
		$gen5 = $this->db->select('mlminfo', array("COALESCE(count(*),0) as gen5"), "  refrin4='".Session::get('suser')."'");
		
		echo json_encode(array('gen1'=>$gen1[0]['gen1'],'gen2'=>$gen2[0]['gen2'],'gen3'=>$gen3[0]['gen3'],'gen4'=>$gen4[0]['gen4'],'gen5'=>$gen5[0]['gen5']));
	}

	

	function mytodaysales(){
		$ateam=$this->db->select('mlmtree', array("bin,(select xorg from mlminfo where distrisl=mlmtree.distrisl) as retailename,binpoint as bv"), "  stno='".Session::get('sstno')."' and find_in_set((select leftbin from mlmtree where leftbin>0 and bin='".Session::get('sbin')."'), parent) order by bin desc");
		$bteam=$this->db->select('mlmtree', array("bin,(select xorg from mlminfo where distrisl=mlmtree.distrisl) as retailename,binpoint as bv"), "  stno=".Session::get('sstno')." and find_in_set((select rightbin from mlmtree where rightbin>0 and bin='".Session::get('sbin')."'), parent) order by bin desc");
		$ateamn=$this->db->select('mlmtree', array("bin,(select xorg from mlminfo where distrisl=mlmtree.distrisl) as retailename,binpoint as bv"), " bin in (select bin from mlmbv where status=0 and xdoctype in ('BV Upload', 'BC Upgrade')) and find_in_set((select leftbin from mlmtree where leftbin>0 and bin='".Session::get('sbin')."'), parent) order by bin desc");
		
		$bteamn=$this->db->select('mlmtree', array("bin,(select xorg from mlminfo where distrisl=mlmtree.distrisl) as retailename,binpoint as bv"), " bin in (select bin from mlmbv where status=0 and xdoctype in ('BV Upload', 'BC Upgrade')) and find_in_set((select rightbin from mlmtree where rightbin>0 and bin='".Session::get('sbin')."'), parent) order by bin desc");
		//$this->log->modellog(print_r(array('ateamn'=>$ateamn), true));
		echo json_encode(array('ateam'=>$ateam,'bteam'=>$bteam,'ateamn'=>$ateamn,'bteamn'=>$bteamn));
	}

	function mytodayscom(){
		echo json_encode($this->db->select("mlmtotrep",array("xcomtype as comtype, coalesce(sum(xcom),0) as com")," xrdin = '".Session::get('suser')."' and stno='".$this->getSatementNo()."' group by xcomtype"));
	}
	
	function getbalance(){
		$mybv = $this->db->select("mlmbv",array("truncate(coalesce(sum(point*xsign),0),3) as mybv")," xcus = '".Session::get('scin')."'");
		$myospbv = $this->db->select("imretaildet",array("truncate(coalesce(sum(xqty*xbv*xsign),0),3) as myospbv")," xdoc between 0 and 3 and xrdin = '".Session::get('suser')."'");
		$apacc = $this->db->select("ablwallet",array("truncate(coalesce(sum(xtxnamt*xsign),0),3) as mypbal")," xrdin = '".Session::get('suser')."'");
		echo json_encode(array("mybv"=>$mybv[0]['mybv'],"myospbv"=>$myospbv[0]['myospbv'], "myapacc"=>$apacc[0]['mypbal']));
	}
	function getSatementNo(){
		return $this->db->getStatementNo();
	}

}    
?>