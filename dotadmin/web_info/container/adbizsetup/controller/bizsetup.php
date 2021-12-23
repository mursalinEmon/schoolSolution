<?php 
class Bizsetup extends Controller{
	function __construct(){
		parent::__construct();

		$this->view->script = $this->script();

		$this->view->js = array('views/bizsetup/js/bizsetup.js');
	}
	
	function init(){
		
		$formfield = array(
			"section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Basic Information","rowindex"=>"0"),
			"cuscode"=>array("required"=>"*","label"=>"Customer Code","ctrlfield"=>"xcus", "ctrlvalue"=>"", "ctrltype"=>"group", "ctrlvalid"=>"","rowindex"=>"1","url"=>URL."popuppage/viewpopupfiletr/cuscode"),			
			"DOB"=>array("required"=>"*","label"=>"DOB","ctrlfield"=>"DOB", "ctrlvalue"=>"", "ctrltype"=>"datepicker", "ctrlvalid"=>"","rowindex"=>"1"),			
			"cusname"=>array("required"=>"*","label"=>"Organization","ctrlfield"=>"xorg", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>"","rowindex"=>"1"),
			"gender"=>array("required"=>"*","label"=>"Gender","ctrlfield"=>"xgender", "ctrlvalue"=>array(""=>"","Male"=>"male","Female"=>"female"), "ctrltype"=>"select","ctrlselected"=>"Male", "ctrlvalid"=>"0","rowindex"=>"2"),
			"creditlimit"=>array("required"=>"*","label"=>"Credit Limit","ctrlfield"=>"xcrlimit", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>"0","rowindex"=>"4"),
			"section2"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Item Details","rowindex"=>"5"),
			"description"=>array("required"=>"*","label"=>"Description","ctrlfield"=>"xcrlimit", "ctrlvalue"=>"", "ctrltype"=>"editor", "ctrlvalid"=>"0","rowindex"=>"6"),
			"color"=>array("required"=>"","label"=>"Color","ctrlfield"=>"xcolor", "ctrlvalue"=>array("Red"=>"red","Green"=>"green"), "ctrltype"=>"radio", "ctrlselected"=>"Green", "ctrlvalid"=>"0","rowindex"=>"7"),
			"entrydate"=>array("required"=>"*","label"=>"Date","ctrlfield"=>"xdate", "ctrlvalue"=>"", "ctrltype"=>"datemask", "ctrlvalid"=>"0","rowindex"=>"4"),
			"txnno"=>array("ctrlfield"=>"xtxn", "ctrlvalue"=>"", "ctrltype"=>"hidden", "rowindex"=>"7"),
			
		);

		$formsettings = array("id"=>"frmcustomer", "title"=>"Customer Entry Form", "actionbtn"=>array("Update"=>"url","Delete"=>"url")
		, "mainbtn"=>array("Save"=>URL."companysetup/save","View"=>"url"));

		$basicform = new Basicform();
		$this->view->form = $basicform->createform($formsettings,$formfield);	
		
		$basictable = new Basictable();

		//$data = $this->model->items($val);

