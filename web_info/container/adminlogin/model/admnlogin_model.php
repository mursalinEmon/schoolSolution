<?php 
	class Admnlogin_Model extends Model{

    function __construct(){
        parent::__construct();
    }
    
    public function getBizness($biz){
		$fields = array("bizid", "bizshort", "bizlong", "bizcur", "bizdecimals","bizitemauto","bizcusauto","bizsupauto","bizdateformat",
		"bizadd1", "bizvatpct", "bizchkinv","bizyearoffset");
		
		$where = "bizid = ".$biz;	
		
		return $this->db->select("pabuziness", $fields, $where);
	}

	public function checklogin(){
		$sth = $this->db->prepare("SELECT xusersl,bizid, zemail,zuserfullname, zrole, xbranch FROM pausers 
							WHERE zemail = :login and zpassword = :password and token = :token and bizid = :bizid");
		$biz = $_POST['bizid'];
		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => Hash::create('sha256',$_POST['password'],HASH_KEY),
			':bizid' => $biz,
			':token' => $_POST['token'],
		));
		
		$data = $sth->fetch();
		
		$where = "bizid = ". $data['bizid'] ." and zrole = '". $data['zrole'] ."' and xmenutype='Main Menu'";
		
		$menus = $this->getMainMenu($where);
		
		$bizdata = $this->getBizness($biz);
		//print_r($bizdata); die;
		
		
		$count = $sth->rowCount();
		
		
		
		if($count>0){
			Session::init();
			Session::set('suser', $data['zemail']);
			Session::set('susername', $data['zuserfullname']);
			Session::set('srole', $data['zrole']);
			Session::set('sbranch', $data['xbranch']);
			Session::set('suserrow', $data['xusersl']);
			//Session::set('sbin', $data['bin']);//as warehouse
			Session::set('sbizid', $data['bizid']);
			Session::set('sbizshort', $bizdata[0]['bizshort']);
			Session::set('sbizlong', $bizdata[0]['bizlong']);
			Session::set('sbizadd', $bizdata[0]['bizadd1']);
			Session::set('svatpct', $bizdata[0]['bizvatpct']);
			Session::set('sbizcur', $bizdata[0]["bizcur"]);
			Session::set('schkinv', $bizdata[0]["bizchkinv"]);
			Session::set('sbizdecimals', $bizdata[0]["bizdecimals"]);
			Session::set('sbizitemauto', $bizdata[0]["bizitemauto"]);
			Session::set('sbizcusauto', $bizdata[0]["bizcusauto"]);
			Session::set('sbizsupauto', $bizdata[0]["bizsupauto"]);
			Session::set('sbizdateformat', $bizdata[0]["bizdateformat"]);
			Session::set('syearoffset', $bizdata[0]["bizyearoffset"]);
			Session::set('loggedIn', true);
			//Session::set('mainmenus', $menus);
			
			
			header('location: '. URL .'mainmenu');
		}else{
			header('location: '. URL .'adminlogin/init/'.$biz);
		}
	}

	public function getMainMenu($where){
		$fields = array("xmenuindex","xmenu","xsubmenuindex","xsubmenu","xurl");
		
			
		return $this->db->select("pamenus", $fields, $where);
	}
    
}

?>