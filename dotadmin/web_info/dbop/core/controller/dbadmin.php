<?php

class Dbadmin extends controller{
    
    private $form="";

    function __construct(){
        parent::__construct();
        $this->view->js = array('views/dbadmin/js/autocomplete.js','public/js/formsubmit.js');
    }

    public function init(){                        
        $api = new Createapi();
        $api->createdataapi("seitem");
               
        $this->view->render("templatedba","dbadmin/init");        
    }

    public function exeq(){
        
        if(!isset($_POST["dbsql"]) && !isset($_POST["optype"]) && !isset($_POST["pass"]) && !isset($_POST["selectlimit"]))
            header ('location: '.URL.'appdba'); 

        //Logdebug::log(serialize($_POST["dbsql"]));    

        $result = array(); 
        $dbresult="";
        $sql = $_POST["dbsql"];

               
        if($this->dbaccess($_POST["pass"])){
            if($_POST["optype"]=="Record Select"){
                if (Apptools::startsWith(strtolower($_POST["dbsql"]),"select")){ 
                    if(!strpos(strtolower($_POST["dbsql"]),"limit"))
                        $sql = $sql." LIMIT ".$_POST["selectlimit"];
                    $result=$this->model->dbselect($sql);
                }
            }
            if($_POST["optype"]=="Record Insert"){
                if (Apptools::startsWith(strtolower($_POST["dbsql"]),"insert")){ 
                    $dbresult=$this->model->executecrud($sql);
                }
            }
            if($_POST["optype"]=="Record Update"){
                if (Apptools::startsWith(strtolower($_POST["dbsql"]),"update")){ 
                        $dbresult=$this->model->executecrud($sql);
                }
            }
            if($_POST["optype"]=="Record Delete"){
                if (Apptools::startsWith(strtolower($_POST["dbsql"]),"delete")){
                    $dbresult=$this->model->executecrud($sql);
                       
                }
            }
            if($_POST["optype"]=="Create Table"){
                if (Apptools::startsWith(strtolower($_POST["dbsql"]),"create")){
                    $dbresult=$this->model->executecrud($sql);
                       
                }
            }
            if($_POST["optype"]=="Drop Table"){
                if (Apptools::startsWith(strtolower($_POST["dbsql"]),"drop")){
                    $dbresult=$this->model->executecrud($sql);
                       
                }
            }
            if($_POST["optype"]=="Describe Table"){
                if (Apptools::startsWith(strtolower($_POST["dbsql"]),"desc")){
                    $result=$this->model->dbselect($sql);
                       
                }
            }
        }
        if($_POST["optype"]=="Record Select" || $_POST["optype"]=="Describe Table"){
            echo $this->buildtable($result, $_POST["selectlimit"]);
        }else{
            echo $dbresult." rows affected!";
        }


    }
    
    public static function dbaccess($pass){
        
        if(file_exists(DBA_CONF)){
            $xml=simplexml_load_file(DBA_CONF);
            if($xml->getName()=="dbaconf"){
                foreach($xml->children() as $child)
                {
                    if ($child->getname()=="dbaccess")
                        if($pass==(string)$child->pass && (string)$child->valid=="yes")    
                            return true;
                }
            }       
        } 
      
        return false;
    }

    function buildtable($array, $limit){
        
        $html = '<div class="table-bar table-responsive"><table class="table table-bordered">';
        // header row
        
        $html .= '<tr>';
        if(!empty($array)){
        foreach($array[0] as $key=>$value){
                $html .= '<th>' . htmlspecialchars($key) . '</th>';
            }
        }
        $html .= '</tr>';
        $x=0;
        // data rows
        if(!empty($array)){
        foreach( $array as $key=>$value){
            $x++;            
            if($x==$limit)
                break;
            $html .= '<tr>';
            foreach($value as $key2=>$value2){
                $html .= '<td>' . htmlspecialchars($value2) . '</td>';
            }
            $html .= '</tr>';
        }
    }
        // finish table and return it
    
        $html .= '</table></div>';
        return $html;
    }
}