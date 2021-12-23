<?php 
	class Role extends Controller{

		function __construct(){
            parent::__construct();
            $this->view->script=$this->script();
	       
	    }

	    function init(){
            

            $role = array(                
                "User & Role"=>array(
                    "User & Role Management"=>array(
                        array("module"=>"User Management","url"=>"manageuser","id"=>"manageuser",),
                        array("module"=>"Role Management","url"=>"managerole","id"=>"managerole")
                    )
                ),
                "Sales"=>array(
                    "Sales Management"=>array(
                        array("module"=>"Sales Order","url"=>"salesorder","id"=>"salesorder"),
                        array("module"=>"Sales Return","url"=>"salesreturn","id"=>"salesreturn")
                    ),
                    "Sales Report"=>array(
                        array("module"=>"Daily Sales Order","url"=>"dsalesorder","id"=>"dsalesorder"),
                        array("module"=>"Daily Sales Return","url"=>"dsalesreturn","id"=>"dsalesreturn")
                    )
                ),      
            );
            $this->view->content=$role;
			$this->view->render("templateadmin","role/init");
	    	
        }
        
        public function saverole(){
            $menudata = $_POST["mdl"];            
            
            $inputs = new Form();
            try{
            $inputs ->post("userrole")
                    ->val('minlength', 2);

            $inputs	->submit();       
            }catch(Exception $e){
                 $res = unserialize($e->getMessage());              
                
                 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
                exit;
            }
            $inpdata = $inputs->fetch();
            //Logdebug::appendlog(serialize($inpdata));
            $role = $inpdata["userrole"];
            $str = serialize($menudata);
            $uns=unserialize($str);
            $data = array(
                'bizid'=>100,
                'zrole'=>$role,
                'xkeymenu'=>$str
            );
            $roleexist = $this->model->getrolename($role);
            $success = 0;
            $message = "Created";
            if(count($roleexist)==0){
                $success = $this->model->save($data);
            }else{
                $message = "Saved";
                $success = $this->model->updaterole($data);
            }
            //Logdebug::appendlog($_POST["userrole"]);
            
            if($success > 0)
                echo json_encode(array('message'=>'Role '.$message,'result'=>'','keycode'=>$role));
             else
                echo json_encode(array('message'=>'Failed to create role','result'=>'error','keycode'=>''));
        }

        public function rolllist(){
            $list = $this->model->rolelist();
            echo json_encode($list);
        }

        public function showroll(){
            $rollname = $_POST['roll'];
            
            $rolldt = $this->model->roledetail($rollname);
            $un_roledt = "";
            if(count($rolldt)>0){
                if($rolldt[0]['xkeymenu']!="")
                    $un_roledt = unserialize($rolldt[0]['xkeymenu']);
            }
            echo json_encode($un_roledt);
        }

        public function removeroll(){
            $inputs = new Form();

            $inputs ->post("rolename");
            $inpdata = $inputs->fetch();
            //Logdebug::appendlog(serialize($inpdata));
            $role = $inpdata["rolename"];

            $success = $this->model->deleterole($role);

            if($success > 0)
                echo json_encode(array('message'=>$role.' Role deleted','result'=>'','keycode'=>$role));
             else
                echo json_encode(array('message'=>'Failed to delete role','result'=>'','keycode'=>''));
        }
		
        private function script(){
            return "
                <script>
                    var menu=[];                   
                    
                    $(function() {
                        $('#userrole').focus();
                        $.ajax({
                            url:'".URL."managerole/rolllist', // url where to submit the request
                            type : 'POST', // type of action POST || GET
                            dataType : 'json', // data type						
                            data : {'token':'123'}, // post data || get data
                            beforeSend:function(){
                                $('.loader').show();
                            },
                            success : function(result) {                               
                                $('.loader').hide();   
                                                         
                                $.each(result, function(key, value){
                                    var html = '<tr><td><a class=\"deleterole\" href=\"javascript:void(0)\"><i class=\"icon-trash\"></i></a></td><td> <a class=\"rolename\" href=\"javascript:void(0)\">'+value.rolename+'</a></td></tr>';
                                    $('#rolelist').append(html);                              
                                })
                            },
                            error: function(xhr, resp, text) {
                                $('.loader').hide();
                                console.log(xhr, resp, text);
                            }
                        })
                        
                    });

                    $(document).on('click', '.rolename', function(){
                        menu=[];
                        var rolename = $(this).html();
                        $.ajax({
                            url:'".URL."managerole/showroll', // url where to submit the request
                            type : 'POST', // type of action POST || GET
                            dataType : 'json', // data type						
                            data : {'roll':rolename}, // post data || get data
                            beforeSend:function(){
                              loaderon();
                            },
                            success : function(result) {    
                                $('#userrole').val(rolename);   
                                loaderoff();
                                if(result!=''){                     
                                 $('li :checkbox').prop('checked', false);
                                 $.each(result, function(key, value){
                                    $.each(value.menu, function(k, v){                                        
                                            $('#'+v['id']).prop('checked', true); 
                                            setmenu(v['id']);         
                                    });
                                });
                                
                            }
                            },
                            error: function(xhr, resp, text) {
                                loaderoff();
                                console.log(xhr, resp, text);
                                
                            }
                        })
                    })

                    $(document).on('click', '.deleterole', function(){
                        var delname = $(this).parent().next().children('.rolename').html();
                        var elem = $(this).parent().parent();
                        swal({
                            title: \"Are you sure?\", 
                            closeOnCancel: true,
                            showCancelButton: true,   
                            confirmButtonColor: \"#DD6B55\",   
                            confirmButtonText: \"Yes, delete it!\",   
                            cancelButtonText: \"No, cancel plx!\",
                            closeOnConfirm: false,                               
                        }, function(isConfirm){ 
                            if (isConfirm) {  
                            $.ajax({
                                url:'".URL."managerole/removeroll', // url where to submit the request
                                type : 'POST', // type of action POST || GET
                                dataType : 'json', // data type						
                                data : {'rolename':delname}, // post data || get data
                                beforeSend:function(){
                                    $('.loader').show();
                                },
                                success : function(result) {                               
                                    $('.loader').hide();   
                                    elem.remove();                      
                                     $('li :checkbox').prop('checked', false);
                                     swal(\"Done!\", \"It was succesfully deleted!\", \"success\");
                                },
                                error: function(xhr, resp, text) {
                                    $('.loader').hide();
                                    console.log(xhr, resp, text);
                                    swal(\"Error deleting!\", \"Please try again!\", \"error\");
                                }
                            });
                            }
                        });

                    });
                    
                    $('li :checkbox').on('click', function(){    
                        var parent = $(this).parents('li:eq(1)').attr('id');   
                        var mparent = $(this).parents('li:eq(1)').parents('li').attr('id'); 
                        var id = $(this).next().next().val(); 
                        if ($(this).is(':checked')){
                            var id = $(this).next().next().val();                    
                            menu.push({'module':mparent,'submodule':parent,'menu':$(this).val(),'url':$(this).attr('id'),'id':id});
                            
                        }else if($(this).is(':not(:checked)')){
                            menu = menu.filter(mn=>mn.menu!=$(this).val());
                        } 
                       
                    });

                    function setmenu(menuid){

                        var parent = $('#'+menuid).parents('li:eq(1)').attr('id');   
                        var mparent = $('#'+menuid).parents('li:eq(1)').parents('li').attr('id'); 
                        var id = $('#'+menuid).next().next().val(); 
                        
                        var id = $('#'+menuid).next().next().val();                    
                        menu.push({'module':mparent,'submodule':parent,'menu':$('#'+menuid).val(),'url':$('#'+menuid).attr('id'),'id':id});
                    
                        
                    }
                    
                    function zcheckArray(inArr, key, checkval)
                    {
                        var result=0; 
                        for (i = 0; i < inArr.length; i++ )
                        {
                            if (inArr[i][key] == checkval)
                            {
                                result = 1;
                            }
                            
                        }
                        return result;
                    }

                    $('#save').on('click', function(){
                        
                       /* var modules = [];
                        var module = [];
                        
                        $.each(menu, function(key, value){                            
                            if($.inArray(value['module'],module)==-1)
                                module.push(value['module']);
                        })
                        
                        $.each(module, function(key, value){                            
                            modules.push({[value]:menu.filter(mn=>mn.module==value)});                            
                        }) */

                        var subarr = [];
                        $.each(menu, function(key, value){                          
                            if(zcheckArray(subarr, 'submodule', value['submodule'])==0)
                                subarr.push({module:value['module'],submodule:value['submodule']});
                        })
                        var finalmenu = [];
                        $.each(subarr, function(key, value){                            
                            finalmenu.push({module:value['module'],submodule:value['submodule'],menu:menu.filter(mn=>mn.submodule==value['submodule'])});                            
                        }) 

                        var form = $( \"#roleform\" );                        
                        if (form.valid()){
                        var role = $('#userrole').val();
                        $.ajax({
                            url:'".URL."managerole/saverole', // url where to submit the request
                            type : 'POST', // type of action POST || GET
                            dataType : 'json', // data type						
                            data : {'userrole':role,'mdl':finalmenu}, // post data || get data
                            beforeSend:function(){
                                $('#save').html('<i class=\"far fa-save mr-1\"></i>Saving...').addClass('disabled');
                                loaderon(); 
                            },
                            success : function(result) {
                                
                                loaderoff();
                                
                               $('#save').html('<i class=\"far fa-save mr-1\"></i>Save Role').removeClass('disabled');
                               
                               
                                toastr.success(result.message);

                                

                                if(result.result=='fielderror'){
                                    $('#'+result.keycode).focus();
                                }
                                
                                //if(result.result!='Role Created'){
                                    if(result.message=='Role Created'){
                                        var html = '<tr><td><a class=\"deleterole\" href=\"javascript:void(0)\"><i class=\"icon-trash\"></i></a></td><td> <a class=\"rolename\" href=\"javascript:void(0)\">'+result.keycode+'</a></td></tr>';
                                        $('#rolelist').append(html);      
                                    }       
                                //}                   
                            },
                            error: function(xhr, resp, text) {
                                loaderoff();
                                $('#save').html('<i class=\"far fa-save mr-1\"></i>Save Role').removeClass('disabled');
                               
                                console.log(xhr, resp, text);
                            }
                        });
                       }
                    });

                    $('#roleform').validate({
                        rules: {                            
                            userrole: {
                                required: true,
                                minlength: 2
                            }
                        },
                        messages: {                            
                            userrole: {
                                required: 'Please enter Role Name',
                                minlength: 'Your Role Name must consist of at least 2 characters'
                            }
                        },
                        errorElement: 'em',
                        errorPlacement: function ( error, element ) {
                            // Add the `help-block` class to the error element
                            error.addClass( 'help-block text-danger' );

                            if ( element.prop( 'type' ) === 'checkbox' ) {
                                error.insertAfter( element.parent( 'label' ) );
                            } else {
                                error.insertAfter( element );
                            }
                        },
                        highlight: function ( element, errorClass, validClass ) {
                            $( element ).parents( '.col-sm-5' ).addClass( 'has-error' ).removeClass( 'has-success' );
                        },
                        unhighlight: function (element, errorClass, validClass) {
                            $( element ).parents( '.col-sm-5' ).addClass( 'has-success' ).removeClass( 'has-error' );
                        }
                    });
                </script>
            ";
        }
		

	}

?>