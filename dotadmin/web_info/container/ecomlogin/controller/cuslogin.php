<?php 
class Cuslogin extends Controller{
    private $token = "";
    function __construct(){
        parent::__construct();
    }

    function init(){
        
        $this->view->bannertext='<h1>Customer<span class="text-warning"> Login</span></h1>';
        $this->view->breadcrumb='<p><a href="'.URL.'">Home</a> &#8594;<span>Customer Login</span></p>';        
        $this->view->script = $this->script();
        $this->view->result = "";
        $this->view->menuitem=Menu::getmenu();
        $this->view->render("webpagetemplate","webhome/cuslogin");	
    }

    function createaccount(){
            $this->view->bannertext='<h1>Customer<span class="text-warning"> Login</span></h1>';
            $this->view->breadcrumb='<p><a href="'.URL.'">Home</a> &#8594;<span>Customer Information</span></p>';        
            $this->view->script = $this->script();
            $this->view->menuitem=Menu::getmenu();      
        if(isset($_POST['mobile'])){
        $customer = $this->model->getcustomerdt($_POST['mobile']);
        if(count($customer)>0){            
            $this->view->result = "Mobile already exist!";                 
            $this->view->render("webpagetemplate","webhome/cuslogin");
            exit;	
        }

            $data = array(
            "bizid" => 100,
            "xcus" => $_POST['mobile'],
            "xorg" => $_POST['fullname'],
            "xgender" => $_POST['gender'],
            "xcusemail" => $_POST['email'],
            "xpassword" => $_POST['password'],
            "zemail" => $_POST['mobile'],
            );
            //print_r($data);die;
                $success = $this->model->createcus($data);

                if($success>0){

                    header("location:".URL."customerlogin/customerdelevery/".$_POST['mobile']);
                }else{                   
                    $this->view->result = "Could  not create customer!";                  
                    $this->view->render("webpagetemplate","webhome/cuslogin");
                    exit;	
                }

            
        }else{           
            $this->view->result = "Incorrect information!";            
            $this->view->render("webpagetemplate","webhome/cuslogin");	
            exit;
        }

        
    }

    function customerdelevery($mobile){
        $customer = $this->model->getcustomerdt($mobile);
        if(count($customer)===0){
            header("location:".URL."customerlogin");
            exit;
        }
        $this->view->customer = $customer;
        $this->token = Hash::create('sha256',rand(1000,10101010),HASH_KEY);
        $this->view->bannertext='<h1>Customer<span class="text-warning"> Login</span></h1>';
        $this->view->breadcrumb='<p><a href="'.URL.'">Home</a> &#8594;<span>Customer Information</span></p>';        
        $this->view->script = $this->script();
        $this->view->menuitem=Menu::getmenu();
        $this->view->render("webpagetemplate","webhome/customerdelinfo");
    }

    

    private function script(){
        return "<script>
        function cartlist(){
                
        }
       $(function(){ sessionStorage.setItem('unitoken', '".$this->token."'); })
        </script>
        ";
    }

}