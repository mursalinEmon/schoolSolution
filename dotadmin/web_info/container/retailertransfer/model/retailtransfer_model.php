<?php

class Retailtransfer_model extends Model{

    function __construct(){
        parent::__construct();
    }

    function create($hdata, $dt){
        $success=0;
        //$this->log->modellog(count($this->getinvoiceheader($hdata['xsalesnum'])));
        if(count($this->getinvoiceheader($hdata['xtransnum']))==0){
            $success = $this->db->insert('imretailtransfer',$hdata);
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
        $st = "update imretailtransfer set xrdin = '".$cus."' where xtransnum='".$invno."' and zemail='".Session::get('suser')."'"; 
        $result = $this->db->executecrud($st);
        if($flag==2){
            $st = "update imretaildet set xtoparty = '".$cus."' where xtxnnum='".$invno."' and zemail='".Session::get('suser')."'"; 
            $result = $this->db->executecrud($st);
        }
        return $result;
    }

    function confirm($invoice){
        $udata['xstatus'] = 'Confirmed';
        $success = $this->db->dbupdate('imretailtransfer',$udata, " xtransnum='".$invoice."' and zemail='".Session::get('suser')."' and xstatus!='Confirmed'");
        $success = $this->db->dbupdate('imretaildet',$udata, " xtxnnum='".$invoice."' and zemail='".Session::get('suser')."' and xstatus!='Confirmed'");
        $invoicedt = $this->getinvoicedetail($invoice);
        
        $date = date('Y-m-d');
        $year = date('Y',strtotime($date));
        $month = date('m',strtotime($date)); 
        $stno = $this->getSatementNo();

        $cols = 'insert into imretaildet (xtxnnum,bizid,zemail,xdate,xrdin,xtoparty,stno,xstatus,
            xdoctype,xdocnum,xdoc,xyear,xper,xitemcode,xqty,xrate,xbv,xrow,xsign) values ';
            
            $vals="";
            foreach($invoicedt['detail'] as $key=>$val){
                $vals .= "('".$val['txnnum']."','100',
                    '".Session::get('suser')."','".$date."','".$val['torin']."',
                    '".$val['rin']."','".$stno."','Confirmed','Retailer Transfer Received',
                    '".$val['sl']."',3,".$year.",".$month.",'".$val['itemcode']."',
                    '".$val['qty']."','".$val['rate']."','".$val['itembv']."',
                    0,1),";
            }
            $vals = rtrim($vals,",");

            $st = $cols.$vals;
            
