<?php 
	class Admnlogin_Model extends Model{

    function __construct(){
        parent::__construct();
    }
    
    public function getBizness($biz){
		$fields = array("bizshort", "bizlong", "bizadd1", "bizmobile");
		
		$where = " zactive = 1 and bizid = ".$biz."";	
		
		return $this->db->select("pabuziness", $fields, $where);
	}

	public function checklogin($biz, $type){
		if($biz =="" || $type ==""){
			header('location: '. URL .'adminlogin');
			exit;
		}

		if($type == "Admin"){
			$sth = $this->db->prepare("SELECT bizid,zemail,zpassword, zuserfullname FROM pausers 
			WHERE zemail = :login and zpassword = :password and zactive = :zactive and bizid = :bizid");
		}else if($type == "Teacher"){
			$sth = $this->db->prepare("SELECT bizid,xteacher as zemail,xpassword as zpassword,xteachername as zuserfullname FROM eduteacher 
			WHERE xmobile = :login and xpassword = :password and zactive = :zactive and bizid = :bizid");
		}else{
			header('location: '. URL .'adminlogin');
			exit;
		}
		
		//$biz = 100;
		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => Hash::create('sha256',$_POST['password'],HASH_KEY),
			':bizid' => $biz,
			':zactive' => 1
		));
		
		$data = $sth->fetch();
		
		$bizdata = $this->getBizness($biz);
		//print_r($bizdata); die;
		$count = $sth->rowCount();
		
		if($count>0){
			Session::init();
			Session::set('sbizid',$biz);
			Session::set('slogintype', $type);
			Session::set('suser', $data['zemail']);
			Session::set('susername', $data['zuserfullname']);
			Session::set('sbizshort', $bizdata[0]['bizshort']);
			Session::set('sbizlong', $bizdata[0]['bizlong']);
			Session::set('sbizadd1', $bizdata[0]['bizadd1']);
			Session::set('sbizmobile', $bizdata[0]['bizmobile']);
			//Session::set('srole', $data['zrole']);
			
			Session::set('logedin', true);
			
			//Session::set('mainmenus', $menus);
			
			
			header('location: '. URL .'mainmenu');
		}else{
			header('location: '. URL .'adminlogin');
		}
	}

	
    
}

?>