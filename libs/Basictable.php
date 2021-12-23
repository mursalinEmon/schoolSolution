<?php
class Basictable{

    /** $data is an array of database select array */
    /** tblsettings is an table setting array 
     * title is table title
     * sumary is table columns to sumary
     * Example : array("title"=>"Chart Of Accounts", "sumary"=>array("Amount", "Discount")) 
     * */

    public function tblbasic($data, $tblsettings){
        if(count($data)===0){
            return "";
        }
        $table = '
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-head">
                        <h5 class="panel-title">'.$tblsettings["title"].'</h5>
                    </div>
                    <div class="panel-body">                       
                            <div class="container">
                                <div class="row bg-dark text-white tblheader">';
                                //craeting table column name
                                foreach($data[0] as $key=>$value){                                    
                                    
                                    $table .='<div class="col">'.$key.'</div>';             
                                                
                                }
                        $table .= '</div>';
                     //craeting table data row
                     
        foreach($data as $key=>$value){
                    $table .= '<div class="row border tbldata">';
                                foreach($value as $k=>$v){
                                    $table .='<div class="col">'.$v.'</div>';
                                                 
                                }  
                    $table .= '</div>';   
                        }
                    //creating sumary row from $tblsettings sumary key     
                    $table .= '<div class="row bg-dark text-white tblheader">';
                        foreach($data[0] as $key=>$value){ 
                                                               
                             if(in_array($key, $tblsettings["sumary"])){  
                                    $total = array_reduce($data, function($tot, $val) use ($key) {                                         
                                        return $tot + $val[$key];
                                    }); 
                                    $table .='<div class="col">'.$total.'</div>'; 
                             }else{
                                    $table .='<div class="col"></div>';                
                             }        
                        }    
                        $table .= '</div>';  
                    $table.='</div>
                </div>
            </div>
        </div>
        ';

        return $table;

       
    }


    public function formtable(){

      return   $table = '
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-head">
                    <div class="panel-title">
                        <div class="panel-title-text">Invoices</div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Office Manager</td>
                                    <td>$ 400.00</td>
                                    <td><span class="badge badge-success badge-sm badge-pill">Paid</span></td>
                                    <td><i class="far fa-clock mr-2 text-muted"></i> 24 March 2018</td>
                                    <td>
                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Edit"><i class="icon-pencil mr-2 text-info"></i></a>
                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Delete"><i class="icon-trash text-danger"></i></a>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="row widget-separator-1 m-0">
                    <div class="col-md-4">
                        <div class="widget-1">
                            <div class="content">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="title">Total Sales</h5>
                                        <span class="descr">Monthly</span>
                                    </div>
                                    <div class="col text-right">
                                        <div class="number text-success">+$22900</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget-1">
                            <div class="content">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="title">Orders</h5>
                                        <span class="descr">Weekly Orders</span>
                                    </div>
                                    <div class="col text-right">
                                        <div class="number text-secondary">+1,450</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget-1">
                            <div class="content">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="title">Expenses</h5>
                                        <span class="descr">Monthly Expenses</span>
                                    </div>
                                    <div class="col text-right">
                                        <div class="number text-success">+$12900</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';

    }

    public function basicdatatable($data,$keyid, $title){
        if(count($data)===0){
            return "";
        }
        $table = "";
        $table .= '<div class="col-12">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <h5 class="panel-title">'.$title.'</h5>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%">
                                        <thead><tr>';
                                        foreach($data[0] as $key=>$value){
                                            $table .= '<th>'.$key.'</th>';                                            
                                        }   
                            $table .='</tr></thead>
                                        <tbody>';
                                        foreach($data as $key=>$value){
                                            $table .= '<tr>';
                                            foreach($value as $k=>$v){
                                                if($keyid==$k)
                                                    $table .='<td><a href="javascript:void(0)" onclick="post_value($(this).text(), \''.$keyid.'\')">'.$v.'</a></td>';
                                                else
                                                    $table .='<td>'.$v.'</td>';    

                                            }  
                                            $table .= '</tr>';
                                        }
                                           
                                        $table .= '</tbody>                                        
                                    </table>
                                </div>
                            </div>
                        </div>';
        return $table;                
    }

    public function basicpopuptable(){
        
        $table = "";
        $table .= '
                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                <div id="paneldata">
                                </div> 
                                </div>
                            </div>
                        ';
        return $table;                
    }


    public function formdetail(){

        return   $table = '
                    <div class="row">
                        <div class="col-12">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <div class="panel-title-text">Item Detail</div>
                                    </div>
                                </div>
                                <div class="panel-body detail" id="detail">
                                    
                                        <div class="row no-gutters border">
                                            <div class="col-2 border">
                                                ID
                                            </div>
                                            <div class="col-4 border">
                                                Name
                                            </div>
                                            <div class="col-2 border">
                                                Date
                                            </div>
                                            <div class="col-2 border">
                                                Amount
                                            </div>
                                            <div class="col-2 border">
                                                Discount
                                            </div>
                                        </div>
                                        <div class="row no-gutters" id="row0">
                                            <div class="col-2">
                                                <div class="input-group">
                                                <input type="text" id="cusid" class="form-control form-control-sm cusid">
                                                <div class="input-group-append">
                                                            <button class="btn btn-info btn-sm" id="btn" onClick="popupCenter(\''.URL.'popuppage/viewpopup/cusid\', \'Item List\', 750, 450);" type="button">List</button>
                                                    </div>
                                                 </div>   
                                            </div>
                                            <div class="col-4">
                                                <input type="text" id="cusname" class="form-control form-control-sm" >
                                            </div>
                                            <div class="col-2">
                                                <input type="text" id="saledate" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" id="cusamount" class="form-control form-control-sm numeric">
                                            </div>
                                            <div class="col-2">
                                                <input type="text" id="cusdisc" class="form-control form-control-sm digit">
                                            </div>
                                        </div>
                                        
                                        
                                </div>
                                <div class="row no-gutters" id="rowb">
                                            <div class="col-2">
                                                
                                            </div>
                                            <div class="col-4">
                                                
                                            </div>
                                            <div class="col-2">
                                                
                                            </div>
                                            <div class="col-2">
                                                
                                            </div>
                                            <div class="col-2">
                                                <button id="addrow" class="btn btn-success">+</button>
                                                <button id="saverow" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
      
      ';
  
      }

}

?>