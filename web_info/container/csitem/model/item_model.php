<?php
class Item_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	public function create($data){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("seitem", $data);
	}
	public function update($data, $where){
		//$this->log->modellog( serialize($data));die;
		return $this->db->dbupdate("seitem", $data, $where);
	}
	public function dbdelete($st){
		//$this->log->modellog($st);die;
		return $this->db->executecrud($st);
	}
	function getitemcode($bizid,$table,$keyfield,$prefix,$num){
		return $this->db->keyIncrement($bizid,$table,$keyfield,$prefix,$num);
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
	function getbusinessdet($bizid){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->select("pabuziness", array(), " bizid=".$bizid."");
	}
	function getitembycode($code, $bizid){
		echo json_encode($this->db->select("seitem", array(), " xitemcode='".$code."' and bizid=".$bizid.""));
	}
	function getitemautolist($searchstr, $bizid){
		echo json_encode($this->db->select("seitem", array("CONCAT(xitemcode,'|',xdesc) as searchData"), " lower(xdesc) like lower('%".$searchstr."%') or lower(xitemcode) like lower('%".$searchstr."%') and bizid=".$bizid." LIMIT 10"));
	}
	function getitemallautolist($searchstr, $bizid){
		echo json_encode($this->db->select("seitem", array("xitemcode as 'Item Code',xdesc as 'Description',xstdprice as 'Sales Price',xcat as 'Ctegory'"), " lower(xdesc) like lower('%".$searchstr."%') or lower(xitemcode) like lower('%".$searchstr."%') and bizid=".$bizid.""));
	}
	function getitemlist($bizid){
		echo json_encode($this->db->select("seitem", array(), " bizid=".$bizid." order by xitemsl desc"));
	}
	function getecomitemlist($cat){
		//,CONCAT(
    //'[{\"small\": \"/assets/images/product_image/product_',xitemcode,'_1.png\",','\"medium\": \"/assets/images/product_image/product_',xitemcode,'_1_thumb.png\",','\"big\": \"/assets/images/product_image/product_',xitemcode,'_1.png\"}]'
      //       ) as image	  
	  
		$itemlist = $this->db->select("seitem", array("xitemcode as id,xdesc as name,xmrp as oldPrice,xstdprice as newPrice,xpoint as discount,ratingscount as ratingsCount,
ratingsvalue as ratingsValue,xlongdesc as description,24 as availibilityCount, cartCount as cartCount,xweight as weight,xcatid as categoryId"), " xcat='".$cat."' and xpoint>0");
	$lst=array();
	foreach($itemlist as $key=>$list){
		$list['images']=array();
		$arr = array("small"=>"https://eannex.com/product_image/product_".$list['id']."_1_thumb.png",
						"medium"=>"https://eannex.com/product_image/product_".$list['id']."_1.png",
						"big"=>"https://eannex.com/product_image/product_".$list['id']."_1.png");
						array_push($list['images'],$arr);
		$list['color']=array();
		$list['size']=array();
	array_push($lst,$list);
	}
	//print_r($itemlist); die;
		echo json_encode($lst, JSON_UNESCAPED_UNICODE);
	}
	
	function getecomitemlistbysearch($cat, $desc){
		//,CONCAT(
    //'[{\"small\": \"/assets/images/product_image/product_',xitemcode,'_1.png\",','\"medium\": \"/assets/images/product_image/product_',xitemcode,'_1_thumb.png\",','\"big\": \"/assets/images/product_image/product_',xitemcode,'_1.png\"}]'
      //       ) as image	  
	  
		$itemlist = $this->db->select("seitem", array("xitemcode as id,xdesc as name,xmrp as oldPrice,xstdprice as newPrice,xpoint as discount,ratingscount as ratingsCount,
ratingsvalue as ratingsValue,xlongdesc as description,24 as availibilityCount, cartCount as cartCount,xweight as weight,xcatid as categoryId"), " xcat='".$cat."' and lower(xdesc) like lower('%".$desc."%') and xpoint>0");
	$lst=array();
	foreach($itemlist as $key=>$list){
		$list['images']=array();
		$arr = array("small"=>"https://eannex.com/product_image/product_".$list['id']."_1_thumb.png",
						"medium"=>"https://eannex.com/product_image/product_".$list['id']."_1.png",
						"big"=>"https://eannex.com/product_image/product_".$list['id']."_1.png");
						array_push($list['images'],$arr);
		$list['color']=array();
		$list['size']=array();
	array_push($lst,$list);
	}
	//print_r($itemlist); die;
		echo json_encode($lst, JSON_UNESCAPED_UNICODE);
	}
	
	function getecomitemlistbyall($desc){
		//,CONCAT(
    //'[{\"small\": \"/assets/images/product_image/product_',xitemcode,'_1.png\",','\"medium\": \"/assets/images/product_image/product_',xitemcode,'_1_thumb.png\",','\"big\": \"/assets/images/product_image/product_',xitemcode,'_1.png\"}]'
      //       ) as image	  
	  
		$itemlist = $this->db->select("seitem", array("xitemcode as id,xdesc as name,xmrp as oldPrice,xstdprice as newPrice,xpoint as discount,ratingscount as ratingsCount,
ratingsvalue as ratingsValue,xlongdesc as description,24 as availibilityCount, cartCount as cartCount,xweight as weight,xcatid as categoryId"), " lower(xdesc) like lower('%".$desc."%') and xpoint>0");
	$lst=array();
	foreach($itemlist as $key=>$list){
		$list['images']=array();
		$arr = array("small"=>"https://eannex.com/product_image/product_".$list['id']."_1_thumb.png",
						"medium"=>"https://eannex.com/product_image/product_".$list['id']."_1.png",
						"big"=>"https://eannex.com/product_image/product_".$list['id']."_1.png");
						array_push($list['images'],$arr);
		$list['color']=array();
		$list['size']=array();
	array_push($lst,$list);
	}
	//print_r($itemlist); die;
		echo json_encode($lst, JSON_UNESCAPED_UNICODE);
	}
	
	function getecombyitem($item){
		//,CONCAT(
    //'[{\"small\": \"/assets/images/product_image/product_',xitemcode,'_1.png\",','\"medium\": \"/assets/images/product_image/product_',xitemcode,'_1_thumb.png\",','\"big\": \"/assets/images/product_image/product_',xitemcode,'_1.png\"}]'
      //       ) as image	  
	  
		$itemlist = $this->db->select("seitem", array("xitemcode as id,xdesc as name,xmrp as oldPrice,xstdprice as newPrice,xpoint as discount,ratingscount as ratingsCount,
ratingsvalue as ratingsValue,xlongdesc as description,24 as availibilityCount, cartCount as cartCount,xweight as weight,xcatid as categoryId"), " xitemcode='".$item."'");
	$lst=array();
	foreach($itemlist as $key=>$list){
		$list['images']=array();
		$arr = array("small"=>"https://eannex.com/product_image/product_".$list['id']."_1_thumb.png",
						"medium"=>"https://eannex.com/product_image/product_".$list['id']."_1.png",
						"big"=>"https://eannex.com/product_image/product_".$list['id']."_1.png");
						array_push($list['images'],$arr);
		$list['color']=array();
		$list['size']=array();
	array_push($lst,$list);
	}
	//print_r($itemlist); die;
		echo json_encode($lst, JSON_UNESCAPED_UNICODE);
	}
	
	function getecomitembytype($type){
		//,CONCAT(
    //'[{\"small\": \"/assets/images/product_image/product_',xitemcode,'_1.png\",','\"medium\": \"/assets/images/product_image/product_',xitemcode,'_1_thumb.png\",','\"big\": \"/assets/images/product_image/product_',xitemcode,'_1.png\"}]'
      //       ) as image	  
	  
		$itemlist = $this->db->select("seitem", array("xitemcode as id,xdesc as name,xmrp as oldPrice,xstdprice as newPrice,xpoint as discount,ratingscount as ratingsCount,
ratingsvalue as ratingsValue,xlongdesc as description,24 as availibilityCount, cartCount as cartCount,xweight as weight,xcatid as categoryId"), " xcitem='".$type."' and xpoint>0");
	$lst=array();
	foreach($itemlist as $key=>$list){
		$list['images']=array();
		$arr = array("small"=>"https://eannex.com/product_image/product_".$list['id']."_1_thumb.png",
						"medium"=>"https://eannex.com/product_image/product_".$list['id']."_1.png",
						"big"=>"https://eannex.com/product_image/product_".$list['id']."_1.png");
						array_push($list['images'],$arr);
		$list['color']=array();
		$list['size']=array();
	array_push($lst,$list);
	}
	//print_r($itemlist); die;
		echo json_encode($lst, JSON_UNESCAPED_UNICODE);
	}
}