        $success = $this->db->executecrud($st);
        return $success;
    }

    function deleteitem($invno, $item){
        $st = "delete from imretaildet where xtxnnum='".$invno."' and xitemcode='".$item."' and zemail='".Session::get('suser')."'"; 
        return $this->db->executecrud($st);
    }

    function getinvoiceheader($invoice){
        $conditions[]= "zemail = ?";
        $conditions[]= "xtransnum = ?";
        $params[]= Session::get('suser');
        $params[]= $invoice;
		return $this->db->dbselectbyparam('imretailtransfer','xtransnum, xrdin, xdate, xstatus',$conditions,$params);

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

    function retailersearch($searchcol,$searchval){

        $conditions[]= $searchcol." like ?";
		$params[]= "%".$searchval."%";
		return $this->db->dbselectbyparam('mlminfo','xrdin as cin,xorg as cusname,xmobile as mobile',$conditions,$params);

    }

    function txnsearch($searchcol,$searchval){

        $where = " m.xrdin = c.xrdin and ".$searchcol." like '%".$searchval."%' and m.zemail = '".Session::get('suser')."'";
        
        return $this->db->select('imretailtransfer m, mlminfo c',array("DATE_FORMAT(m.xdate,'%d-%m-%Y') as txndate,m.xtransnum as txnnum,m.xrdin as cin,c.xorg as cusname, c.xmobile as mobile"),$where);

    }
    
    function txnsearchall(){

        $where = " m.xrdin = c.xrdin and m.zemail = '".Session::get('suser')."' order by m.ztime desc";
        
        return $this->db->select('imretailtransfer m, mlminfo c',array("DATE_FORMAT(m.xdate,'%d-%m-%Y') as txndate,m.xtransnum as txnnum,m.xrdin as cin,c.xorg as cusname, c.xmobile as mobile"),$where);

    }

    function txnrcvsearch($searchcol,$searchval){

        $where = " m.zemail = c.xrdin and ".$searchcol." like '%".$searchval."%' and m.zemail = '".Session::get('suser')."'";
        
        return $this->db->select('imretailtransfer m, mlminfo c',array("DATE_FORMAT(m.xdate,'%d-%m-%Y') as txndate,m.xtransnum as txnnum,m.zemail as cin,c.xorg as cusname, c.xmobile as mobile"),$where);

    }
    
    function txnrcvsearchall(){

        $where = " m.zemail = c.xrdin and m.zemail = '".Session::get('suser')."' order by m.ztime desc";
        
        return $this->db->select('imretailtransfer m, mlminfo c',array("DATE_FORMAT(m.xdate,'%d-%m-%Y') as txndate,m.xtransnum as txnnum,m.zemail as cin,c.xorg as cusname, c.xmobile as mobile"),$where);

    }

    function getcustomer($cus){
        $conditions[]= "xrdin = ?";
		$params[]= $cus;
		return $this->db->dbselectbyparam('mlminfo','xrdin as cin,xorg as cusname,xmobile as mobile',$conditions,$params);

    }

    function getinvoiceno(){
        $conditions[]= "zemail = ?";
        $conditions[]= "xstatus = ?";
        $params[]= Session::get('suser');
        $params[]= 'Confirmed';
		return $this->db->dbselectbyparam('imretailtransfer','coalesce(max(xtxnsl),0)+1 as xinvno',$conditions,$params);

    }

    function getinvoicedetail($invoice){
        $conditions[]= "xtransnum = ?";
        $conditions[]= "zemail = ?";

        $conditionsdt[]= "xtxnnum = ?";
        $conditionsdt[]= "zemail = ?";
        
        $params[]= $invoice;
        $params[]= Session::get('suser');

        $salesheader = $this->db->dbselectbyparam('imretailtransfer m',"xtransnum as txnnum,DATE_FORMAT(xdate,'%d-%m-%Y') as entrydate,xrdin as cin,(select xorg from mlminfo c where m.xrdin=c.xrdin) as cusname, xstatus as status",$conditions,$params);
        $salesdetail = $this->db->dbselectbyparam('imretaildet m',"xsl as sl,xtxnnum as txnnum,xitemcode as itemcode,xqty as qty,xrate as rate,xqty*xrate as total,(select xdesc from seitem c where m.xitemcode=c.xitemcode) as itemdesc, xqty*xbv as bv,xrdin as rin,xtoparty as torin, xbv as itembv",$conditionsdt,$params);
		return array("invoiceno"=>$invoice,"header"=>$salesheader,"detail"=>$salesdetail);

    }

    function gettxndetail($invoiceno){
        $conditionsdt[]= "xtxnnum = ?";
        $conditionsdt[]= "zemail = ?";
        $conditionsdt[]= "xdoctype = ?";
        $params[]= $invoiceno;
        $params[]= Session::get('suser');
        $params[]= 'Retailer Stock Transfer';
        return $this->db->dbselectbyparam('imretaildet m',"xtxnnum as txnnum,xitemcode as itemcode,xqty as qty,xrate as rate,xqty*xrate as total,(select xdesc from seitem c where m.xitemcode=c.xitemcode) as itemdesc, xqty*xbv as bv",$conditionsdt,$params);
    }

    function getrcvdetail($invoiceno){
        $conditionsdt[]= "xtxnnum = ?";
        $conditionsdt[]= "xrdin = ?";
        $conditionsdt[]= "xdoctype = ?";
        $params[]= $invoiceno;
        $params[]= Session::get('suser');
        $params[]= 'Retailer Transfer Received';
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
        
        return $this->db->select("`imretaildet` t",array("xitemcode as itemcode, (select xdesc from seitem s where t.xitemcode=s.xitemcode) as `itemdesc`, xqty*xsign as qty"), " xrdin='".Session::get('suser')."'");
    }

    function itemstock($item){
        
        $conditions[]= "xrdin = ?";
        $conditions[]= "xitemcode = ?";
        $params[]= Session::get('suser');
        $params[]= $item;
		return $this->db->dbselectbyparam('imretaildet','coalesce(sum(xqty*xsign),0) as stock',$conditions,$params);

    }

    function getSatementNo(){
		return $this->db->getStatementNo();
	}
}