<?php 
	class Cart extends Controller{

		function __construct(){
			parent::__construct();
			
	       $this->view->script=$this->script();
	    }
 
	    function init(){			
			//$this->view->business = $this->model->getbusiness();
			//$this->view->category = $this->model->getcategories();
			//$this->view->maincategory = $this->model->getmaincategories();
	    	$this->view->render("studentlogin","dotschoolview/cart_view");
		}

		
		private function script(){
			return "<script>
				
				$(document).ready(function(){
					showcarttable()
					$('#chopcart').hide()
					$('#extracartbtn').hide()
					
				})

				function qtyinc(item){
					var gtotal = 0;

					// console.log(item);
					var cartlist = JSON.parse(sessionStorage.getItem('cartitem'))
					for(var i=0; i < cartlist.length; i++){
						if(cartlist[i].itemcode===item){
					console.log(item);

							var val = $('#numqty'+item).val()
							console.log(val)

							if(parseInt(val)>0){

								cartlist[i].qty = parseInt(cartlist[i].qty)+1;
								
								var total = parseInt(cartlist[i].qty)*parseInt(cartlist[i].amt);
							
								$('#itemtotal'+item).html(total);
					
								// $('numqty'+item).val(cartlist[i].qty)
	
								sessionStorage.setItem('cartitem', JSON.stringify(cartlist));
							}else{

							}
						}
						
						var cartlist = JSON.parse(sessionStorage.getItem('cartitem'))

						gtotal += parseInt(cartlist[i].qty)*parseInt(cartlist[i].amt);
					
						$('#stotal').html('BDT '+gtotal);
						$('#total').html('BDT '+gtotal);
					}
				}

				function qtyminus(item){

					var cartlist = JSON.parse(sessionStorage.getItem('cartitem'))
					var gtotal = 0;
					for(var i=0; i < cartlist.length; i++){
						
						if(cartlist[i].itemcode===item){
					console.log(item);

							// console.log('bef'+ cartlist[i].qty)
							
							var val1 = $('#numqty'+item).val()
							console.log(val1)
							if(parseInt(val1)>1){
								console.log(cartlist[i].qty)
								cartlist[i].qty = parseInt(cartlist[i].qty)-1;
								console.log('after' + cartlist[i].qty)

								var total = parseInt(cartlist[i].qty)*parseInt(cartlist[i].amt);

								$('#itemtotal'+item).html(total);
		
								console.log(cartlist[i].qty)
								// $('numqty'+item).val(cartlist[i].qty)

								sessionStorage.setItem('cartitem', JSON.stringify(cartlist));
							}else{
								$('#numqty'+item).val(2)
								// console.log(cartlist[i].qty)
								
								

							}

							
							
						}

						var cartlist = JSON.parse(sessionStorage.getItem('cartitem'))
						// console.log(parseInt(cartlist[i].qty));
						// console.log(parseInt(cartlist[i].amt));
						gtotal += parseInt(cartlist[i].qty)*parseInt(cartlist[i].amt);
						// console.log(gtotal);

							$('#stotal').html('BDT '+gtotal);
							$('#total').html('BDT '+gtotal);
					}
				}

				
				

				function removefromtable(item){
					// var itm = String(item);
					var gtotal = 0;
					console.log(item);
					removecart(item)
					$('#row'+item).remove();
					var cartlist = JSON.parse(sessionStorage.getItem('cartitem'))
					if(cartlist.length==0){
						$('#stotal').html('BDT 0');
						$('#total').html('BDT 0');
					}
					for(var i=0; i < cartlist.length; i++){
						gtotal += parseInt(cartlist[i].qty)*parseInt(cartlist[i].amt);
							$('#stotal').html('BDT '+gtotal);
							$('#total').html('BDT '+gtotal);
					}
				}
				
				function showcarttable(){
						var cartlist = JSON.parse(sessionStorage.getItem('cartitem'));
						var gtotal = 0;
						console.log(cartlist);
						for(var i=0; i < cartlist.length; i++){
							gtotal += parseInt(cartlist[i].qty)*parseInt(cartlist[i].amt);
							$('#stotal').html('BDT '+gtotal);
							$('#total').html('BDT '+gtotal);
							var itm = cartlist[i].itemcode;
							$('#carttable').append(
								`
								<tr id=\"row`+cartlist[i].itemcode+`\">
									<td><a href=\"".URL."courses/coursedetail/`+itm+`\" class=\"d-block\"><img src=\"".URL."assets/images/courses/`+itm+`.jpg\" alt=\"product image\"></a></td>
									<td>
										<div class=\"cart-product-desc\"><a href=\"".URL."courses/coursedetail/`+itm+`\" class=\"d-block\">`+cartlist[i].desc+`</a>
											
										</div>
									</td>
									<td>
										<span class=\"item__price\">`+cartlist[i].amt+`
											
										</span>
									</td>
									<td>
										<div class=\"input-number-group\">
											<div class=\"input-group-button\">
												<span onClick=\"qtyminus(\'`+itm+`'\)\" class=\"input-number-decrement\">-</span>
											</div>
											<input readonly class=\"input-number\" id=\"numqty`+itm+`\" type=\"number\" value=\"`+cartlist[i].qty+`\" min=\"1\" max=\"1000\">
											<div class=\"input-group-button\">
												<span id=\"numinc\" onClick=\"qtyinc(\'`+itm+`'\)\" class=\"input-number-increment\">+</span>
											</div>
										</div>
									</td>
									<td>
										<span class=\"item__price\" id=\"itemtotal`+itm+`\">`+parseInt(cartlist[i].amt)*parseInt(cartlist[i].qty)+`
											
										</span>
									</td>
									<td>
										<button type=\"button\" class=\"button-remove\" onClick=\"removefromtable(\'`+itm+`'\)\"><i class=\"fa fa-close\"></i></button>
									</td>
								</tr>
								`
							);
						}
					}

				
				</script>
			";
		}

	}

?>