<?php

class Pointofsale_model extends Model{

    function __construct(){
        parent::__construct();
    }

    function create($hdata, $dt){
        $success=0;
        //$this->log->modellog(count($this->getinvoiceheader($hdata['xsalesnum'])));
        if(count($this->getinvoiceheader($hdata['xsalesnum']))==0){
            $success = $this->db->insert('imretailsale',$hdata);
        }else{
            $success=1;
        }

        if($success>0){
            $success = 0;
            if(count($this->getinvoiceitem($dt['xtxnnum'],$dt['xitemcode']))==0){
                $success = $this->db->insert('imretaildet',$dt);
            }else{
                $udata['xqty'] = $dt['xqty'];
                $success = $this->db->dbupdate('imretaildet',$udata, " xtxnnum='".$dt['xtxnnum']."' and xitemcode='".$dt['xitemcode']."'");
            }
            
        }
        return $success;
    }

    function createtxn($table,$data){
        return $this->db->insert($table,$data);
    }

    function getrindt($rin){
        return $this->db->select('mlminfo',array("xorg,distrisl"), " xrdin='".$rin."'");
    }

    function updatecus($invno,$cus,$flag){
        $st = "update imretailsale set xcus = '".$cus."' where xsalesnum='".$invno."' and zemail='".Session::get('suser')."'"; 
        $result = $this->db->executecrud($st);
        if($flag==2){
            $st = "update imretaildet set xtoparty = '".$cus."' where xtxnnum='".$invno."' and zemail='".Session::get('suser')."'"; 
            $result = $this->db->executecrud($st);
        }
        return $result;
    }

    function confirm($invoice, $refrin){
        $udata['xstatus'] = 'Confirmed';
        $udatadt['xstatus'] = 'Confirmed';
        $udatadt['xtoparty'] = $refrin;

        $success = $this->db->dbupdate('imretailsale',$udata, " xsalesnum='".$invoice."' and zemail='".Session::get('suser')."'");
        $success = $this->db->dbupdate('imretaildet',$udatadt, " xtxnnum='".$invoice."' and zemail='".Session::get('suser')."'");
        return $success;
    }

    function deleteitem($invno, $item){
        $st = "delete from imretaildet where xtxnnum='".$invno."' and xitemcode='".$item."' and zemail='".Session::get('suser')."'"; 
        return $this->db->executecrud($st);
    }

    function getinvoiceheader($invoice){
        $conditions[]= "zemail = ?";
        $conditions[]= "xsalesnum = ?";
        $params[]= Session::get('suser');
        $params[]= $invoice;
		return $this->db->dbselectbyparam('imretailsale','xsalesnum, xcus, xdate, xstatus',$conditions,$params);

    }

    function getinvoiceitem($invoice, $item){
        $conditions[]= "zemail = ?";
        $conditions[]= "xtxnnum = ?";
        $conditions[]= "xitemcode = ?";
        $params[]= Session::get('suser');
        $params[]= $invoice;
        $params[]= $item;
		return $this->db->dbselectbyparam('imretaildet','xitemcode, xqty, xrate, xstatus',$conditions,$params);

    }

    function customersearch($searchcol,$searchval){

        $conditions[]= $searchcol." like ?";
        $conditions[]= " 1=1 ORDER BY xcussl DESC";
		$params[]= "%".$searchval."%";
		return $this->db->dbselectbyparam('secus','xcus as cin,xorg as cusname,xmobile as mobile',$conditions,$params);

    }

    function txnsearch($searchcol,$searchval){

        $where = "m.xcus = c.xcus and ".$searchcol." like '%".$searchval."%' and m.zemail = '".Session::get('suser')."'";
        
        return $this->db->select('imretailsale m, secus c',array("DATE_FORMAT(m.xdate,'%d-%m-%Y') as txndate,m.xsalesnum as txnnum,m.xcus as cin,c.xorg as cusname, c.xmobile as mobile"),$where);

    }
    