		//$this->view->table = $basictable->tblbasic($data, array("title"=>"Chart Of Accounts", "sumary"=>array("Amount", "Discount")));
		$this->view->table = $basictable->formdetail();
		$this->view->render("templateadmin","bizsetup/init");
	}

	

	function save(){
		
		//Logdebug::appendlog($_POST["description"].'<br>'.$_POST["entrydate"]);
		//sleep(3);
		echo json_encode($_POST["cuscode"]);
	}
	function savedetail(){
		if(isset($_POST['cusid'])){
			$cusid = $_POST['cusid'];
			//$cusid = $_POST['cusid'];
			for($i=0; $i<count($cusid); $i++){
				Logdebug::appendlog($cusid[$i]);
			}
		}
		
		echo json_encode('done');
	}
	public function autoacc(){
		
		if(isset($_POST["query"])){
			
		
		 	$val = $_POST["query"];

		 	$data = $this->model->acclist($val);

			echo json_encode(array("suggestions"=>$data));	
		}	
	}
	


	private function script(){
		$param = "Test Param";
		return "<script>
		
		  $(function () {	
			
			
			autocomplete();
			
			function autocomplete(){
			  $('.cusid').autocomplete({
				lookup: function (query, done) {
					$.ajax({
						url:'".URL."companysetup/autoacc',
						type:'POST',
						data: {
							query : query
						},					
						success: function (data) {
							done(data);
						}, 
						dataType:'json'
					});			
					
				},
				onSelect: function (suggestion) { 
						var div_id = $(this).closest('div').parent().parent().attr('id');
						
						$('#'+div_id).find('#cusname').val(suggestion.data);
						console.log('You selected: ' + suggestion.value + ', ' + suggestion.data);
					},
					showNoSuggestionNotice: true,
					noSuggestionNotice: 'Sorry, no matching results'
				});
			};
				var rowindex = 0;
				$('#addrow').on('click', function(){
					rowindex += 1;
					var htmlcode = '<div class=\"row no-gutters\" id=\"row'+rowindex+'\">';
					
					htmlcode += '<div class=\"col-2\"><div class=\"input-group\"> <input type=\"text\" id=\"cusid'+rowindex+'\" class=\"form-control form-control-sm cusid\">';
					htmlcode += '<div class=\"input-group-append\">';
                    htmlcode +='<button class=\"btn btn-info btn-sm\" id=\"btn\" onClick=\"popupCenter(\'".URL."popuppage/viewpopup/cusid'+rowindex+'\', \'Item List\', 750, 450);\" type=\"button\">List</button>';
					htmlcode +='</div>';
					htmlcode +='</div>';   
					htmlcode +='</div>';
					htmlcode += '<div class=\"col-4\"><input type=\"text\" id=\"cusname\" class=\"form-control form-control-sm cusname\" ></div>';
					htmlcode += '<div class=\"col-2\"><input type=\"text\" id=\"saledate\" class=\"form-control form-control-sm saledate\"></div>';
					htmlcode += '<div class=\"col-2\"><input type=\"text\" id=\"cusamount\" class=\"form-control form-control-sm amount numeric\"></div>';
					htmlcode += '<div class=\"col-2\"><input type=\"text\" id=\"cusdisc\" class=\"form-control form-control-sm cusdisc digit\"></div>';
					htmlcode += '</div>';
					$('#detail').append(htmlcode); 
					autocomplete();
					$('.numeric').mask('000000000000000', {'translation': {0: {pattern: /[0-9.]/}}});
					$('.digit').mask('000000000000000', {'translation': {0: {pattern: /[0-9]/}}});
					
					
				});
				
				

				$('#saverow').on('click', function(){
				
				var cusid = [];
				var cusname = [];
				var saledate = [];
				var amount = [];
				var cusdisc = [];
					
					for(var i=0; i<=rowindex; i++){
						var rowid = 'row'+i;
						
						cusid.push($('#'+rowid+' .cusid').val());
						cusname.push($('#'+rowid+' .cusname').val());
						saledate.push($('#'+rowid+' .saledate').val());
						amount.push($('#'+rowid+' .amount').val());
						cusdisc.push($('#'+rowid+' .cusdisc').val());
						
					}
					event.preventDefault();

					$.ajax({
						url:url, // url where to submit the request
						type : 'POST', // type of action POST || GET
						dataType : 'json', // data type						
						data : {cusid:cusid,cusname:cusname,saledate:saledate,amount:amount,cusdisc:cusdisc}, // post data || get data
						beforeSend:function(){
							$('.loader').show();
						},
						success : function(result) {
							// you can see the result from the console
							// tab of the developer tools
							$('.loader').hide();
							toastr.success(result);
							//console.log(result);
						},
						error: function(xhr, resp, text) {
							$('.loader').hide();
							console.log(xhr, resp, text);
						}
					})

				
				});



				
				
			});

			

		
		</script>";
	} 
}