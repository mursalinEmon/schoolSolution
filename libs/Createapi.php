<?php
class Createapi {

    function createdataapi($table,$fields=array(),$params=array()){
        
        try{
                $where="";
                
                $myfile = fopen("api/testapi.php", "w") or die("Unable to open file!");
                
                
                $str = "<?php\n include '../libs/Database.php';\n";
                $str .= "\n include '../config.php';\n";
                $cstr = "";
                if(!empty($params)){
                    $pstr = 'if(';
                    $x = 0;
                    foreach($params as $param){
                        $arrpar = explode("~",$param);                        
                        if(count($arrpar)==2){
                            $x++;
                            $pstr .= '!isset($_GET["'.$arrpar[1].'"]) || ';
                            $cstr .= '$param'.$x.'=$_GET["'.$arrpar[1].'"];'."\n";                          
                            //$where .= $arrpar[0].'='."'".'$_GET["'.$arrpar[1].'"]'."'".' and ';
                            $where .= $arrpar[0].'='."'".'$param'.$x."'".' and ';                           
                        }else{
                            throw new Exception("Parameters is not set correctly");
                        }
                    }
                    $where = rtrim($where,'and ');

                    $str .= rtrim($pstr,'|| ')."){\n";

                    $str .= "exit;\n}\n";    
                }
                $str .= $cstr;
                $str .= '$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);'."\n";
                $strfields = '$fields=array(';
                if(empty($fields))
                    $str .= '$fields=array();'."\n";
                else{
                    $strf = "";
                    foreach ($fields as $fld){
                        $strf .= "'".$fld."',";    
                    }
                    $strfields .= rtrim($strf,',').");\n";
                    $str .= $strfields;    
                }
                
                $str .= 'echo json_encode($db->select("'.$table.'",$fields,"'."$where".'"));';
                fwrite($myfile, $str);
                
                return "File created";
            
            }catch(Exception $ex){
                return $ex->getMessage();
            }finally{
                fclose($myfile);   
            }


    }

    function createwrapi(){
        
        try{
        $myfile = fopen("../web_info/api/testapi.php", "w") or die("Unable to open file!");
        
        $str = '<?php\n  $json = file_get_contents("php://input");'."\n";
        $str .= "<?php\n include '../../config.php';\n";
        $str .= '$obj = json_decode($json);'."\n";
        $str .= "include '../../libs/Database.php';\n";
        $str .= '$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);'."\n";        
        
        
        fwrite($myfile, $str);
        
        echo "File created";
        
        }catch(Exception $ex){
            echo "Exception occured!";
        }finally{
            fclose($myfile);   
        }


    }

}