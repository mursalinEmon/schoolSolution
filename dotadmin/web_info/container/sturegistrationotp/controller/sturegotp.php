<?php

class Sturegotp extends Controller{
	private $formfield=array();
	function __construct(){
		parent::__construct();
		$this->intializeform();
		$this->view->script=$this->script();
		Session::init();
        if(!Session::get('logedin') || Session::get('slogintype') != "Admin"){
            header('location: '. URL .'adminlogin');
            exit;
        }
	}
	

	private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(
            "section1"=>array("ctrltype"=>"section","color"=>"alert-info", "label"=>"Notice Information","rowindex"=>"0", "ctrlvalid"=>array()),

            "noticesl"=>array("required"=>"*","label"=>"Notice ID","ctrlfield"=>"xsl", "ctrlvalue"=>"", "ctrltype"=>"group", "ctrlvalid"=>array(),"rowindex"=>"1","url"=>URL."popuppage/coursepopup/noticesl"),

			"itemcode"=>array("required"=>"*","label"=>"Course","ctrlfield"=>"xitemcode", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Trainer", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),			

            "batch"=>array("required"=>"*","label"=>"Batch","ctrlfield"=>"xbatch", "ctrlvalue"=>array(), "ctrltype"=>"select2","ctrlselected"=>"","codetype"=>"Batch", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"title"=>array("required"=>"*","label"=>"Notice Title","ctrlfield"=>"xtitle", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"2"),

			"description"=>array("required"=>"","label"=>"Description","ctrlfield"=>"xdescription", "ctrlvalue"=>"", "ctrltype"=>"editor", "ctrlvalid"=>array("required"=>"true","minlength"=>"5"),"rowindex"=>"3"),
            
        );

        $this->formset = array(
            "formdetail"=>array("id"=>"frmnotice", "title"=>"User Form"),
            "actionbtn"=>array(                
                array("btnmethod"=>"update","btntext"=>"Update","btnurl"=>URL."regotp/updatenotice","btnid"=>"noticeupdate"),
            ),
            "mainbtn"=>array(
                array("btnmethod"=>"save","btntext"=>"Save Notice","btnurl"=>URL."regotp/savenotice","btnid"=>"usersave", "icon"=>"<i class=\"far fa-save mr-1\"></i>","btncolor"=>"btn-primary"),
                array("btnmethod"=>"view","btntext"=>"View Notice","btnurl"=>URL."regotp/singlenotice","btnid"=>"viewnotice", "icon"=>"<i class=\"far fa-info mr-1\"></i>","btncolor"=>"btn-info"),
                array("btnmethod"=>"clearall","btntext"=>"Clear","btnurl"=>"","btnid"=>"clearall", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );

        //End of Main user form initialize here


        $this->searchfield = array(            
            "student"=>array("required"=>"*","label"=>"Student ID","ctrlfield"=>"xstudent", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),

            "mobile"=>array("required"=>"*","label"=>"Mobile No","ctrlfield"=>"xstudentmobile", "ctrlvalue"=>"", "ctrltype"=>"number", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),
			
			"name"=>array("required"=>"*","label"=>"Student Name","ctrlfield"=>"xstuname", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"1"),"rowindex"=>"1"),
            
        );

        $this->searchsettings = array(
            "formdetail"=>array("id"=>"frmsearch", "title"=>"Search Notice"),
            "actionbtn"=>array(),
            "mainbtn"=>array(                
                array("btnmethod"=>"search","btntext"=>"Search","btnurl"=>URL."regotp/findnotice","btnid"=>"searchnotice", "icon"=>"<i class=\"fa fa-eraser mr-1\"></i>","btncolor"=>"btn-success"),
            ),
        );
        
    }

	function init(){ 
 
		 $basicform = new Basicform();
 
		 $tabsettings = array(
			 
			 0=>array("isactive"=>"active","tabdesc"=>"Search For OTP", "tabid"=>"tabsearchnotice", "tabcontent"=>$basicform->createform($this->searchsettings,$this->searchfield, false).'<div class="col-12" id="printdivuser"><table class="table table-striped table-bordered basic-datatable table-responsive" cellspacing="0" width="100%" id="searchtbl"></table></table></div>', "icon"=>"fa fa-search"),          
			 
		 );
		 
		 $this->view->courseform = $basicform->createtab($tabsettings);
		 
		 $this->view->render("templateadmin","abr/sturegotp_view");
	 }


	 function savenotice(){
		
        $inputs = new Form();
            try{
            $inputs ->post("noticesl")
			
					->post("itemcode")
                    ->val('minlength', 1)
                    
                    ->post("batch")
                    ->val('minlength', 1)

					->post("title")
                    ->val('minlength', 1)

					->post("description")
					->val('minlength', 1);

            $inputs	->submit();       
            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
                exit;
            }

            $onduplicate = 'on duplicate key update xitemcode=VALUES(xitemcode), xbatch=VALUES(xbatch),xtitle=VALUES(xtitle),xdescription=VALUES(xdescription)';
			
            $inpdata = $inputs->fetch();
			
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);


			$data['xdate']=date('Y-m-d');
			$data['xtime']=date("H:i:s");
            $data['bizid']=100;
			$data['zemail']=Session::get('suser'); //add business id to array for inserting
			if(!is_numeric($data['xsl'])){
				unset($data['xsl']);
			}
            //  //remove autoincrement id from inserting      
			//Logdebug::appendlog(print_r($data, true));
            $success = $this->model->save($data, $onduplicate);
            //Logdebug::appendlog(print_r($data, true));
            if($success > 0)
                echo json_encode(array('message'=>'Notice Saved Successfully','result'=>'success','keycode'=>$success));
             else
                echo json_encode(array('message'=>'Failed to Save Notice','result'=>'error','keycode'=>''));
    }

	

	function findnotice(){
        $res = "";
		$conditions = "bizid = ".Session::get('sbizid')." and xverified = 0";
        $mobile = "";
        $student = "";
        $name = "";

		if(!empty($_POST['student']))
            $student = $_POST['student'];

		if(isset($_POST['mobile']))
            $mobile = $_POST['mobile'];

		if(isset($_POST['name']))
            $name = $_POST['name'];

		//Logdebug::appendlog($_POST['itmcode']);
		if($student != ""){
			$conditions .=" and xstudent = '".$student."'";
		}

		if($mobile != ""){
			$conditions .=" and xmobile like '%".$mobile."%'";
		}

		if($name != ""){
			$conditions .=" and xstuname like '%".$name."%'";
		}
            
        try{
        //Logdebug::appendlog(serialize($itemcode));

        }catch(Exception $e){
                $res = $e->getMessage();              
                //Logdebug::appendlog($res);
                echo json_encode(array('message'=>$res,'result'=>'fielderror','keycode'=>''));
            exit;
        }

        if($res == ""){
            //Logdebug::appendlog('$res');
            $batchdt =  $this->model->getnotice($conditions); 
			//Logdebug::appendlog(print_r($batchdt));
            echo json_encode($batchdt);
        }
        
    }
	
	function singlenotice(){
        $notice = $_POST['param']; 
        $noticedt =  $this->model->getsinglenotice($notice);
        //Logdebug::appendlog(print_r($noticedt, true));
        echo json_encode($noticedt);
        
    }

	function singlenoticemodal($notice){
        $noticedt =  $this->model->getsinglenotice($notice);
        //Logdebug::appendlog(print_r($noticedt, true));
        echo json_encode($noticedt);
        
    }

	function getCourse(){
        $courses = $this->model->getCourse();
        echo json_encode($courses);
    }

	function getSelectBatch($course){
        //Logdebug::appendlog($batch);
        $batchdt =  $this->model->getSelectBatch($course);
        echo json_encode($batchdt);
        
    }

	function saveAssign(){
        $tempsl = $_POST['tempsl'];
        $txnid = $_POST['txnid'];
        $status = $_POST['confstatus'];
		$xdate = date("Y-m-d");
		$year = date('Y',strtotime($xdate));
		$month = date('m',strtotime($xdate));
        $res = "";
		$result = 0;
		$resultdt = 0;
		$resultcom = 0;
		
        //Logdebug::appendlog($sosl);
		try{

			if($status == "Confirm"){
				$tempdata = $this->model->getTempData($tempsl, $txnid);

				if(count($tempdata) <= 0){
					echo json_encode(array('message'=>'Transection doest match, or Sales not found!','result'=>'fielderror','keycode'=>''));
					exit;
				}
				
				$userdet = $this->model->getsingleuser($tempdata[0]["xref"]);

				if(count($userdet) <= 0 || empty($tempdata[0]["xref"])){
					echo json_encode(array('message'=>'Reference user not found!','result'=>'fielderror','keycode'=>''));
					exit;
				}

				$stno = $this->model->getStNo()+1;
				// Logdebug::appendlog($stno);die;
				$salemstdata = array(			
					"bizid" =>Session::get('sbizid'),			  
					"zemail"=>Session::get('suser'),
					"xcus"=>$tempdata[0]["xstudent"],
					"xdate"=>$xdate,		    					
					"xdelname"=>$userdet[0]["user_name"],
					"xcur"=>'BDT',			
					"xdeladdress"=>'Nill',			
					"xstatus"=>'Pending',
					"xyear"=>$year,
					"xper"=>$month,					
					"xdelcompany"=>'N',	
					"xdelemail"=>'N',				
					"xmobile"=>$tempdata[0]["xstudentmobile"],	
					"xdistrict"=>'N',	
					"xthana"=>'N',	
					"xpostal"=>'N',	
					"xpaymethod"=>$tempdata[0]["xoperator"],
					"xdelmethod"=>'N',
					"stno"=>$stno
				);
				$result = $this->model->create_sales($salemstdata);
				if($result>0){
					$cols = "bizid,xdate,xecomsl,xitemcode,xitembatch,xwh,xbranch,xqty,xrate,xcost,xref,
					xunitsale,xcur,xexch,zemail,xtaxrate,xtypestk,xdisc,xtaxcode,xtaxscope,xyear,xper,xpoint,xcus,xrow,xpaymethod,stno";
		
					$vals = "(".Session::get('sbizid').",'".$xdate."', '".$result."','".$tempdata[0]["xitemcode"]."','".$tempdata[0]["xitemcode"]."','CW','CW','".$tempdata[0]["xqty"]."','".$tempdata[0]["xprice"]."','".$tempdata[0]["xcost"]."', '".$tempdata[0]["xref"]."','Training','BDT','1','".Session::get('suser')."',0,'',0,'','None',".$year.",".$month.",'".$tempdata[0]["xpoint"]."','".$tempdata[0]["xstudent"]."',1,'".$tempdata[0]["xoperator"]."',".$stno.")";
					//Logdebug::appendlog($cols.$vals);
						$resultdt = $this->model->create_salesdt($cols, $vals);
					}

					// $spamt = $tempdata[0]["xpoint"]*1;
					// $spdata = array(
					// 	"xdate"=>$xdate,
					// 	"bizid"=>Session::get('sbizid'),
					// 	"distrisl"=>$userdet[0]["user_id"],			
					// 	"xrdin"=>$userdet[0]['login_name'],
					// 	"zemail"=>Session::get('suser'),
					// 	"xcomtype"=>"Referral Commission",
					// 	"executivetype"=>'Nill',
					// 	"left_point"=>'0',
					// 	"right_point"=>'0',
					// 	"flush_point"=>'0',
					// 	"xcom"=>$spamt,
					// 	"xsrctaxpct"=>10,
					// 	"xservicechg"=>1.5,
					// 	"xotherchg"=>1,
					// 	"stno"=>$stno
					// );

					//$resultcom = $this->model->sponsorcom($spdata);

					if($resultdt){
						$fields = array(
							"xstatus"=>"Confirmed",
						);
						$where = "bizid = ".Session::get('sbizid')." and xtemsl = '".$tempsl."'";
						$result = $this->model->updateTemp($fields, $where);
						if($result > 0){
							$gettmdt = $this->model->getTempDetails($tempsl);
							$sendsms = new Sendsms();
							$smstxt = "Dear ".$gettmdt[0]['xstuname'].". 
Welcome to our Institution. 
							
Your course ".$gettmdt[0]['xitemdesc']." has been enrolled successfully. 
							
Your Login ID: ".$gettmdt[0]['xstudentmobile']."
							
Regards
".Session::get('sbizlong').".
Hotline: ".Session::get('sbizmobile')."";
							$sendsms->send_single_sms($smstxt, $gettmdt[0]['xstudentmobile']);
						}
					}


			}elseif($status == "Delete"){
				$tempdata = $this->model->getTempData($tempsl);

				if(count($tempdata) <= 0){
					echo json_encode(array('message'=>'This sales is not found!','result'=>'fielderror','keycode'=>''));
					exit;
				}

				$result =  $this->model->saveEcomsalesTempLog($tempsl);
				if($result > 0){
					$result =  $this->model->deleteTemp($tempsl);
				}
			}
			
			
		}catch(Exception $e){
			$res = unserialize($e->getMessage());
			echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
			exit;
		}

	//Logdebug::appendlog($result);
        if($result)
            echo json_encode(array('message'=>'Registration OTP','result'=>'success','keycode'=>$result));
        else
            echo json_encode(array('message'=>'Failed to Sales confirm!','result'=>'error','keycode'=>''));
        
    }
    

	function script(){
		$basicform = new Basicform(); 
		return "
		<script>
		

		//-----------------------
		// save update delete ajax
		//-----------------------
		".$basicform->returnajax($this->formset, "noticesl")."
		//-----------------------
		//user form validation
		//-----------------------
		".$basicform->validateform($this->formfield, 'frmnotice')."            
		 

	   $('#clearall').on('click', function(){
			$('#frmnotice').trigger('reset');
			$('#imglist').html('No image found!');
		})

		
   
		$('#searchnotice').on('click', function(){
            
			var url = '".URL."regotp/findnotice';
			var formid = 'frmsearch';
				
					$.ajax({
						url:url, 
						type : 'POST',
						dataType : 'json', 						
						data : $('#'+formid).serialize(), 
						beforeSend:function(){
							$(this).addClass('disabled');
							loaderon(); 
						},
						success : function(result) {
							//console.log(result);
							loaderoff();
							var tblhtml ='';
						   $(this).removeClass('disabled');

						   if(result.result=='fielderror'){
								toastr.error(result.message);
							}
						if(!result.result){
							tblhtml='<thead><th>Date</th><th>Student ID</th><th>Name</th><th>Mobile</th><th>Email</th><th>Reference</th><th>Name</th><th>OTP</th></thead>';
							tblhtml+='<tbody>';
							$.each(result, function(key, value){
							
								 tblhtml+='<tr><td>'+value.xdate+'</td><td>'+value.xstudent+'</td><td>'+value.xstuname+'</td><td>'+value.xmobile+'</td><td>'+value.xstuemail+'</td><td>'+value.xrefno+'</td><td>'+value.user_name+'</td><td>'+value.xotp+'</td></tr>';
									
						   });
						   tblhtml+='</tbody>';
						   $('#searchtbl').html(tblhtml);

						   if(result.result=='error'){
								toastr.error(result.message);                               
							}
						}
								  
						},
						error: function(xhr, resp, text) {
							loaderoff();
							$(this).removeClass('disabled');
						   
							console.log(xhr, resp, text);
						}
					});
					return false;
		});

		//---------------------
        // batch show in modal
        //---------------------
        
        function open_modal(temsl, status){
            // console.log(status);
            $('#tempsl').val(temsl);
            $('#confstatus').val(status);
			if(status == 'Confirm'){
				$('#slbatch').css(\"display\",\"block\");
				$('#btnbatch').html('');
                $('#exampleModalLabel').html('');
				$('#btnbatch').append('Confirm').removeClass('btn btn-danger').addClass('btn btn-primary');
                $('#exampleModalLabel').append('Mathch Transection ID');
			}else if (status == 'Delete'){
				$('#slbatch').css(\"display\",\"none\");
				$('#btnbatch').html('');
                $('#exampleModalLabel').html('');
                $('#btnbatch').append('Delete').removeClass('btn btn-primary').addClass('btn btn-danger');
                $('#exampleModalLabel').append('Are you sure?');
			}
        }

		//-------------------
        // Confirm Sale
        //-------------------

        $('#btnbatch').on('click', function(){
            var url = '".URL."regotp/saveAssign';
            var uid = $('#tempsl').val();
            var txnid = $('#txnid').val();
            var status = $('#confstatus').val();
            $.ajax({
                url:url, 
                type : 'POST',
                dataType : 'json', 						
                data : {tempsl:uid, txnid:txnid, confstatus:status}, // post data || get data
                beforeSend:function(){
                    $('#btnbatch').addClass('disabled');
                    loaderon(); 
                },
                success : function(result) {
					//console.log(result);
                    loaderoff();
                   $('#btnbatch').removeClass('disabled');

                   if(result.result=='fielderror'){
                        toastr.error(result.message);
                        $('#'+result.keycode).focus();
                    }

                    if(result.result=='success'){
						$('#exampleModal').modal('hide');
                        toastr.success(result.message);
                        $('#tem'+uid).remove();
                        
                                                
                    }

                    if(result.result=='error'){
                        toastr.error(result.message);                               
                    }

                            
                },
                error: function(xhr, resp, text) {
                    loaderoff();
                    $('#btnbatch').removeClass('disabled');
                   
                    console.log(xhr, resp, text);
                }
            });

        })

		//-----------------------
		// show user & uploaded image
		//-----------------------
			$('#viewnotice').on('click', function(){
				var url = $(this).val();
				var uid = $('#noticesl').val();
				$.ajax({
					url:url, 
					type : 'POST',
					dataType : 'json', 						
					data : {param:uid}, // post data || get data
					beforeSend:function(){
						$('#viewnotice').addClass('disabled');
						loaderon(); 
					},
					success : function(response) {
						
						loaderoff();
						
						$('#viewnotice').removeClass('disabled');
						
						const myObjStr = response; 
						$('#noticesl').val(myObjStr[0].xsl);
						$('#itemcode').html('<option value=\"'+myObjStr[0].xitemcode+'\">'+myObjStr[0].xitemdesc+'</option>');
						$('#batch').html('<option value=\"'+myObjStr[0].xbatch+'\">'+myObjStr[0].xbatchname+'</option>');
						$('#title').val(myObjStr[0].xtitle);
						CKEDITOR.instances['description'].setData(myObjStr[0].xdescription);
						$('#description').val(myObjStr[0].xdescription);
						//console.log(myObjStr[0].xdescription);
						//----------------------------
						// Course Select data for view //
						//----------------------------

						var courses = '".URL."scheduleclass/getCourse';
						//console.log(courses);
						$.get(courses, function(o){
							//console.log(o);
							for(var i = 0; i < o.length; i++){ 					
								$('#itemcode').append($('<option>', {value: o[i].xitemcode, text: o[i].xdesc}));
							}
						}, 'json');

								
					},
					error: function(xhr, resp, text) {
						loaderoff();
						$('#viewnotice').removeClass('disabled');
						
						console.log(xhr, resp, text);
					}
				});
			})

			$('#noticesl').on('keyup', function (e) {
				if (e.keyCode === 13) {
					$('#viewnotice').click();
					
				}
			});


		$('body').on('click','.tblrow', function(){
			_this = $(this).html();                    
			$('.nav-tabs a[href=\"#tabcreatenotice\"]').tab('show');
			$('#noticesl').val(_this);
			$('#viewnotice').click();
		});

		$('#printcourselist').on('click', function(){
			//$('#printdivcourse').print();
			var divToPrint=document.getElementById('printdivcourse');

			var newWin=window.open('','Print-Window');

			newWin.document.open();
			newWin.document.write('<html><head><link rel=\"stylesheet\" href=\"./asset_admin/dist/css/style.css\" /><title>Print Document</title></head>');
			newWin.document.write('<body onload=\"window.print()\">'+divToPrint.innerHTML+'</body></html>');

			newWin.document.close();

			setTimeout(function(){newWin.close();},10);
		})

		//----------------------------
		// Course Select data for search //
		//---------------------

		var courses = '".URL."regotp/getCourse';
		//console.log(courses);
		$('#itmcode').append('<option></option>')
		$.get(courses, function(o){
			//console.log(o);
			for(var i = 0; i < o.length; i++){ 					
				$('#itmcode').append($('<option>', {value: o[i].xitemcode, text: o[i].xdesc}));
			}
		}, 'json');

		$('#txnid').on('keyup',function(){
			var desc = $(this).val();
			if(desc != ''){
				$('#btnbatch').prop(\"disabled\",false);
			}else{
				$('#btnbatch').prop(\"disabled\",true);
			}
		})

		</script>";
	}
			
} 