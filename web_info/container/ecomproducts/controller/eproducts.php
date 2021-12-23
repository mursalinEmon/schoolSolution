<?php 
	class Eproducts extends Controller{

		function __construct(){
			parent::__construct();		
			
	       
	    }

	    function init(){
			
			$this->view->bannertext='<h1>ABL <span class="text-warning">Products</span></h1>';
			$this->view->breadcrumb='<p><a href="'.URL.'">Home</a> &#8594; <span>ABL Products</span></p>';
			$this->view->productlist = $this->model->getproducts();
			$this->view->menuitem=Menu::getmenu();	
			$this->view->script = $this->script();
	    	$this->view->render("webpagetemplate","webhome/products");			
		}

		function productdetail($item){
			$this->view->product = $this->model->getitembyid($item);
			$this->view->bannertext='<h1>ABL <span class="text-warning">Products</span></h1>';
			$this->view->breadcrumb='<p><a href="'.URL.'">Home</a> &#8594; <a href="'.URL.'products"><span>ABL Products</span></a> &#8594; <span>Product Detail</span></p>';
			$this->view->productlist = $this->model->getproducts();
			$this->view->script = $this->script();
			$this->view->menuitem=Menu::getmenu();	
			$this->view->render("webpagetemplate","webhome/productdetail");	
		}

		function cartdetail(){
			
			$this->view->bannertext='<h1>ABL <span class="text-warning">Products</span></h1>';
			$this->view->breadcrumb='<p><a href="'.URL.'">Home</a> &#8594; <a href="'.URL.'products"><span>ABL Products</span></a> &#8594; <span>Cart</span></p>';
			
			$this->view->menuitem=Menu::getmenu();	
			$this->view->script = $this->cartscript();
			$this->view->render("webpagetemplate","webhome/cartdetail");	
		}
		
		private function cartscript(){
			return "<script>			
				$(function(){
						cartlist();
						disableCheckout();
						
						$(document).on('click', '.cartminus', function(){
							var cartStore = JSON.parse(localStorage.getItem('cartitem'));	
							var _this = $(this).parent().next().children();
							var cartqty = parseInt(_this.val());
							cartqty -= 1;
							if(cartqty<=1){
								cartqty = 1;
							}
							
							cartStore[$(this).val()].qty=cartqty;
							
							localStorage.setItem('cartitem', JSON.stringify(cartStore))
							showcartitem();
							$(_this).val(cartqty);
							var itotal = cartStore[$(this).val()].price*cartStore[$(this).val()].qty;
							$(this).closest('table').closest('tr').children('#itotal').html(itotal);
							var gtot = grandtotal();
							$('#gtotal').html('Total: '+gtot);
						});

						$(document).on('click', '.cartplus', function(){
							var cartStore = JSON.parse(localStorage.getItem('cartitem'));	
							var _this = $(this).parent().prev().children();
							//var _itemtotal = $(this).parent().prev().children();
							var cartqty = parseInt(_this.val());							
							cartqty += 1;
							if(cartqty>100){
								cartqty = 100;
							}
							var itotal = cartStore[$(this).val()].price*cartStore[$(this).val()].qty;
							cartStore[$(this).val()].qty=cartqty;
							localStorage.setItem('cartitem', JSON.stringify(cartStore))
							showcartitem();
							$(_this).val(cartqty);
							var itotal = cartStore[$(this).val()].price*cartStore[$(this).val()].qty;
							$(this).closest('table').closest('tr').children('#itotal').html(itotal);
							var gtot = grandtotal();
							$('#gtotal').html('Total: '+gtot);
						});

						$(document).on('keyup', '.cartqty',function(e)
                                {
									if (/\D/g.test(this.value))
									{
										// Filter non-digits from input value.
										this.value = this.value.replace(/\D/g, '1');
									}
						});

						$(document).on('blur', '.cartqty',function(e){
								
							if(parseInt($(this).val())>100){
								$(this).val('1')
							}
						});
						
						
				});

				function disableCheckout(){
					var cartcnt = cartcount();
					
						if(cartcnt>0){							
							$('#confirmcheckout').prop('disabled', false);
						}else{				
							$('#confirmcheckout').prop('disabled', true);
						}
				}

				function grandtotal(){
					if (localStorage.getItem('cartitem') !== null) {							
						var cartStore = JSON.parse(localStorage.getItem('cartitem'));						
						var total = Object.values(cartStore).reduce((t, {price, qty}) => t + parseFloat(price)*parseFloat(qty), 0);
						return total;
					}
				}
				function cartlist(){
					var html = '';
						var total = 0;
						var itemtotal = 0;
						var cartcount = 0;
						if (localStorage.getItem('cartitem') !== null) {				
						
						var cartStore = JSON.parse(localStorage.getItem('cartitem'));
						$.each(cartStore, function(key, value){
							total += value.price*value.qty;
							itemtotal = value.price*value.qty;
							
							
							cartcount += 1;
							var itemcode = value.item;
							html += `<tr>
										
											<td>
												<img src=\"".URL."public/images/uploads/products/`+itemcode+`.jpg\" height=\"60\" width=\"60\" alt=\"\">
											</td>
											
												<td>`+value.desc+`</td>
												<td class=\"text-right\">`+value.price+`</td>
												<td class=\"text-right\"><table class=\"table \" ><tr><td><button  type=\"button\" value=\"`+key+`\" class=\"btn btn-danger cartminus btn-sm\" >-</button></td><td></div><input class=\"form-control form-control-sm  cartqty\" disabled=\"true\" style=\"min-width: 30px;\" type=\"text\" diigit value=\"`+value.qty+`\"></td><td><button  type=\"button\" value=\"`+key+`\" class=\"btn btn-primary btn-sm cartplus\">+</button></td></tr></table></td>
												<td class=\"text-right\" id=\"itotal\">`+itemtotal+`</td>
												<td class=\"text-center\" ><a href=\"javascript:void(0)\" onClick=\"removeitem('` + value.item + `')\"><i class=\"fas fa-trash-alt\"></i></a></td>
										
									</tr>`;
						});
                                        
						
										
						$('#tblcart').html(html);	
						$('#gtotal').html('Total: '+total)
						}else{
                            html += `<tr>
										
											<td colspan=\"6\">
												No Item Found!
											</td>
											
											
										
									</tr>`;

                                        $('#tblcart').html(html);	
						
										$('#gtotal').html('Total: '+total)

						}
						disableCheckout();
				}

				
				
			</script>";
				
		}

		private function script(){
			return "<script>
			function cartlist(){
					
			}
			</script>
			";
		}
		
	}

?>