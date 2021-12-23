<?php

class Placement_model extends Model{
    function __construct(){
		parent::__construct();
	}
	
	function createasupline($data){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('mlmtree',$data);
	}

	function pointentry($data){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('mlmbv',$data);
	}

	function ulineupdate($data, $where){
		return $this->db->dbupdate('mlmtree',$data, $where);
	}

	function cretecom($st){
		return $this->db->executecrud($st);
	}

	function isupline($bin){
		if(Session::get('sbin')!=0){
			$data = $this->db->select("mlmtree",array(), " bin=".$bin." and find_in_set('".Session::get('sbin')."',parent)");
			if(count($data)>0)
				return true;
			else
				return false;
		}else{
			return false;
		}
	}

	function balancebv($rin, $pin){
		$rindt = $this->getrindt($rin);
		if($rindt[0]['xpin']==$pin){
			$conditions[]= "xcus = ?";
			$params[]= $rindt[0]['xcus'];
			return $this->db->dbselectbyparam('mlmbv','coalesce(sum(point*xsign),0) as balbv',$conditions,$params);
		}
 		return array();		

	}
	
	function getTree($bin=0){

		
		if($bin>0){
			if(!$this->isupline($bin))
				$bin=0;
			}
		$treearray = array("rootnode"=>array(),"leftnode"=>array(),"rightnode"=>array());
		if($bin>0){
			
			$root=$this->db->select('mlmtree c', array("bin,(select xrdin from mlminfo m where c.distrisl=m.distrisl) as rin,(select xorg from mlminfo m where c.distrisl=m.distrisl) as fullname,(select xmobile from mlminfo m where c.distrisl=m.distrisl) as mobile,bc,upbin,leftbin,rightbin, (select leftcurpoint from mlmtree_matching where bin=$bin) as atotalpoint, (select rightcurpoint from mlmtree_matching where bin=$bin) as btotalpoint,(select leftcstpoint from mlmtree_matching where bin=$bin) as lcp,(select rightcstpoint from mlmtree_matching where bin=$bin) as rcp,binstatus as bintype"), " bin=$bin");
		}else
			$root=$this->db->select('mlmtree c', array("bin,(select xrdin from mlminfo m where c.distrisl=m.distrisl) as rin,(select xorg from mlminfo m where c.distrisl=m.distrisl) as fullname,(select xmobile from mlminfo m where c.distrisl=m.distrisl) as mobile,bc,upbin,leftbin,rightbin, (select leftcurpoint from mlmtree_matching where bin=".Session::get('sbin').") as atotalpoint, (select rightcurpoint from mlmtree_matching where bin=".Session::get('sbin').") as btotalpoint,(select leftcstpoint from mlmtree_matching where bin=".Session::get('sbin').") as lcp,(select rightcstpoint from mlmtree_matching where bin=".Session::get('sbin').") as rcp,binstatus as bintype"), " bin=".Session::get('sbin')."");
			
			
		if(count($root)>0){
			$treearray["rootnode"]=$root[0];			
// 			$left=$this->db->select('mlmtree c', array("bin,(select xrdin from mlminfo m where c.distrisl=m.distrisl) as rin,(select xorg from mlminfo m where c.distrisl=m.distrisl) as fullname,(select xmobile from mlminfo m where c.distrisl=m.distrisl) as mobile,bc,upbin,leftbin,(select xorg from mlminfo m where c.leftdistrisl=m.distrisl) as leftname,rightbin,(select xorg from mlminfo m where c.rightdistrisl=m.distrisl) as rightname, lefthitpoint+lefttotalpoint as atotalpoint, righthitpoint+righttotalpoint as btotalpoint,leftcstpoint as lcp,rightcstpoint as rcp,binstatus as bintype"), " bin=".$root[0]['leftbin']);
// 			if(count($left)>0){
// 				$treearray["leftnode"]=$left[0];
// 			}
// 			$right=$this->db->select('mlmtree c', array("bin,(select xrdin from mlminfo m where c.distrisl=m.distrisl) as rin,(select xorg from mlminfo m where c.distrisl=m.distrisl) as fullname,(select xmobile from mlminfo m where c.distrisl=m.distrisl) as mobile,bc,upbin,leftbin,(select xorg from mlminfo m where c.leftdistrisl=m.distrisl) as leftname,rightbin,(select xorg from mlminfo m where c.rightdistrisl=m.distrisl) as rightname, lefthitpoint+lefttotalpoint as atotalpoint, righthitpoint+righttotalpoint as btotalpoint,leftcstpoint as lcp,rightcstpoint as rcp,binstatus as bintype"), " bin=".$root[0]['rightbin']);
// 			if(count($right)>0){
// 				$treearray["rightnode"]=$right[0];
// 			}

            $left=$this->db->select('mlmtree c', array("bin,(select xrdin from mlminfo m where c.distrisl=m.distrisl) as rin,(select xorg from mlminfo m where c.distrisl=m.distrisl) as fullname,(select xmobile from mlminfo m where c.distrisl=m.distrisl) as mobile,bc,upbin,leftbin,(select xorg from mlminfo m where c.leftdistrisl=m.distrisl) as leftname,rightbin,(select xorg from mlminfo m where c.rightdistrisl=m.distrisl) as rightname, (select leftcurpoint from mlmtree_matching where bin=c.bin) as atotalpoint, (select rightcurpoint from mlmtree_matching where bin=c.bin) as btotalpoint,(select leftcstpoint from mlmtree_matching where bin=c.bin) as lcp,(select rightcstpoint from mlmtree_matching where bin=c.bin) as rcp,binstatus as bintype"), " side='A' and upbin=".$root[0]['bin']);
			if(count($left)>0){
				$treearray["leftnode"]=$left[0];
			}
			$right=$this->db->select('mlmtree c', array("bin,(select xrdin from mlminfo m where c.distrisl=m.distrisl) as rin,(select xorg from mlminfo m where c.distrisl=m.distrisl) as fullname,(select xmobile from mlminfo m where c.distrisl=m.distrisl) as mobile,bc,upbin,leftbin,(select xorg from mlminfo m where c.leftdistrisl=m.distrisl) as leftname,rightbin,(select xorg from mlminfo m where c.rightdistrisl=m.distrisl) as rightname, (select leftcurpoint from mlmtree_matching where bin=c.bin) as atotalpoint, (select rightcurpoint from mlmtree_matching where bin=c.bin) as btotalpoint,(select leftcstpoint from mlmtree_matching where bin=c.bin) as lcp,(select rightcstpoint from mlmtree_matching where bin=c.bin) as rcp,binstatus as bintype"), " side='B' and upbin=".$root[0]['bin']);
			if(count($right)>0){
				$treearray["rightnode"]=$right[0];
			}
		}
		//print_r($treearray); die;
		return $treearray;
	}
	function getbc($distrisl){
		$conditions[]= "distrisl = ?";
		$params[]= $distrisl;
		return $this->db->dbselectbyparam('mlmtree','coalesce(max(bc),0)+1 as bc',$conditions,$params);
	}
	function getbindt($bin){
		$conditions[]= "bin = ?";
		$params[]= $bin;
		return $this->db->dbselectbyparam('mlmtree c','bin,distrisl,(select xrdin from mlminfo m where c.distrisl=m.distrisl) as rin,(select xorg from mlminfo m where c.distrisl=m.distrisl) as fullname,(select xmobile from mlminfo m where c.distrisl=m.distrisl) as mobile,leftbin,rightbin,bc,xcus,xpin,parent',$conditions,$params);
	}

	function getrindt($rin){
		$conditions[]= "xrdin = ?";
		$params[]= $rin;
		return $this->db->dbselectbyparam('mlminfo','xrdin,distrisl,xorg,xmobile,xcus,xpin,refrin,refrin1,refrin2,refrin3,refrin4',$conditions,$params);
	}
	function getrindtbydistrisl($distrisl){
		$conditions[]= "distrisl = ?";
		$params[]= $distrisl;
		return $this->db->dbselectbyparam('mlminfo','xrdin,refrin,refrin1,refrin2,refrin3,refrin4',$conditions,$params);
	}

	function getSatementNo(){
		return $this->db->getStatementNo();
	}
    
    
}