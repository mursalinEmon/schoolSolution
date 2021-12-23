<!--======================================
        START COURSE AREA
======================================-->
	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb" style="padding-top:0px!important;padding-bottom:0px!important;height:150px!important;">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content" style="margin-top: 40px;">
						<h4 class="breadcrumb_title">Courses</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="<?php echo URL;?>">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo URL;?>courses">Courses</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Team Members -->
	<section class="our-team pb40">
		<div class="container">
			<div class="row justify-content-around">
				<div class="clo-md-12 col-lg-9 col-xl-8">
					<div class="row justify-content-center">
						<?php foreach($this->courses as $key=>$val){?>

						<div class="col-lg-6 col-xl-4">
							<div class="top_courses ">
								<div class="thumb">
									<img class="img-whp" src="assets/images/courses/<?php echo $val['xitemcode'];?>.jpg" alt="t1.jpg">
									<div class="overlay">
										<div class="tag">Best Seller</div>
										<div class="icon"><span class="flaticon-like"></span></div>
										<a class="tc_preview_course" href="<?php echo URL;?>courses/coursedetail/<?php echo $val['xitemcode'];?>">Preview Course</a>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<!-- <p>Ali TUFAN</p> -->
										<h5 style="height:5rem;overflow:hidden;">
										<a href="<?php echo URL;?>courses/coursedetail/<?php echo $val['xitemcode'];?>"><?php echo $val['xdesc'] ?></a>
										</h5>
										<div class="cart-button">
											<!-- <a href="<?php echo URL;?>products/cartdetail" class="btn btn-dark"><i class="fa fa-check-circle"></i> Checkout</a> -->
											<a href="" id="addtocart" onClick="addtocart('<?php echo $val['xitemcode']?>','<?php echo $val['xdesc']?>','<?php echo $val['xstdprice']?>');" class="btn btn-outline btn-success btn-outline-2x"><i class="fa fa-shopping-cart mr-2"></i>Enroll Course</a>
                                		</div>
										<!-- <ul class="tc_review">
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#">(6)</a></li>
										</ul> -->
									</div>
									<div class="tc_footer">
										<ul class="tc_meta float-left">
											<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
											<li class="list-inline-item"><a href="#">1548</a></li>
											<li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
											<li class="list-inline-item"><a href="#">25</a></li>
										</ul>
										<div class="tc_price float-right">৳<?php echo $val['xstdprice'];?></div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>

					</div>

				</div>
				<div class="col-lg-3 col-xl-3">
					<div class="selected_filter_widget style2 mb30">
					  	<div id="accordion" class="panel-group">
						    <div class="panel">
						      	<div class="panel-heading">
							      	<h4 class="panel-title">
							        	<a href="#panelBodyfilter" class="accordion-toggle link fz20 mb15" data-toggle="collapse" data-parent="#accordion">Selected Filters</a>
							        </h4>
						      	</div>
							    <div id="panelBodyfilter" class="panel-collapse collapse show">
							        <div class="panel-body">
										<div class="tags-bar style2">
									 		<span>Digital Marketing</span>
									 		<br>
									 		<span>Graphic Design</span>
									 		<br>
									 		<span>Spoken English</span>
									 	</div>
							        </div>
							    </div>
						    </div>
						</div>
					</div>
					<div class="selected_filter_widget style2 mb30">
					  	<div id="accordion" class="panel-group">
						    <div class="panel">
						      	<div class="panel-heading">
							      	<h4 class="panel-title">
							        	<a href="#panelBodySoftware" class="accordion-toggle link fz20 mb15" data-toggle="collapse" data-parent="#accordion">Software</a>
							        </h4>
						      	</div>
							    <div id="panelBodySoftware" class="panel-collapse collapse show">
							        <div class="panel-body">
										<div class="ui_kit_checkbox">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck14">
												<label class="custom-control-label" for="customCheck14">Photoshop <span class="float-right"></span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck15">
												<label class="custom-control-label" for="customCheck15">Adobe Illustrator <span class="float-right"></span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck16">
												<label class="custom-control-label" for="customCheck16">Graphic Design <span class="float-right"></span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck17">
												<label class="custom-control-label" for="customCheck17">Sketch <span class="float-right"></span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck18">
												<label class="custom-control-label" for="customCheck18">InDesign <span class="float-right"></span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck19">
												<label class="custom-control-label" for="customCheck19">CorelDRAW <span class="float-right"></span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck20">
												<label class="custom-control-label" for="customCheck20">After Effects <span class="float-right"></span></label>
											</div>
											<a class="color-orose" href="#"><span class="fa fa-plus pr10"></span> See More</a>
										</div>
							        </div>
							    </div>
						    </div>
						</div>
					</div>
					<!-- <div class="selected_filter_widget style2">
					  	<div id="accordion" class="panel-group">
						    <div class="panel">
						      	<div class="panel-heading">
							      	<h4 class="panel-title">
							        	<a href="#panelBodyAuthors" class="accordion-toggle link fz20 mb15" data-toggle="collapse" data-parent="#accordion">Author</a>
							        </h4>
						      	</div>
							    <div id="panelBodyAuthors" class="panel-collapse collapse show">
							        <div class="panel-body">
										<div class="cl_skill_checkbox">
											<div class="content ui_kit_checkbox style2 text-left">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck0">
													<label class="custom-control-label" for="customCheck0">Chris Convrse <span class="float-right">(03)</span></label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck1">
													<label class="custom-control-label" for="customCheck1">Morten Rand <span class="float-right">(15)</span></label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck2">
													<label class="custom-control-label" for="customCheck2">Rayi Villalobos  <span class="float-right">(125)</span></label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck3">
													<label class="custom-control-label" for="customCheck3">James William <span class="float-right">(1.584)</span></label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck4">
													<label class="custom-control-label" for="customCheck4">Jen Kramery <span class="float-right">(34)</span></label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck5">
													<label class="custom-control-label" for="customCheck5">Chris Notder  <span class="float-right">(58)</span></label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck6">
													<label class="custom-control-label" for="customCheck6">Kramery Chris <span class="float-right">(06)</span></label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck7">
													<label class="custom-control-label" for="customCheck7">James William <span class="float-right">(62)</span></label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck8">
													<label class="custom-control-label" for="customCheck8">Chris Notder <span class="float-right">(43)</span></label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck9">
													<label class="custom-control-label" for="customCheck9">Rayi Villalobos <span class="float-right">(23)</span></label>
												</div>
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck10">
													<label class="custom-control-label" for="customCheck10">Kramery Chris <span class="float-right">(57)</span></label>
												</div>
											</div>
										</div>
							        </div>
							    </div>
						    </div>
						</div>
					</div>
					<div class="selected_filter_widget style2 mb30">
					  	<div id="accordion" class="panel-group">
						    <div class="panel">
						      	<div class="panel-heading">
							      	<h4 class="panel-title">
							        	<a href="#panelBodyPrice" class="accordion-toggle link fz20 mb15" data-toggle="collapse" data-parent="#accordion">Price</a>
							        </h4>
						      	</div>
							    <div id="panelBodyPrice" class="panel-collapse collapse show">
							        <div class="panel-body">
										<div class="ui_kit_whitchbox">
											<div class="custom-control custom-switch">
												<input type="checkbox" class="custom-control-input" id="customSwitch1">
												<label class="custom-control-label" for="customSwitch1">Paid </label>
											</div>
											<div class="custom-control custom-switch">
												<input type="checkbox" class="custom-control-input" id="customSwitch2">
												<label class="custom-control-label" for="customSwitch2">Free</label>
											</div>
										</div>
							        </div>
							    </div>
						    </div>
						</div>
					</div>
					<div class="selected_filter_widget style2 mb30">
					  	<div id="accordion" class="panel-group">
						    <div class="panel">
						      	<div class="panel-heading">
							      	<h4 class="panel-title">
							        	<a href="#panelBodySkills" class="accordion-toggle link fz20 mb15" data-toggle="collapse" data-parent="#accordion">Skill level</a>
							        </h4>
						      	</div>
							    <div id="panelBodySkills" class="panel-collapse collapse show">
							        <div class="panel-body">
										<div class="ui_kit_checkbox">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck99">
												<label class="custom-control-label" for="customCheck99">Beginner <span class="float-right">(03)</span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck98">
												<label class="custom-control-label" for="customCheck98">Intermediate <span class="float-right">(15)</span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck97">
												<label class="custom-control-label" for="customCheck97">Advanced <span class="float-right">(126)</span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck96">
												<label class="custom-control-label" for="customCheck96">Appropriate for all <span class="float-right">(1,584)</span></label>
											</div>
										</div>
							        </div>
							    </div>
						    </div>
						</div>
					</div>
					<div class="selected_filter_widget style2">
					  	<div id="accordion" class="panel-group">
						    <div class="panel">
						      	<div class="panel-heading">
							      	<h4 class="panel-title">
							        	<a href="#panelBodyRating" class="accordion-toggle link fz20 mb15" data-toggle="collapse" data-parent="#accordion">Rating</a>
							        </h4>
						      	</div>
							    <div id="panelBodyRating" class="panel-collapse collapse">
							        <div class="panel-body">
										<div class="ui_kit_checkbox style2">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck80">
												<label class="custom-control-label" for="customCheck80">Show All <span class="float-right">(03)</span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck82">
												<label class="custom-control-label" for="customCheck82">1 star and higher <span class="float-right">(15)</span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck83">
												<label class="custom-control-label" for="customCheck83">2 star and higher <span class="float-right">(126)</span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck84">
												<label class="custom-control-label" for="customCheck84">3 star and higher <span class="float-right">(1,584)</span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck85">
												<label class="custom-control-label" for="customCheck85">4 star and higher <span class="float-right">(34)</span></label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="customCheck86">
												<label class="custom-control-label" for="customCheck86">5 star and higher <span class="float-right">(58)</span></label>
											</div>
										</div>
							        </div>
							    </div>
						    </div>
						</div>
					</div>
					<div class="selected_filter_widget style2">
						<span class="float-left"><img class="mr20" src="assets/images/resource/2.png" alt="2.png"></span>
						<h4 class="mt15 fz20 fw500">Not sure?</h4>
						<br>
						<p>Every course comes with a 30-day money-back guarantee</p>
					</div> -->
				</div>
			</div>
		</div>
	</section>
<!--======================================
        END COURSE AREA
======================================-->
