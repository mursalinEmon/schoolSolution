
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


                <div class="container" id="questionSection">
                <form action="" method="post" id="anssubmit">

                    <?php foreach($this->questions as $key=>$val){?>
                    <div class="card">
                    <div class="card-header">
                        <?php echo $val["xques"]?>
                        <input type="hidden" id="exammstsl" value="<?php echo $val["exammstsl"]?>">
                        <input type="hidden" id="examdetsl" value="<?php echo $val["examdetsl"]?>">
                    </div>
                    <div class="card-body">
                    <div id="qus<?php echo $key +1?>" class="<?php echo $key?>">

                        <?php

                            $option = json_decode($val["xoption"]);
                            $input_name= $key +1;
                            // echo $option
                            // foreach($option as $key=>$val){

                            //     Logdebug::appendlog(print_r($val,true));
                            // }
                        
                        ?>

                            <?php foreach($option as $ind=>$opt){?>
                                

                                <div id="question<?php echo $key +1?>">
                                    <input type="radio" id="<?php echo $ind?><?php echo $key?>" name="ques<?php echo $input_name?>" value="<?php echo $ind?>">
                                    
                                    <label for="<?php echo $ind?><?php echo $key?>"><?php echo $opt?></label><br>

                                </div>
                            <?php } ?>
                            <!-- <input id="submit" type="sudmit" value="Submit"> -->

                    </div>
                    
                    </div>
                    </div>
                    <?php } ?>
                        <button id="submitButton" type="submit">Submit</button>
                        </form>


                </div>
                
                <div class="container">
                    <div class="card">
                        <div class="card-header" id="showResult">
                        </div>
                    </div>
                </div>
              
</div>




