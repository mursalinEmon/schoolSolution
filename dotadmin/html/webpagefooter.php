<footer id="footer">
            <div class="layer-stretch">
                <!-- Start main Footer Section -->
                <div class="row layer-wrapper">
                    <div class="col-md-4 footer-block">
                        <div class="footer-ttl"><p>Basic Info</p></div>
                        <div class="footer-container footer-a">
                            <div class="tbl">
                                <div class="tbl-row">
                                    <div class="tbl-cell"><i class="fa fa-map-marker"></i></div>
                                    <div class="tbl-cell">
                                        <p class="paragraph-medium paragraph-white">
                                        Kasfia Plaza (4th and 5th Floor),<br />
                                        35/C,<br />
                                            Naya Paltan, Dhaka
                                        </p>
                                    </div>
                                </div>
                                <div class="tbl-row">
                                    <div class="tbl-cell"><i class="fa fa-phone"></i></div>
                                    <div class="tbl-cell">
                                        <p class="paragraph-medium paragraph-white">02-5555252</p>
                                    </div>
                                </div>
                                <div class="tbl-row">
                                    <div class="tbl-cell"><i class="fa fa-envelope"></i></div>
                                    <div class="tbl-cell">
                                        <p class="paragraph-medium paragraph-white">info@amarbazarltd.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 footer-block">
                        <div class="footer-ttl"><p>Quick Links</p></div>
                        <div class="footer-container footer-b">
                            <div class="tbl">
                                <div class="tbl-row">
                                    <ul class="tbl-cell">
                                    <li><a href="<?php echo URL;?>">Home</a></li>
                                    <li><a href="<?php echo URL;?>products/cartdetail">Checkout</a></li>
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="<?php echo URL;?>products">Products</a></li>
                                        <li><a href="<?php echo URL;?>home/photogallery">Photo Gallery</a></li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 footer-block">
                        <div class="footer-ttl"><p>Newsletter</p></div>
                        <div class="footer-container footer-c">
                            <div class="footer-subscribe">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                    <input class="mdl-textfield__input" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="subscribe-email">
                                    <label class="mdl-textfield__label" for="subscribe-email">Your Email</label>
                                    <span class="mdl-textfield__error">Please Enter Valid Email!</span>
                                </div>
                                <div class="footer-subscribe-button">
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary">Submit</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div><!-- End main Footer Section -->
            <!-- Start Copyright Section -->
            <div id="copyright">
                <div class="layer-stretch">
                    <div class="paragraph-medium paragraph-white">2016 © AMARBAZAR LIMITED ALL RIGHTS RESERVED.</div>
                </div>
            </div><!-- End of Copyright Section -->
        </footer><!-- End of Footer Section -->
    </div>
    <!-- **********Included Scripts*********** -->

    <!-- Jquery Library 2.1 JavaScript-->
    <!-- Jquery Library 2.1 JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/jquery/jquery-2.1.4.min.js"></script>
    <!-- Popper JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/popper/popper.min.js"></script>
    <!-- Bootstrap Core JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/bootstrap/bootstrap.min.js"></script>
    <!-- Modernizr Core JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/modernizr/modernizr.js"></script>
    <!-- Animaateheading JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/animateheading/animateheading.js"></script>
    <!-- Material Design Lite JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/material/material.min.js"></script>
    <!-- Material Select Field Script -->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/material/mdl-selectfield.min.js"></script>
    <!-- Flexslider Plugin JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/flexslider/jquery.flexslider.min.js"></script>
    <!-- Owl Carousel Plugin JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/owl_carousel/owl.carousel.min.js"></script>
    <!-- Scrolltofixed Plugin JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/scrolltofixed/jquery-scrolltofixed.min.js"></script>
    <!-- Magnific Popup Plugin JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/magnific_popup/jquery.magnific-popup.min.js"></script>
    <!-- WayPoint Plugin JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/waypoints/jquery.waypoints.min.js"></script>
    <!-- CounterUp Plugin JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/counterup/jquery.counterup.js"></script>
    <!-- masonry Plugin JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/masonry_pkgd/masonry.pkgd.min.js"></script>
    <!-- SmoothScroll Plugin JavaScript-->
    <script src="<?php echo URL; ?>asset_website/assets/plugin/smoothscroll/smoothscroll.min.js"></script>
    <!--Custom JavaScript-->
    <script src="<?php echo URL; ?>asset_website/dist/js/custom.js"></script>
    <script>
        // $(function(){
        //             var html = '';
        //             var cartStore = [];
		// 				if (localStorage.getItem('cartitem') != null) {
		// 					var cartStore = JSON.parse(localStorage.getItem('cartitem'));
							
        //                     var cartcount = 0;
        //                     $.each(cartStore, function(key, value){
        //                         cartcount += 1;
		// 					html += `<li class=\"cart-overview\">
		// 								<a href=\"#\" class=\"row\">
		// 									<div class=\"col-4 pr-0 cart-img\">
		// 										<img src=\"<?php echo URL; ?>public/images/uploads/products/`+value.item+`.jpg\" alt=\"\">
		// 									</div>
		// 									<div class=\"col-8 cart-details\">
		// 										<span class=\"title\">`+value.desc+`</span>
		// 										<span class=\"price\">BDT `+value.price+`</span>
		// 										<span class=\"qty\">Quantity - `+value.qty+`</span>
		// 										<div onClick=\"removeitem('` + value.item + `')\" class=\"cart-remove\"><i class=\"icon-close\"></i></div>
		// 									</div>
		// 								</a>
		// 							</li>`;
		// 				        });

        //                         html += `<li class=\"row align-items-center\">
        //                                 <div class=\"col-2 text-right\">
                                               
        //                                     </div>
        //                                     <div class=\"col-8 text-right\">
        //                                         <p class=\"font-dosis font-20 m-0\">Total : BDT 123</p>
        //                                     </div>
        //                                 </li>
        //                                 <li class=\"row align-items-center\">
        //                                     <div class=\"col-6\">
        //                                         <a href=\"#\" class=\"btn btn-dark text-white text-center\">Checkout</a>
        //                                     </div>
                                            
        //                                     <div class=\"col-6\">
        //                                         <a href=\"javascript:void(0)\" onClick=\"clearcart()\" class=\"btn btn-dark text-white text-center\">Clear</a>
        //                                     </div>
		// 								</li>`;
										
		// 				        $('#mcart').html(html);	
        //                         $('#cart-count').text(cartcount);			    
							
		// 				}
        //             });

        //             function clearcart(){
		// 				localStorage.removeItem('cartitem');
		// 				toastr.success('Cart items removed!');
		// 			}


        
						
    </script>

