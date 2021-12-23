<?php 
class Cuslogin_model extends Model{

    function __construct(){
        parent::__construct();
    }

    function createcus($data){
        return $this->db->insert('secus',$data);
    }

    function getcustomerdt($mobile){
        $conditions =  ['xcus=?', 'bizid=?'];
        $params = [$mobile, '100'];
        return $this->db->dbselectbyparam('secus','xcus,xorg,xgender,xmobile,xcusemail',$conditions, $params);
    }


}