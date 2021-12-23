<div class="page-wrapper">
                <div class="page-title">
                
                          
                </div>
                <div class="page-body">
                    <div class="row">
                    <?php $group = array(); 
                    foreach($this->curnotice as $key=>$value){
                        if(count($group)==0){                             
                            array_push($group,$value["xgroup"]);
                        }else{
                            if(!in_array($value["xgroup"],$group)){
                                array_push($group,$value["xgroup"]);
                            }
                        }
                    }
                    ?><?php foreach($group as $grp){ ?>
                        <div class="col-12">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text"><?php echo $grp ?></span>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                      <?php  foreach($this->curnotice as $key=>$value){
                            if($grp == $value["xgroup"]){
                        ?>
                        
                        <div class="col-4">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <div id="resultalert" class="alert alert-dark">
                                            <?php echo $value["xtitle"];?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <img src="https://admin.amarbazarltd.com/images/notice/prodlg/1.jpg" alt="">
                                    
                                    <div class="panel-footer text-right">
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }}} ?>
                    </div>
                </div>    
</div>