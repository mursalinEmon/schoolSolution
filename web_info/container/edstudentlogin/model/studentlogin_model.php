<?php 
class Studentlogin_model extends Model{
    function __construct(){
        parent::__construct();
    }

    public function getBusiness(){
        return $this->db->select("pabuziness", array(), " bizid=100");
    }
    public function getcategories(){
        return $this->db->select("educat", array("xcat"), " bizid=100 and zactive=1");
    }

    public function checklogin(){
		$bizid = BIZID;
        
		$sth = $this->db->prepare("SELECT xstudentid,xaddress1 FROM edustudent WHERE xstudentid = :login and xpassword = :password and zactive = 1 and xregflag = '1' and bizid = ".BIZID."");
		// $this->log->modellog("SELECT xstudentid,xaddress1 FROM edustudent WHERE xstudentid = :login and xpassword = :password and zactive = 1 and xregflag = 1 and bizid = ".BIZID."");
		$pass = Hash::create('sha256',$_POST["password"],HASH_KEY);
		$sth->execute(array(
			':login' => $_POST['username'],
			':password' => $pass,//Hash::create('sha256',$_POST['password'],HASH_KEY),		
			
		));
		
		$data = $sth->fetch();
		
		
		$count = $sth->rowCount();
		
		
		
		if($count>0){
			Session::init();
			Session::set('sbizid', $bizid);
			Session::set('suser', $data['xstudentid']);		
            Session::set('sadd', $data['xaddress1']);            
			Session::set('loggedIn', true);
			
			
			header('location: '. URL .'dashboard');
		}else{
			header('location: '. URL .'studentlogin');
		}
	}
}