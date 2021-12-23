<?php 
class Payment_model extends Model{
    
        function __construct(){
            parent::__construct();
        }
        function createinvoice($table,$cols, $vals){
            return $this->db->insertmultiple($table,$cols, $vals);
        }
        function createtemp($st){
        //  Logdebug::appendlog(print_r($st, true));
            return $this->db->executecrud($st);
        }
        function getcoursedt($course){
            // Logdebug::appendlog($course);
            return $this->db->select('seitem',array('*'), " xitemcode='".$course."' and bizid = '".BIZID."'");
        }
        function getstudent($user){
            // Logdebug::appendlog($course);
            return $this->db->select('edustudent',array('*'), " xstudent='".$user."' and bizid = '".BIZID."'");
        }
        function updatetemp($st){
            return $this->db->executecrud($st);
        }
        function gettemporder($tempinvoice){
            return $this->db->select('temporder',array(), " tempinvoice='".$tempinvoice."'");
        }
        function getitemdt($item){
            return $this->db->select('seitem',array('xmrp,xdp'), " xitemcode='".$item."'");
        }
        function rindt($cus){
            return $this->db->select('mlminfo',array("xadd1,xpostal"), " xrdin='".$cus."'");
        }
        function cusdt($cus){
            return $this->db->select('secus',array("xadd1, '0' as xpostal"), " xcus='".$cus."'");
        }
        
        function getstno(){
            return $this->db->select('ablstatement',array("COALESCE(max(stno),0) as stno"));
        }
    }

?>