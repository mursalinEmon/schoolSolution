<?php
class Forgotpass extends Controller{
    function __construct(){
        parent::__construct();

        $this->view->script=$this->script();
    }

    function init(){
        
        $this->view->render("rawtemplate","abr/forgotpass_view");
    }

    function strclean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
     
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     }

    function sendpass(){
        if(!isset($_POST['bizid']) && isset($_POST['user']) && isset($_POST['logintype'])){
            echo "<p style='color:red'>Please enter Login Code, User & Login Type!</p>";
            exit;
        }
        
        if($_POST['user']==""){
            echo "<p style='color:red'>User can not be empty!</p>";
            exit;
        }
        
        if($_POST['bizid']==""){
            echo "<p style='color:red'>Login Code can not be empty!</p>";
            exit;
        }

        if($_POST['logintype']==""){
            echo "<p style='color:red'>Login Type can not be empty!</p>";
            exit;
        }

        // $bizid = str_replace(' ','',$this->strclean(filter_var($_POST['bizid'], FILTER_SANITIZE_STRING)));
        // $user = str_replace(' ','',$this->strclean(filter_var($_POST['user'], FILTER_SANITIZE_STRING)));
        // $logintype = str_replace(' ','',$this->strclean(filter_var($_POST['logintype'], FILTER_SANITIZE_STRING)));

        $user = str_replace(' ','',$_POST['user']);
        $bizid = str_replace(' ','',$_POST['bizid']);
        $logintype = str_replace(' ','',$_POST['logintype']);

        $sendsms = new Sendsms();
        $rawpass = $sendsms->randPass(6);
		$password = Hash::create('sha256',$rawpass,HASH_KEY); 

        if($logintype == "Admin"){
            $checkuser = $this->model->checkAdmin($bizid, $user);
            if(count($checkuser)==0){
                echo "<p style='color:red'>Login code & User not matched!</p>";
                exit;
            }

            $mobile = $checkuser[0]['zusermobile'];
            $name = $checkuser[0]['zuserfullname'];
            $table = "pausers";
            $udata = array(
                "zpassword"=>$password
            );
            $where = " bizid = ".$bizid." and zemail='".$user."'";

        }elseif($logintype == "Teacher"){
            $checkuser = $this->model->checkTeacher($bizid, $user);
            if(count($checkuser)==0){
                echo "<p style='color:red'>Login code & User not matched!</p>";
                exit;
            }

            $mobile = $checkuser[0]['xmobile'];
            $name = $checkuser[0]['xteachername'];
            $table = "eduteacher";
            $udata = array(
                "xpassword"=>$password
            );
            $where = " bizid = ".$bizid." and xemailaddr='".$user."'";

        }

        $success=$this->model->updatepass($table, $udata, $where);

        if(substr( $mobile, 0, 2 ) !== "88"){
            $mobile = "88".$mobile;
        }

        $sendsms->send_single_sms($name.', Your password changed. New password : '.$rawpass, $mobile);

        echo '<p style="color:green">Your password changed and sms sent to '.$mobile.'</p>';
        
        // $getlasttime = $this->model->lasttime($bizid, $user);
        // $starttime = '2020-01-01 12:00:00';
        // if(count($getlasttime)>0){
        //     $starttime = date('Y-m-d H:i:s',strtotime($getlasttime[0]['ztime']));
        // }
        // //Logdebug::appendlog($starttime);
        // if($this->datetimediff($starttime)<5){
        //     $lft = 5-$this->datetimediff($starttime);
        //     echo "Wait $lft minuites and then try again!";
        //     exit;
        // }
        
        // $pin = $rindt[0]['zusermobile'];
        // $data = array(
        //     "xrdin"=>$bizid,
        //     "xmobile"=>$mobile
        // );

        // $success = $this->model->createlog($data);

    }

    // function datetimediff($startdate){
    //     $start_date = strtotime($startdate);
    //     //Logdebug::appendlog($start_date);
        
    //     $minutes = ( time()-$start_date) / 60;
    //     //Logdebug::appendlog($minutes);
        
    //     return floor($minutes);
    // }

    

    function script(){
        return "
            <script>
            
                
                $('#btnsendpass').on('click', function(e){
                    
                    e.preventDefault();    
                        $('#result').html('');
                        
                        $.ajax({
                            
                            url:\"".URL."forgotpass/sendpass\", 
                            type : \"POST\",                                  				
                            data : {bizid:$('#bizid').val(), user:$('#user').val(), logintype:$('#logintype').val()},                    
                            beforeSend:function(){	
                                
                                $('#btnsendpass').prop(\"disabled\",true);
                            },
                            success : function(result) {
                                $('#btnsendpass').prop(\"disabled\",false);
                                $('#result').html(result);
                                
                                
                            },error: function(xhr, resp, text) {
                                $('#btnsendpass').prop(\"disabled\",false);
                                
                            }
                        })
                    
                })
            </script>
        ";
    }

}