<!-- ================================
         END FOOTER AREA
================================= -->

<div id="snackbar"></div>

	<!-- Our Footer Middle Area -->
	<section class="footer_middle_area p0">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-md-3 col-lg-3 col-xl-2 pb15 pt15">
					<div class="logo-widget home2">
					    <a href="<?php echo URL?>">
						<img class="img-fluid" src="<?php echo URL?>assets/images/DOT-SCHOOL-SOLUTION-PNG.png" alt="header-logo.png" style="height:50px;">
						<!-- <span>ABCL IT</span> -->
						</a>
					</div>
				</div>
				<div class="col-sm-8 col-md-5 col-lg-6 col-xl-6 pb25 pt25">
					
				</div>
				<div class="col-sm-12 col-md-4 col-lg-3 col-xl-4 pb15 pt15">
					<div class="footer_social_widget mt15">
						<ul>
							<li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer Bottom Area -->
	<section class="footer_bottom_area pt25 pb25">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="copyright-widget text-center">
						<p>Copyright Dot School Solution © 2021. All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
    <div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>


<!-- template js files -->
<!-- Wrapper End -->
<script type="text/javascript" src="<?php echo URL;?>assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/ace-responsive-menu.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/snackbar.min.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/simplebar.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/parallax.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/scrollto.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/jquery.counterup.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/progressbar.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/slider.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/timepicker.js"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="<?php echo URL;?>assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/js/toast.js"></script>

