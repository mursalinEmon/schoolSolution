<?php 
class Teacherlogin_model extends Model{
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
        
		$sth = $this->db->prepare("SELECT xteacher,xmobile, xteachername,xaddress FROM eduteacher 
							WHERE xmobile = :login and xpassword = :password and xverified = 1 & xstatus='Approved'");
		
		$pass = Hash::create('sha256',$_POST["password"],HASH_KEY);
		$sth->execute(array(
			':login' => $_POST['username'],
			':password' => $pass,//Hash::create('sha256',$_POST['password'],HASH_KEY),		
			
		));
		//  $this->log->modellog("SELECT xteacher,xmobile, xteachername,xaddress FROM eduteacher 
		// 					WHERE xmobile = '".$_POST['username']."' and xpassword = '$pass' and xverified = 1");
		$data = $sth->fetch();
		
		
		$count = $sth->rowCount();
		
		
		
		if($count>0){
			Session::init();
			Session::set('fuser', $data['xteacher']);
			Session::set('fusername', $data['xteachername']);
			Session::set('fmobile', $data['xmobile']);		
            Session::set('faddr', $data['xaddress']);            
			Session::set('teacherlogin', true);
			
			
			header('location: '. URL .'facdashboard');
		}else{
			header('location: '. URL .'teacherlogin');
		}
	}
} 