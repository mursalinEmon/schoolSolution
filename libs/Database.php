<?php

class Database extends PDO {
	/*
	* initializing db inside constructor
	**/
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS,array(PDO::MYSQL_ATTR_FOUND_ROWS => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));		
		$this->log = new Logdebug();
	}
	/**
	 * $table string "table name"
	 * $fields string table fieldname separated by ','
	 * $conditions is array, for where condition eg. $conditions[]= "id = ?"
	 * $params is array of parameters for where conditions eg. $params[]= "123"
	 */	
	public function dbselectbyparam($table,$fields,$conditions=[],$params=[],$fetchMode = PDO::FETCH_ASSOC){
		
		$sql = "SELECT $fields FROM $table";
		if ($conditions){
			$sql .= " WHERE ".implode(" AND ", $conditions);
		}
		//$this->log->modellog($sql);
		$sth = $this->prepare($sql);
		$sth->execute($params);	
		$result = $sth->fetchAll($fetchMode);
		//$this->log->modellog(serialize($result));
		return $result;
	}

	public function dbupdatebyparam($table, $data, $wheredata){

		ksort($data);

		$updateFields = NULL;

		$where = NULL;

		$params = array();

		foreach($data as $key => $value){
			$updateFields .= "`$key` = :$key,";
		}

		foreach($wheredata as $key => $value){
			$where .= "`$key` = :$key,";
		}

		foreach($wheredata as $key => $value){
			$params[":$key"] = $value;
		}
		foreach($data as $key => $value){
			$params[":$key"] = $value;
		}
		// $this->log->modellog( serialize($params));
		$updateFields = rtrim($updateFields, ',');
		$where = rtrim($where, ',');
		//print_r($data); die;		
		// $this->log->modellog( "update $table set $updateFields WHERE $where");
		$sth = $this->prepare("update $table set $updateFields WHERE $where");
				
		// foreach ($data as $key => $value){
		// 	$sth->bindValue(":$key", $value);
			
		// }
		 
		$sth->execute($params);
		//$this->log->modellog($sth->rowCount());
		return $sth->rowCount();
	}
	public function select($table, $fields, $where = "1 = 1", $fetchMode = PDO::FETCH_ASSOC){
		if($where=="")
			$where = "1 = 1";
		
			$selectfields = "";
		
		if ($fields != NULL){
			for($i = 0; $i < count($fields); $i++){
				$selectfields.=$fields[$i].",";
			}
			$selectfields = rtrim($selectfields, ',');
		}else{
			$selectfields = "*";
		}
		// $this->log->modellog( "SELECT $selectfields FROM $table WHERE $where");
		 //echo "SELECT $selectfields FROM $table WHERE $where"; die;
		$sth = $this->prepare("SELECT $selectfields FROM $table WHERE $where");
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	public function dbselect($statement,$fetchMode = PDO::FETCH_ASSOC){		
		$sth = $this->prepare($statement);
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	//
	public function insert($table, $data, $onduplicateupd=""){
		
			$result=0;
		
			ksort($data);
			
			$columns = implode('`, `', array_keys($data));
			$fields = ':' . implode(', :', array_keys($data));
			$this->log->modellog( "INSERT INTO $table (`$columns`) VALUES ($fields) $onduplicateupd");
			//print_r($data);
			//echo "INSERT INTO $table (`$columns`) VALUES ($fields) $onduplicateupd"; die;
			$sth = $this->prepare("INSERT INTO $table (`$columns`) VALUES ($fields) $onduplicateupd");

			foreach ($data as $key => $value){
				$sth->bindValue(":$key", $value);
				//$in .= "'".$value."',";
			}
			// $this->log->modellog($in);
			$sth->execute() or die($this->log->modellog(print_r($sth->errorInfo(), true)));;
			$result=$this->lastInsertId();
			
		return $result;
	}
	
	public function insertmultiple($nexttbl, $cols, $vals, $onduplicateupdt=""){
			$res="0";
		
			// $this->log->modellog( "INSERT INTO $nexttbl ($cols) VALUES $vals $onduplicateupdt");
			$st = $this->prepare("INSERT INTO $nexttbl ($cols) VALUES $vals $onduplicateupdt");
			$st->execute();
			$res=$this->lastInsertId();		
			
			return $res;
	}
	
    public function executecrud($statement){	
		// $this->log->modellog($statement);	
		$sth = $this->prepare($statement);
		$sth->execute();
		return $sth->rowCount();
	}
	
	/*
	* update data of table
	* $table is the table name, mandetory field
	* $data is array to be updated
	* $where clause is optional
	**/
	public function dbupdate($table, $data, $where){

		ksort($data);

		$updateFields = NULL;

		foreach($data as $key => $value){
			$updateFields .= "`$key` = :$key,";
		}

		$updateFields = rtrim($updateFields, ',');
		//print_r($data); die;		
		// $this->log->modellog( "update $table set $updateFields WHERE $where");
		$sth = $this->prepare("update $table set $updateFields WHERE $where");
				
		foreach ($data as $key => $value){
			$sth->bindValue(":$key", $value);
			
		}
		 
		$sth->execute();
		//$this->log->modellog($sth->rowCount());
		return $sth->rowCount();
	}
	
	function getroledtfromdb($token){		
		return $this->select('zlog',array("bizid,zrole,zemail,
		(select zuserfullname from pausers where pausers.bizid=zlog.bizid and pausers.zemail=zlog.zemail) as xusername,
		(select bizlong from pabuziness where zlog.bizid=pabuziness.bizid) as xcompany,
		(select bizadd1 from pabuziness where zlog.bizid=pabuziness.bizid) as xbizadd,
		(select bizphone1 from pabuziness where zlog.bizid=pabuziness.bizid) as xbizphone,
		(select bizmobile from pabuziness where zlog.bizid=pabuziness.bizid) as xbizmobile,
		(select bizemail from pabuziness where zlog.bizid=pabuziness.bizid) as xbizemail,
		(select biztaxnum from pabuziness where zlog.bizid=pabuziness.bizid) as xbiztaxnum,
		(select bizcur from pabuziness where zlog.bizid=pabuziness.bizid) as xbizcur,
		(select xkeymenu from paroles where paroles.bizid=zlog.bizid and paroles.zrole=zlog.zrole) as xkeymenu")," ztoken='".$token."' and zexpire=1 LIMIT 1");
		
		
	}
	public function keyIncrement($bizid,$table,$keyfield,$prefix,$num){
		$where = "bizid=".$bizid." and $keyfield like '".$prefix."%'";
		//$this->log->modellog("SELECT coalesce(max(SUBSTRING($keyfield, -$num)),0) as maxnum FROM $table WHERE $where");
		$sth = $this->prepare("SELECT coalesce(max(SUBSTRING($keyfield, -$num)),0) as maxnum FROM $table WHERE $where");
		$sth->execute();
		$maxnum = $sth->fetch(PDO::FETCH_ASSOC);
		
		$pdonum = (int)$maxnum['maxnum'];
		if($pdonum==0)
			$pdonum = 1;
		else
			$pdonum += 1;
		
		//echo $prefix.str_pad((string)$pdonum,$num,"0",STR_PAD_LEFT);die;
		return 	$prefix.str_pad((string)$pdonum,$num,"0",STR_PAD_LEFT);
	}
	
	public function rowincrement($bizid,$table,$keyfield,$num, $field){
		$where = "bizid=".$bizid." and $keyfield='".$num."'";
		//$this->log->modellog("SELECT coalesce(max($field),0) as maxrow FROM $table WHERE $where");
		$sth = $this->prepare("SELECT coalesce(max($field),0) as maxrow FROM $table WHERE $where");
		$sth->execute();
		$maxnum = $sth->fetch(PDO::FETCH_ASSOC);
		
		$pdonum = (int)$maxnum['maxrow'];
		if($pdonum==0)
			$pdonum = 1;
		else
			$pdonum += 1;
		
		//echo $prefix.str_pad((string)$pdonum,$num,"0",STR_PAD_LEFT);die;
		return 	$pdonum;
	}
	
	public function getCommissionBal($xrdin){
		$sth = $this->prepare("SELECT REPLACE(FORMAT(coalesce(sum((xcom-((xcom*xsrctaxpct)/100)-((xcom*xservicechg)/100)-((xcom*xotherchg)/100))*xsign),0),2),',','') as xbalance FROM mlmtotrep WHERE xrdin='".$xrdin."'");
		$sth->execute();
		$balance = $sth->fetch(PDO::FETCH_ASSOC);
		return $balance["xbalance"];
	}
	
	public function getPwalletBal($xrdin){
		$sth = $this->prepare("SELECT REPLACE(FORMAT(coalesce(sum(xamount*xsign),0),2),',','') as xbalance FROM vpwallet WHERE xcus='".$xrdin."'");
		$sth->execute();
		$balance = $sth->fetch(PDO::FETCH_ASSOC);
		return $balance["xbalance"];
	}
	
	public function getPointBal($xrdin){
		$sth = $this->prepare("SELECT coalesce(sum(xpoint*xsign),0) as xbalance FROM vpointpool WHERE xcus='".$xrdin."'");
		$sth->execute();
		$balance = $sth->fetch(PDO::FETCH_ASSOC);
		return $balance["xbalance"];
	}
	public function getStatementNo(){
		$sth = $this->prepare("SELECT coalesce(max(stno),0)+1 as stno FROM mlmtotrep WHERE xcomtype='Retail Commission'");
		$sth->execute();
		$balance = $sth->fetch(PDO::FETCH_ASSOC);
		return $balance["stno"];
	}
	function isupline($user, $chkupid){
		
			$id = $chkupid;
			do {
				$result = $this->select("userbase", array("user_id,up_id"), " user_id=".$id."");
				
				if($result[0]["user_id"]==$user){ 
			
					return 1;
					
					
				}else{
					
					$id = $result[0]["up_id"];
				}
			} while ($id <> 0);
			
			return 0;
	}
}