<script>
                    function loaderon() {
                        document.getElementById("overlay").style.display = "block";
                      }
                      
                      function loaderoff() {
                        document.getElementById("overlay").style.display = "none";
                      }

     
        
        $(document).ready(function(){

            let cart = JSON.parse(sessionStorage.getItem('cartitem'));
            // console.log(cart.length);
            var len = 0;
            if(cart!=null){
                if(cart.length>0){
                    getcartitem()
                    $('#extracartbtn').show()
                }else{
                    $('#extracartbtn').hide()
                }
            }
            
           
            

        })

        function cartmessage(message) {
            var x = document.getElementById("snackbar");
            
            x.className = "show";
            $('#snackbar').html(message)
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }

        var cartstr = [];
        function addtocart(pitemcode, pdesc, pamt){
            console.log(cart);
            var cart = JSON.parse(sessionStorage.getItem('cartitem'))
            console.log(cart);
            if(cart!=null){
                if(cart.length>0){
                    cartmessage("You can checkout only one course at a time.");

                    // var have = 0;
                    // var ii = 0;
                    // for(var i=0; i<cart.length; i++){
                    //     if(cart[i].itemcode === pitemcode) {
                    //         have++;
                    //         ii = i;
                    //     }
                    // }

                    if(have>0){
                    cartmessage("You can checkout only one course at a time.");

                        // var uqty = parseInt(cart[ii].qty)+1;
                        //     cart[ii].qty = uqty;
                            
                    }else{
                    cartmessage("You can checkout only one course at a time.");
                        
                        // var obj = {itemcode: pitemcode, desc: pdesc, qty: 1, amt: pamt};
                        // cart.push(obj);
                        
                    }
                    sessionStorage.setItem('cartitem', JSON.stringify(cart))
                    
                }else{
                    var obj = {itemcode: pitemcode, desc: pdesc, qty: 1, amt: pamt};
                    cart.push(obj);
                    sessionStorage.setItem('cartitem', JSON.stringify(cart))
                    cartmessage("You can checkout only one course at a time.");

                    
                }
            }else{
                var obj = {itemcode: pitemcode, desc: pdesc, qty: 1, amt: pamt};
                cartstr.push(obj);
                
                sessionStorage.setItem('cartitem', JSON.stringify(cartstr))
               
            }
            cartmessage("You can checkout only one course at a time.");

            getcartitem()
            cartmessage("Course added to cart");  
            
        }

        // function addtocart(xitemcode){
        //     console.log('addtocart cliccked', xitemcode);
        //     var res=null;
        //     $.ajax({
                                
        //         url:"<?php echo URL;?>home/getcourse",
        //         data:{
        //             xitemcode:xitemcode
        //         }, 
        //         type : "POST",  
        //         dataType: 'json',                                				
                
        //         beforeSend:function(){	
                                    
        //             },
        //             success : function(result) {

        //                 // console.log(result.course.xitemcode);
        //                 // console.log(result.course);

        //                 res=result.course;
        //                 var pitemcode = result.course.xitemcode;
        //                 // console.log(pitemcode);
        //                 var pdesc = result.course.xdesc;
        //                 // console.log(pdesc);
        //                 var pamt = result.course.xstdprice;
        //                 // console.log(pamt);
        //                 var cart = JSON.parse(sessionStorage.getItem('cartitem'))

        //                 if(cart!=null){
        //                     if(cart.length>0){
        //                         for(var i=0; i<cart.length; i++){  
        //                             console.log(cart.length);
        //                             if(cart[i].itemcode!=pitemcode){                                       
        //                                     var obj = {itemcode: pitemcode, desc: pdesc, qty: 1, amt: pamt};
        //                                     // console.log(obj);
        //                                     // console.log(obj.qty);
        //                                     cart.push(obj);

                                            
        //                                 }else{
        //                                     console.log('test');
        //                                     var uqty = parseInt(cart[i].qty)+1;
        //                                     cart[i].qty = uqty;
                                            
        //                                 }

        //                         }
        //                         console.log(JSON.stringify(cart));
                                
        //                         sessionStorage.setItem('cartitem', JSON.stringify(cart))
        //                         // getcartitem()
                                
        //                     }else{
        //                         console.log(res);
        //                         var obj = {itemcode: pitemcode, desc: pdesc, qty: 1, amt: pamt};
        //                         // console.log(obj);
        //                         // console.log(obj.qty);
        //                         cart.push(obj);

                                
        //                         sessionStorage.setItem('cartitem', JSON.stringify(cart))
        //                         // getcartitem()
                                
        //                     }
        //                 }else{
        //                     var obj = {itemcode: pitemcode, desc: pdesc, qty: 1, amt: pamt};
        //                         // console.log(obj);
        //                         // console.log(obj.qty);
        //                         cartstr.push(obj);
                            
        //                     sessionStorage.setItem('cartitem', JSON.stringify(cartstr))
        //                     // getcartitem()
                            
        //             }

        //             // Toast.fire({
        //             //     icon: 'success',
        //             //     title: result.message
        //             // })
                    
        //             },error: function(xhr, resp, text) {
                                    
        //                  }
        //     });


        //     getcartitem()
            
            

        //     // cartmessage("Course added to cart");  
            
        // }

        // function addtocart(pitemcode, pdesc, pamt){                
        //     var obj = {itemcode: pitemcode, desc: pdesc, amt: pamt};
        //     cartstr.push(obj);
            
        //     sessionStorage.setItem('cartitem', JSON.stringify(cartstr))
        //     getcartitem()
        // }
        

       

        function removecart(item){
            let cart = JSON.parse(sessionStorage.getItem('cartitem'))
            for(var i=0; i<cart.length; i++){   

                if(cart[i].itemcode==item){                                       
                    cart.splice(i, 1);
                    sessionStorage.setItem('cartitem', JSON.stringify(cart))
                    getcartitem()
                    cartmessage('Course removed from cart');
                }
            
            }
            

        }

        

        function getcartitem(){
            $('#caritemlist').html(``);
            let cart = JSON.parse(sessionStorage.getItem('cartitem'))
            var len = 0;
            if(cart!=null){
                var len = cart.length;
            }

            if(len>0){
                    $('#extracartbtn').show()
                }else{
                    $('#extracartbtn').hide()
                }
            
            $('#cartcount').html(len)
            var total = 0;
                for(var i=0; i<cart.length; i++){  
                    total +=  parseInt(cart[i].amt)*parseInt(cart[i].qty);
                    $('#caritemlist').append(
                        `<li>
                                
                                <p class="cart-info">
                                    <a href="<?php echo URL;?>mycart">
                                    `+cart[i].desc+`
                                    </a>
                                    <span class="cart__author">Qty `+cart[i].qty+`</span>
                                    BDT `+cart[i].amt+` <a href="javascript:void(0)" onClick="removecart(\'`+cart[i].itemcode+`'\)" id="">Delete</a>
                                    </span>
                                </p>
                            </li>
                            `
                    );
                }
                if(len==0){
                    $('#caritemlist').append(
                    `<li>
                        <p class="cart-info">
                        <span>No Items added</span>
                        </p>
                    </li>`
                )
                }
                $('#caritemlist').append(
                    `
                    <li>
                            <a style="margin-left:padding-top:5px;padding-bottom:5px; color:#ffffff" id="extracartbtn" class="theme-btn w-100 text-center btn btn-success" href="<?php echo URL;?>mycart">Go To Payment Process</a>
                    </li>`
                    
                )
            
            }                 
    
</script>

</body>
</html>