<script>
					$(function(){
						showcartitem();
					});
					function addtocart(item, desc, price){
						
						var cartStore = [];
                        var found = 0;
						if (localStorage.getItem('cartitem') === null) {
							cartStore.push({ 'item': item, 'desc': desc, 'price': price, 'qty': 1});											
							localStorage.setItem('cartitem', JSON.stringify(cartStore));


						}else{
                            
                            cartStore = JSON.parse(localStorage.getItem('cartitem'));
                            $.each(cartStore, function(key, value){                                
                                if(value.item==item){
                                    value.qty += 1;                                     
                                    found = 1;
                                }
                            })
                            if(found===0)
							    cartStore.push({ 'item': item,'desc': desc,'price': price, 'qty': 1});					
							
							localStorage.setItem('cartitem', JSON.stringify(cartStore));
							
						}
									
						showcartitem();
					}

					function showcartitem(){
                        var html = '';
                        var total = 0;
						var cartcount = 0;
						if (localStorage.getItem('cartitem') !== null) {				
						
						var cartStore = JSON.parse(localStorage.getItem('cartitem'));
						$.each(cartStore, function(key, value){
							total += value.price*value.qty;
							cartcount += 1;
							var itemcode = value.item;
							html += `<li class=\"cart-overview\">
										<a href=\"javascript:void(0);\" class=\"row\">
											<div class=\"col-4 pr-0 cart-img\">
												<img src=\"<?php echo URL; ?>public/images/uploads/products/`+itemcode+`.jpg\" alt=\"\">
											</div>
											<div class=\"col-8 cart-details\">
												<span class=\"title\">`+value.desc+`</span>
												<span class=\"price\">BDT `+value.price+`</span>
												<span class=\"qty\">Quantity - `+value.qty+`</span>
												<div onClick=\"removeitem('` + itemcode + `')\" class=\"cart-remove\"><i class=\"icon-close\"></i></div>
											</div>
										</a>
									</li>`;
						});
                                        
						html += `<li class=\"row align-items-center\">
                                        <div class=\"col-2 text-right\">
                                               
                                            </div>
                                            <div class=\"col-8 text-right\">
                                                <p class=\"font-dosis font-20 m-0\">Total : BDT `+total+`</p>
                                            </div>
                                        </li>
                                        <li class=\"row align-items-center\">
                                            <div class=\"col-6\">
                                                <a href=\"<?php echo URL; ?>products/cartdetail\" class=\"btn btn-dark text-white text-center\"><i class="far fa-check-circle text-white"></i>&nbsp;Checkout</a>
                                            </div>
                                            
                                            <div class=\"col-6\">
                                                <a href=\"javascript:void(0)\" onClick=\"clearcart()\" class=\"btn btn-dark text-white text-center\"><i class="fas fa-shopping-cart text-white"></i>&nbsp;Clear</a>
                                            </div>
										</li>`;
										
						$('#mcart').html(html);	
						
						$('#cart-count').text(cartcount);	
						}else{
                            html += `<li class=\"cart-overview\">
										<a href=\"javascript:void(0);\" class=\"row\">
											<div class=\"col-4 pr-0 cart-img\">
												Empty Cart!
											</div>
											
										</a>
									</li>`;
                                    html += `<li class=\"row align-items-center\">
                                        <div class=\"col-2 text-right\">
                                               
                                            </div>
                                            <div class=\"col-8 text-right\">
                                                <p class=\"font-dosis font-20 m-0\">Total : BDT `+total+`</p>
                                            </div>
                                        </li>`;
                                        $('#mcart').html(html);	
						
						            $('#cart-count').text(cartcount);	

                        }
					}

					function clearcart(){
						localStorage.removeItem('cartitem');
						showcartitem();
                        cartlist();
						//toastr.success('Cart items removed!');
					}
					function removeitem(pitem){						
						var cartStore = JSON.parse(localStorage.getItem('cartitem'));
						var filtereditems = cartStore.filter(function(obj) {
							return obj.item !== pitem;
						});
						localStorage.setItem('cartitem', JSON.stringify(filtereditems));
						cartStore = JSON.parse(localStorage.getItem('cartitem'));
						showcartitem();
                        cartlist();
					}

                function cartcount(){
                    var ocount = 0;
                    if (localStorage.getItem('cartitem') !== null) {							
					var cartStore = JSON.parse(localStorage.getItem('cartitem'));						
                    ocount = Object.keys(cartStore).length!==null ? Object.keys(cartStore).length : 0;
                    }
                    return ocount;
				}
				</script>
    <?php echo $this->script?>

</body>
</html>