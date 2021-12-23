<?php

class Retailercart_model extends Model{

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

    function updatecus($invno,$cus,$flag){
        $st = "update imretailsale set xcus = '".$cus."' where xsalesnum='".$invno."' and zemail='".Session::get('suser')."'"; 
        $result = $this->db->executecrud($st);
        if($flag==2){
            $st = "update imretaildet set xtoparty = '".$cus."' where xtxnnum='".$invno."' and zemail='".Session::get('suser')."'"; 
            $result = $this->db->executecrud($st);
        }
        return $result;
    }

    function confirm($invoice){
        $udata['xstatus'] = 'Confirmed';
        $success = $this->db->dbupdate('imretailsale',$udata, " xsalesnum='".$invoice."' and zemail='".Session::get('suser')."'");
        $success = $this->db->dbupdate('imretaildet',$udata, " xtxnnum='".$invoice."' and zemail='".Session::get('suser')."'");
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
        $conditions[]= $searchcol." 1=1 ORDER BY xcussl DESC";
		$params[]= "%".$searchval."%";
		return $this->db->dbselectbyparam('secus','xcus as cin,xorg as cusname,xmobile as mobile',$conditions,$params);

    }

    function txnsearch($where){

        return $this->db->select('imretail m, mlminfo c',array("DATE_FORMAT(m.xdate,'%d-%m-%Y') as txndate,m.imretailsl as txnnum,m.xrdin as rin,m.xdelname as cusname, c.xmobile as mobile"),$where);

    }

    function getcustomer($cus){
        $conditions[]= "xcus = ?";
        $conditions[]= $searchcol." 1=1 ORDER BY xcussl DESC";
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

        $conditionsdt[]= "xtxnnum = ?";
        $conditionsdt[]= "zemail = ?";
        
        $params[]= $invoice;
        $params[]= Session::get('suser');

        $salesheader = $this->db->dbselectbyparam('imretailsale m',"xsalesnum as txnnum,DATE_FORMAT(xdate,'%d-%m-%Y') as entrydate,xcus as cin,(select xorg from secus c where m.xcus=c.xcus) as cusname, xstatus as status",$conditions,$params);
        $salesdetail = $this->db->dbselectbyparam('imretaildet m',"xtxnnum as txnnum,xitemcode as itemcode,xqty as qty,xrate as rate,xqty*xrate as total,(select xdesc from seitem c where m.xitemcode=c.xitemcode) as itemdesc, xqty*xbv as bv",$conditionsdt,$params);
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

    function ablitemlist($text){
        
        return $this->db->select("`seitem` t",array("xitemcode as itemcode,xdesc as itemdesc,xstdprice as mrp,xdp as bv,xstdcost as cost"), " zactive=1 and xcitem='All Operation' and xsource!='Corporate' and xdesc like '%".$text."%'");
    }

    function itemstock($item){
        
        $conditions[]= "xrdin = ?";
        $conditions[]= "xitemcode = ?";
        $params[]= Session::get('suser');
        $params[]= $item;
		return $this->db->dbselectbyparam('imretaildet','coalesce(sum(xqty*xsign),0) as stock',$conditions,$params);

    }

    function odclist($district){
        
        $conditions[]= "xdistrict = ?";
        
        $params[]= $district;
		return $this->db->dbselectbyparam('odc','odcnum as odcid',$conditions,$params);

    }

    function getSatementNo(){
		return $this->db->getStatementNo();
	}
}