<?php 
class Paymentsucc_model extends Model{
    
        function __construct(){
            parent::__construct();
        }

        public function getstudentinfo($student){
            // logdebug::appendlog($student);
            // $this->log->modellog($student);
    
            return $this->db->select("edustudent m", array('*'), " m.xstudent='".$student."'");
        }
        
        public function getcourses(){
            return $this->db->select("educourse m", array('*,(select xteachername from eduteacher c where m.xteacher=c.xteacher) as teachername'), " zactive=1");
        }
        
    }

?>