
<div class="page-wrapper">
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Student Exam</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="<?php echo URL; ?>dashboard">Home</a></li>
                                    <li>Student Exam</li> <!-- change it by module name -->  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                
              
</div>
<div class="optionSection page-wrapper" >
    <div class="row">
                    <div id="courseOption" class="container form-group  col-lg-6 float-left" style="padding-left: 30px;">
                        <label class="" for="courses">Enrolled Courses</label>
                        <select class="form-control" name="courses" id="courses">
                        <option value="" class="text-center col-lg-6">--Select--</option>
                        <?php foreach($this->courses as $key=>$val){?>
                            <option class="text-center  col-lg-6" value="<?php echo $val["xitemcode"]?>"><?php echo $val["xdesc"]?></option>
                        <?php } ?>
                        
                        </select>
                    </div>


                    <div id="lessonOption" class="container form-group  col-lg-6 float-left" style="padding-left: 30px;">
                        <label class="" for="lessons">Course Lessons</label>
                        <select class="form-control" name="lessons" id="lessons">
                        
                        
                        </select>
                    </div>
                </div>
                <div class="card" >
                        <div class="card-header">
                            Available Exam
                        </div>
                    </div>
                </div>


                <div class="examSection page-wrapper" id="examSection">
                    
                    <div class="card">
                        <div class="card-body" id="availableExamInfo"> 
                            
                        </div>
                        <button id="attepmExam">Attemp Exam</button>
                    </div>

                </div>