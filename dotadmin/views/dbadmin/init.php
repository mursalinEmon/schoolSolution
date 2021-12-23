
<form id="dotform">
<div class="text-aria">
    
        <div class="box">
            <select name="optype" class="custom-select">
                <option selected>Commands</option>
                <option value="Record Select">Record Select</option>
                <option value="Record Insert">Record Insert</option>                                
                <option value="Record Update">Record Update</option>
                <option value="Record Delete">Record Delete</option>
                <option value="Create Table">Create View/Table</option>
                <option value="Drop Table">Drop Table</option>
                <option value="Describe Table">Describe Table</option>
                <option value="Create Database">Create Database</option>
            </select>
        </div>
        <div class="box-aria">
            <textarea name="dbsql" class="text-box"></textarea>
        </div>
        <div class="box">
          <button type="submit" value="appdba/exeq" class="btn btn-sm btn-danger btnsubmit">Execute</button>          
          <input type="password" name="pass" name="pass" class="pass" placeholder="Password"> 
            <!--<input id="countries"/>--> 
                     
        </div>
      
</div>
<div class="result">
      <select name="selectlimit" class="custom-select">
          <option value="25" selected>25</option>
          <option value="50">50</option>
          <option value="100">100</option>                                                
      </select>
</div>
</form>
<div id="processing" style="display:none"><img src="<?php echo URL;?>public/appimages/processing.gif">
</div>
<div id="result">

</div>

