
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="section-block"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3 class="widget-title">Upload Course</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-8">
                        
                    <div class="profile-detail pb-5">
                        <ul class="list-items">
                        <form id="coursereg" enctype="multipart/form-data">
                        <li>
                            
                            <span class="profile-name">
                                <select class="sort-ordering-select" id="thm"  name="theme">
                                
                                    <option value="1" >Basic Theme</option>                                                                  
                                </select>
                                
                               </span>
                               <span class="profile-name"><img id="themeimage" src="<?php echo URL;?>assets/images/courses/basic.jpg" class="img-rounded" width="180" height="120"> </span>
                            </li>
                            <li><span class="profile-name">Course Title:</span><span class="profile-desc"><input class="form-control" type="text" value="" id="coursetitle" name="coursetitle" placeholder="Course Title"></span></li>
                            <span class="profile-name">Description</span>
                            <textarea name="description" id="description" rows="10" cols="80">
                            
                            </textarea>
                            <br>
                            <li><span class="profile-name">My pay:</span><span class="profile-desc"><input class="form-control" type="text" value="" id="mypay" name="mypay" placeholder="My Pay"></span></li>
                            <li><span class="profile-name">Venue:</span><span class="profile-desc"><select class="sort-ordering-select" id="venu"  name="venu"></select></span></li>
                            <li><span class="profile-name">Category:</span><span class="profile-desc"><select class="sort-ordering-select" id="category"  name="category"></select></span></li>
                            <li><span class="profile-name">Number Of Class:</span><span class="profile-desc"><input class="form-control" type="text" value="" id="numclass" name="numclass" placeholder="Number Of Class"></span></li>
                            <li><span class="profile-name">Hour Of Class:</span><span class="profile-desc"><input class="form-control" type="text" value="" id="hourclass" name="hourclass" placeholder="Hour Of Class"></span></li>
                            <li><span class="profile-name">Duration:</span><span class="profile-desc"><input class="form-control" type="text" value="" id="duration" name="duration" placeholder="Duration"></span></li>
                            <li><span class="profile-name">Capacity:</span><span class="profile-desc"><input class="form-control" type="text" value="" id="capacity" name="capacity" placeholder="Capacity"></span></li>
                            <li><span class="profile-name">Logistic Amount:</span><span class="profile-desc"><input class="form-control" type="text" value="" id="logisticamt" name="logisticamt" placeholder="Logistic Amount"></span></li>
                            <li><span class="profile-name">Sales Price:</span><span class="profile-desc"><input class="form-control" type="text" value="" id="salesprice" name="salesprice" placeholder="Sales Price"></span></li>
                            <span class="profile-name">Skill Level</span>
                            <textarea name="skilllevel" id="skilllevel" rows="10" cols="80">    
                            
                            </textarea>
                            <span class="profile-name">Learning</span>
                            <textarea name="learning" id="learning" rows="10" cols="80">
                            
                            </textarea>
                            <br>
                            <li><span class="profile-name"><button id="coursereg" class="theme-btn">Upload Course</button></span><span class="profile-desc"></span></li>
                            </form>
                        </ul>
                    </div>
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
    