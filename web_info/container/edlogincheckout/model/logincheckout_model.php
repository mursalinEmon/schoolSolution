<?php 
class Logincheckout_model extends Model{
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
        
		$sth = $this->db->prepare("SELECT xstudent,xmobile, xstuname,xaddress,xrefno FROM edustudent 
							WHERE xmobile = :login and xpassword = :password and xverified = 1");
		// $this->log->modellog("SELECT xstudent,xmobile, xstuname,xaddress FROM edstudent 
        // WHERE xmobile = and xpassword = and xverified = 1");
		$pass = Hash::create('sha256',$_POST["password"],HASH_KEY);
		$sth->execute(array(
			':login' => $_POST['username'],
			':password' => $pass,//Hash::create('sha256',$_POST['password'],HASH_KEY),		
			
		));
		
		$data = $sth->fetch();
		
		
		$count = $sth->rowCount();
		
		
		
		if($count>0){
			Session::init();
			Session::set('suser', $data['xstudent']);
			Session::set('refno', $data['xrefno']);
			Session::set('susername', $data['xstuname']);
			Session::set('smobile', $data['xmobile']);		
            Session::set('sadd', $data['xaddress']);            
			Session::set('loggedIn', true);

			header('location: '. URL .'checkout');
		}else{
			$result = rawurlencode('User or Password mismatch!');
			header('location: '. URL .'logincheckout/init/'.$result);
		}
	}
}