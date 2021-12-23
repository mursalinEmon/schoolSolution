<?php 
class Sslpay_model extends Model{
    
        function __construct(){
            parent::__construct();
        }
        function createinvoice($table,$cols, $vals){
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
            return $this->db->select('temporder',array(), " tempinvoice='".$tempinvoice."'");
        }
        function isordered($tempinvoice){
            return $this->db->select('imretaildet',array(), " xdocnum='".$tempinvoice."' and xpaymethod='SSLCOMMERZE'");
        }
        function getitemdt($item){
            return $this->db->select('seitem',array('xstdprice,xdp'), " xitemcode='".$item."'");
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