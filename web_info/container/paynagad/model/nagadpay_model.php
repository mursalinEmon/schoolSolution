<?php 
class Nagadpay_model extends Model{
    
        function __construct(){
            parent::__construct();
        }
        function save($table,$cols, $vals){
            return $this->db->insertmultiple($table,$cols, $vals);
        }
        function createtemp($st){
            return $this->db->executecrud($st);
        }
        function createtxn($table,$data){
            return $this->db->insert($table,$data);
        }
        function updatetemp($st){
            return $this->db->executecrud($st);
        }
        function gettemporder($tempinvoice){
            return $this->db->select('temp_sales',array(), " xtemptxn='".$tempinvoice."'");
        }
        function getstudent($mobile){
            return $this->db->select('edustudent',array(), " xmobile='".$mobile."'");
        }
        function isordered($tempinvoice){
            return $this->db->select('edusalesmst',array(), " xtemptxn='".$tempinvoice."' and xpaymethod='SSLCOMMERZE'");
        }
        function getcoursedt($course){
            // Logdebug::appendlog($course);
            return $this->db->select('seitem',array('*'), " xitemcode='".$course."'");
        }
        function rindt($cus){
            return $this->db->select('mlminfo',array("xorg,xcusemail,xadd1,xpostal"), " xrdin='".$cus."'");
        }
        function cusdt($cus){
            return $this->db->select('secus',array("xorg,xcusemail,xadd1, '0' as xpostal"), " xcus='".$cus."'");
        }
        
        function getstno(){
            return $this->db->select('ablstatement',array("COALESCE(max(stno),0) as stno"));
        }
    }

?>