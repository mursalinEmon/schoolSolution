<?php 
class Ablpay_model extends Model{
    
        function __construct(){
            parent::__construct();
        }

        function createinvoice($table,$cols, $vals){
            return $this->db->insertmultiple($table,$cols, $vals);
        }
        function createtemp($st){
            return $this->db->executecrud($st);
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
        
        function getrindt($rin, $pin){
            $conditions[]= "xrdin = ?";
            $conditions[]= "xpin = ?";
            $params[]= $rin;
            $params[]= $pin;
            
            return $this->db->dbselectbyparam('mlminfo','xmobile as mobile, xorg as rinname',$conditions,$params);
        }

        
    }

?>