    function txnsearchall(){

        $where = "m.xcus = c.xcus and m.zemail = '".Session::get('suser')."' order by m.ztime desc";
        
        return $this->db->select('imretailsale m, secus c',array("DATE_FORMAT(m.xdate,'%d-%m-%Y') as txndate,m.xsalesnum as txnnum,m.xcus as cin,c.xorg as cusname, c.xmobile as mobile"),$where);

    }

    function getcustomer($cus){
        $conditions[]= "xcus = ?";
       
		$params[]= $cus;
		return $this->db->dbselectbyparam('secus','xcus as cin,xorg as cusname,xmobile as mobile',$conditions,$params);

    }

    function getinvoiceno(){
        $conditions[]= "zemail = ?";
        $conditions[]= "xstatus = ?";
        $params[]= Session::get('suser');
        $params[]= 'Confirmed';
		return $this->db->dbselectbyparam('imretailsale','coalesce(max(xinvsl),0)+1 as xinvno',$conditions,$params);

    }

    function getinvoicedetail($invoice){
        $conditions[]= "xsalesnum = ?";
        $conditions[]= "zemail = ?";
        //$conditions[]= "xstatus = ?";
        $conditionsdt[]= "xtxnnum = ?";
        $conditionsdt[]= "zemail = ?";
        
        $params[]= $invoice;
        $params[]= Session::get('suser');
        //$params[]= 'Created';

        $salesheader = $this->db->dbselectbyparam('imretailsale m',"xsalesnum as txnnum,DATE_FORMAT(xdate,'%d-%m-%Y') as entrydate,xcus as cin,(select xorg from secus c where m.xcus=c.xcus) as cusname,(select xmobile from secus c where m.xcus=c.xcus) as cusmobile,(select xadd1 from secus c where m.xcus=c.xcus) as cusadd, xstatus as status",$conditions,$params);
        $salesdetail = $this->db->dbselectbyparam('imretaildet m',"xtxnnum as txnnum,xitemcode as itemcode,xqty as qty,xrate as rate,xqty*xrate as total,(select xdesc from seitem c where m.xitemcode=c.xitemcode) as itemdesc, xqty*xbv as bv,xdeladd as addr, xcompany as company,xdelname as delname,xdeladd as deladd, xmobile as mobile",$conditionsdt,$params);
		return array("invoiceno"=>$invoice,"header"=>$salesheader,"detail"=>$salesdetail);

    }

    function gettxndetail($invoiceno){
        $conditionsdt[]= "xtxnnum = ?";
        $conditionsdt[]= "zemail = ?";
        $params[]= $invoiceno;
        $params[]= Session::get('suser');
        return $this->db->dbselectbyparam('imretaildet m',"xtxnnum as txnnum,xitemcode as itemcode,xqty as qty,xrate as rate,xqty*xrate as total,(select xdesc from seitem c where m.xitemcode=c.xitemcode) as itemdesc, xqty*xbv as bv",$conditionsdt,$params);
    }

    function getitemdt($item){
        $conditions[]= "xitemcode = ?";
        $conditions[]= "zactive = ?";
        $params[]= $item;
        $params[]= 1;   
		return $this->db->dbselectbyparam('seitem','xitemcode,xdesc,xdp,xstdprice,xstdcost',$conditions,$params);

    }

    function mystock($text){
        
        return $this->db->select("`imretaildet` t",array("xitemcode as itemcode, (select xdesc from seitem s where t.xitemcode=s.xitemcode) as `itemdesc`, xqty*xsign as qty"), " xrdin='".Session::get('suser')."' and xdoc between 0 and 3");
    }

    function itemstock($item){
        
        $conditions[]= "xrdin = ?";
        $conditions[]= "xitemcode = ?";
        $conditions[]= "xdoc between ? and ?";
        $params[]= Session::get('suser');
        $params[]= $item;
        $params[]= 0;
        $params[]= 3;
		return $this->db->dbselectbyparam('imretaildet','coalesce(sum(xqty*xsign),0) as stock',$conditions,$params);

    }

    function getSatementNo(){
		return $this->db->getStatementNo();
	}
}