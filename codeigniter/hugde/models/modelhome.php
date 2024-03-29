<?php

class modelhome extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->db->query("SET time_zone='+5:30'");
	}
	
	function huggaExist($huggaId){
		$sql="select huggaId from hugga where huggaId=?";
		$query = $this->db->query($sql,array($huggaId));
		if($query->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
		
	}
	function loadData($huggaId,$userId,$myhugga,$huggasPerPage,$pageNo,$category){
		if($huggaId=='0' && $myhugga=='HIDE' && $category=='ALL'){ //show all huggas HOME PAGE
			
			$sql1 = "select * from hugga order by homeIndex desc LIMIT ?,?";
			$huggasPerPage = intval($huggasPerPage);
			$query = $this->db->query($sql1,array(($huggasPerPage*($pageNo-1)),($huggasPerPage)));
			//$this->db->order_by('timestamp','desc');
			if($query->num_rows()>0){
				//create an array to store huggas
				$hugga = array();
				//Loop through each row returned from the query
    			foreach ($query->result_array() as $row) {
    				//Retrieve images for each space
    				$sql ="select * from images where imageId =?";
    				$query2 =$this->db->query($sql,array($row['imageId']));
					$images= array();
					foreach ($query2->result_array() as $row2) {
						$images[]=$row2;
					}
					$row['images']=$images;
					
					//check lick flush status for this hugga
					$lick = array();
					$flush = array();
					$flag=array();
					$this->load->model('modellickflush');
					$this->load->model('modeltag');
					$lickResponse = $this->modellickflush->getLickStatus($row['huggaId'],$userId);
					$flushResponse = $this->modellickflush->getFlushStatus($row['huggaId'],$userId);
					$flagResponse = $this->modellickflush->getFlagStatus($row['huggaId'],$userId);
					$lick['licked']=$lickResponse;
					$flush['flushed']=$flushResponse;
					$flag['flagged']=$flagResponse;
					$row['lick']=$lick;
					$row['flush']=$flush;
					$row['flag']=$flag;
					$hugga[]=$row;
				}
				return $hugga;
			}
		}
		if($huggaId=='0' && $myhugga=='SHOW'){ //MY HUGGA PAGE
			
			$sql1 = "select * from hugga where userId =? order by timestamp desc LIMIT ?,?";
			$huggasPerPage = intval($huggasPerPage);
			$query = $this->db->query($sql1,array($userId,($huggasPerPage*($pageNo-1)),($huggasPerPage)));
			//$this->db->order_by('timestamp','desc');
			if($query->num_rows()>0){
				//create an array to store huggas
				$hugga = array();
				//Loop through each row returned from the query
    			foreach ($query->result_array() as $row) {
    				//Retrieve images for each space
    				$sql ="select * from images where imageId IN (select imageId from hugga where huggaId=?)";
    				$query2 =$this->db->query($sql,array($row['huggaId']));
					$images= array();
					foreach ($query2->result_array() as $row2) {
						$images[]=$row2;
					}
					$row['images']=$images;
					
					//check lick flush status for this hugga
					$lick = array();
					$flush = array();
					$flag=array();
					$this->load->model('modellickflush');
					$lickResponse = $this->modellickflush->getLickStatus($row['huggaId'],$userId);
					$flushResponse = $this->modellickflush->getFlushStatus($row['huggaId'],$userId);
					$flagResponse = $this->modellickflush->getFlagStatus($row['huggaId'],$userId);
					$lick['licked']=$lickResponse;
					$flush['flushed']=$flushResponse;
					$flag['flagged']=$flagResponse;
					$row['lick']=$lick;
					$row['flush']=$flush;
					$row['flag']=$flag;
					$hugga[]=$row;
				}
				return $hugga;
			}
		}

		if($huggaId!='0' && $myhugga=='HIDE'){ //HUGGA PAGE
			
			$sql1 = "select * from hugga where huggaId =?";
			$huggasPerPage = intval($huggasPerPage);
			$query = $this->db->query($sql1,array($huggaId));
			//$this->db->order_by('timestamp','desc');
			if($query->num_rows()>0){
				//create an array to store huggas
				$hugga = array();
				//Loop through each row returned from the query
    			foreach ($query->result_array() as $row) {
    				//Retrieve images for each space
    				$sql ="select * from images where imageId IN (select imageId from hugga where huggaId=?)";
    				$query2 =$this->db->query($sql,array($row['huggaId']));
					$images= array();
					foreach ($query2->result_array() as $row2) {
						$images[]=$row2;
					}
					$row['images']=$images;
					
					//check lick flush status for this hugga
					$lick = array();
					$flush = array();
					$flag=array();
					$this->load->model('modellickflush');
					$lickResponse = $this->modellickflush->getLickStatus($row['huggaId'],$userId);
					$flushResponse = $this->modellickflush->getFlushStatus($row['huggaId'],$userId);
					$flagResponse = $this->modellickflush->getFlagStatus($row['huggaId'],$userId);
					$lick['licked']=$lickResponse;
					$flush['flushed']=$flushResponse;
					$flag['flagged']=$flagResponse;
					$row['lick']=$lick;
					$row['flush']=$flush;
					$row['flag']=$flag;
					$hugga[]=$row;
				}
				return $hugga;
			}
		}

		if($huggaId=='0' && $myhugga=='HIDE' && $category!='ALL'){ //DESI FIRANGI AND SEASONAL
			
			$sql1 = "select * from hugga where category=? order by huggaId desc LIMIT ?,?";
			$huggasPerPage = intval($huggasPerPage);
			$query = $this->db->query($sql1,array($category,($huggasPerPage*($pageNo-1)),($huggasPerPage)));
			//$this->db->order_by('timestamp','desc');
			if($query->num_rows()>0){
				//create an array to store huggas
				$hugga = array();
				//Loop through each row returned from the query
    			foreach ($query->result_array() as $row) {
    				//Retrieve images for each space
    				$sql ="select * from images where imageId =?";
    				$query2 =$this->db->query($sql,array($row['imageId']));
					$images= array();
					foreach ($query2->result_array() as $row2) {
						$images[]=$row2;
					}
					$row['images']=$images;
					
					//check lick flush status for this hugga
					$lick = array();
					$flush = array();
					$flag=array();
					$this->load->model('modellickflush');
					$lickResponse = $this->modellickflush->getLickStatus($row['huggaId'],$userId);
					$flushResponse = $this->modellickflush->getFlushStatus($row['huggaId'],$userId);
					$flagResponse = $this->modellickflush->getFlagStatus($row['huggaId'],$userId);
					$lick['licked']=$lickResponse;
					$flush['flushed']=$flushResponse;
					$flag['flagged']=$flagResponse;
					$row['lick']=$lick;
					$row['flush']=$flush;
					$row['flag']=$flag;
					$hugga[]=$row;
				}
				return $hugga;
			}
		}

		if($huggaId=='0' && $myhugga=='HIDE' && $category=='JustOut'){ //JUST OUT
			
			$sql1 = "select * from hugga order by huggaId desc LIMIT ?,?";
			$huggasPerPage = intval($huggasPerPage);
			$query = $this->db->query($sql1,array(($huggasPerPage*($pageNo-1)),($huggasPerPage)));
			//$this->db->order_by('timestamp','desc');
			if($query->num_rows()>0){
				//create an array to store huggas
				$hugga = array();
				//Loop through each row returned from the query
    			foreach ($query->result_array() as $row) {
    				//Retrieve images for each space
    				$sql ="select * from images where imageId =?";
    				$query2 =$this->db->query($sql,array($row['imageId']));
					$images= array();
					foreach ($query2->result_array() as $row2) {
						$images[]=$row2;
					}
					$row['images']=$images;
					
					//check lick flush status for this hugga
					$lick = array();
					$flush = array();
					$flag=array();
					$tags=array();
					$this->load->model('modellickflush');
					$this->load->model('modeltag');
					$lickResponse = $this->modellickflush->getLickStatus($row['huggaId'],$userId);
					$flushResponse = $this->modellickflush->getFlushStatus($row['huggaId'],$userId);
					$flagResponse = $this->modellickflush->getFlagStatus($row['huggaId'],$userId);
					$tagResponse = $this->modeltag->getTags($row['huggaId']);
					$lick['licked']=$lickResponse;
					$flush['flushed']=$flushResponse;
					$flag['flagged']=$flagResponse;
					$tags['tagvalues']=$tagResponse;
					$row['lick']=$lick;
					$row['flush']=$flush;
					$row['flag']=$flag;
					$row['tags']=$tags;
					$hugga[]=$row;
				}
				return $hugga;
			}
		}			
	}

	function loadSideBar(){
		$sql = "select huggaId from hugga where category='Featured'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			//create an array to store huggas
				$sidebar = array();
				//Loop through each row returned from the query
				foreach ($query->result_array() as $row) {
    				//Retrieve images for each space
    				$sql2 ="select * from images where imageId IN (select imageId from hugga where huggaId=?)";
    				$query2 =$this->db->query($sql2,array($row['huggaId']));
					$images= array();
					foreach ($query2->result_array() as $row2) {
						$images[]=$row2;
					}
					$row['images']=$images;
					
					$sql3 = "select * from hugga where huggaId=?";
					$query3 =$this->db->query($sql3,array($row['huggaId']));
					//$hugga = array();
					//$hugga[]= $query3->result_array();
					$row['sidebar']=$query3->result_array();
					$row['commentsCount']=$this->commentsCount($row['huggaId']);
					//check lick flush status for this hugga
					/*
					$lick = array();
					$flush = array();
					$this->load->model('modellickflush');
					$lickResponse = $this->modellickflush->getLickStatus($row['huggaId'],$userId);
					$flushResponse = $this->modellickflush->getFlushStatus($row['huggaId'],$userId);
					$lick['licked']=$lickResponse;
					$flush['flushed']=$flushResponse;
					$row['lick']=$lick;
					$row['flush']=$flush;
					 * 
					 */
					$sidebar[]=$row;
				
				}
				return $sidebar;
		}
	}

	function totalHuggas(){
		$sql = "select count(huggaId) as count from hugga";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function incViews($huggaId){
		$sql = "select views from hugga where huggaId = ?";
		$query = $this->db->query($sql,array($huggaId));
		$result = $query->result_array();
		$viewOld = $result[0]['views'];
		$viewNew = intval($viewOld)+1;
		
		$sql2 = "update hugga set views=? where huggaId =? ";
		$query2 = $this->db->query($sql2,array($viewNew,$huggaId));
	}

	function deleteHugga($huggaId){
		//get image file name from db
		$sql="select name from images where imageId IN (select imageId from hugga where huggaId=?)";
		$query = $this->db->query($sql,array($huggaId));
		$row = $query->result_array();
		$name = $row[0]['name'];
		//curl
		// Get cURL resource
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => 'http://hugde.com/hugde_assets/plugins/jquery-file-upload/server/php/?file='.urlencode($name).'&_method=DELETE',
		    CURLOPT_USERAGENT => 'Hugde delete cURL Request'
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		//if(!curl_exec($curl)){
		    //die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
		//}
		echo json_encode($resp);
		// Close request to clear up some resources
		curl_close($curl);
		
		$sql2='delete from hugga where huggaId=?';
		$query2 = $this->db->query($sql2,array($huggaId));
		
	}
	
	function getNextHugga($huggaId,$userId){
		$sql = "select homeIndex from hugga where huggaId =?";
		$query = $this->db->query($sql,array($huggaId));
		$homeIndex = $query->first_row()->homeIndex;
		
		$sql2='select * from hugga where homeIndex<=? and huggaId!=? order by homeIndex desc LIMIT 0,1';
		$query2=$this->db->query($sql2,array($homeIndex,$huggaId));
		
		$hugga = array();
				//Loop through each row returned from the query
    			foreach ($query2->result_array() as $row) {
    				//Retrieve images for each space
    				$sql3 ="select * from images where imageId IN (select imageId from hugga where huggaId=?)";
    				$query3 =$this->db->query($sql3,array($row['huggaId']));
					$images= array();
					foreach ($query3->result_array() as $row2) {
						$images[]=$row2;
					}
					$row['images']=$images;
					
					//check lick flush status for this hugga
					$lick = array();
					$flush = array();
					$flag=array();
					$this->load->model('modellickflush');
					$lickResponse = $this->modellickflush->getLickStatus($row['huggaId'],$userId);
					$flushResponse = $this->modellickflush->getFlushStatus($row['huggaId'],$userId);
					$flagResponse = $this->modellickflush->getFlagStatus($row['huggaId'],$userId);
					$lick['licked']=$lickResponse;
					$flush['flushed']=$flushResponse;
					$flag['flagged']=$flagResponse;
					$row['lick']=$lick;
					$row['flush']=$flush;
					$row['flag']=$flag;
					$hugga[]=$row;
				}
				return $hugga;
	}

	function commentsCount($huggaId){
		// Get cURL resource
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => 'http://graph.facebook.com/?ids=http://hugde.com/hugga/'+$huggaId,
		    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		//var_dump($resp);
		return $resp;
	}
}

?>