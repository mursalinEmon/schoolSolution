<?php 
class Popup extends Controller{
	function __construct(){
		parent::__construct();

		$this->view->script = $this->script();


    }
    
    public function viewpopup($keyid=""){
        $table = new Basictable();
        $data = $this->model->acclist($keyid);
        $this->view->data = $table->basicdatatable($data,$keyid);
        
        $this->view->render("rawtemplate","popup/init");
    }

    public function viewpopupfiletr($keyid=""){
        $formfield = array(
			
            "cuscode"=>array("required"=>"*","label"=>"Customer Code","ctrlfield"=>"xcus", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>"","rowindex"=>"0"),
            "mobile"=>array("required"=>"*","label"=>"Customer Mobile","ctrlfield"=>"xmobile", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>"","rowindex"=>"0")			
			
		);
       
        $formsettings = array(
            "formdetail"=>array("id"=>"frmusersearch", "title"=>"Search User"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                   
                array("btntext"=>"Search","btnurl"=>URL."popuppage/viewdata/cuscode","btnid"=>"viewuser"),
            ),
        );

		$basicform = new Basicform();
		$render = $basicform->createform($formsettings,$formfield);
        $table = new Basictable();
        
        $render .= $table->basicpopuptable();
        $this->view->data = $render;
        
        $this->view->render("rawtemplate","popup/init");
    }


    public function userpopup($keyid=""){
        $dbtable = "pausers";
        $selectfield = "zemail as $keyid, zuserfullname, zrole, zusermobile";
        $where="";
        $title = "User List";
        $table = new Basictable();
        $data = $this->model->userlist($dbtable, $selectfield, $where);
        $render = $table->basicdatatable($data, $keyid, "User List");
        $this->view->data = $render;
        
        $this->view->render("rawtemplate","popup/init");
    }

    public function viewdata($keyid){
       
        $data = $this->model->acclist($keyid);
        echo json_encode($data);
    }

    private function script(){
        return "
        <script>
        function saveform(formid, url){
            
            // send ajax
            $.ajax({
                url: url, // url where to submit the request
                type : 'POST', // type of action POST || GET
                dataType : 'json', // data type
                data : $('#'+formid).serialize(), // post data || get data
                beforeSend:function(){
                    $('.loader').show();
                },
                success : function(result) {
                    // you can see the result from the console
                    // tab of the developer tools
                    $('.loader').hide();
                    for (x in result[0]) {
                        console.log( x );
                      }
                    var html_code = '<table class=\"table table-striped table-bordered\" cellspacing=\"0\" width=\"100%\"><thead><tr><th>Package ID</th><th>PIN</th></tr></thead>';
                    result.forEach(function(item) {
                       html_code += '<tr>';  
                        //console.log(item['cuscode'])
                        html_code += '<td>'+item['pkg_id']+'</td><td><a href=\"javascript:void(0)\" onclick=\"post_value($(this).text(), \'cuscode\')\">'+item['cuscode']+'</a></td>'; 
                       html_code += '<tr>';
                      });
                      html_code += '</table>'; 
                      $('#paneldata').append(html_code);
                },
                error: function(xhr, resp, text) {
                    $('.loader').hide();
                    console.log(xhr, resp, text);
                }
            })
        
        
        }
        </script>
        ";
    }
}
?>
