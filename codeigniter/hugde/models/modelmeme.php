<?php

class modelmeme extends CI_Model{
	
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
	
	function loadData($huggasPerPage,$pageNo){
					
			$sql1 = "select * from memecreate order by timestamp desc LIMIT ?,?";
			$huggasPerPage = intval($huggasPerPage);
			$query = $this->db->query($sql1,array(($huggasPerPage*($pageNo-1)),($huggasPerPage)));
			//$this->db->order_by('timestamp','desc');
			if($query->num_rows()>0){
				//create an array to store huggas
				$hugga = array();
				//Loop through each row returned from the query
    			foreach ($query->result_array() as $row) {
    				//Retrieve images for each space
    				$sql ="select * from images where imageId IN (select imageId from memecreate where memeId=?)";
    				$query2 =$this->db->query($sql,array($row['memeId']));
					$images= array();
					foreach ($query2->result_array() as $row2) {
						$images[]=$row2;
					}
					$row['images']=$images;
					
					//check lick flush status for this hugga
					/*
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
					*/
					$hugga[]=$row;
				}
				return $hugga;
			}
	}

	function totalMemes(){
		$sql = "select count(memeId) as count from memecreate";
		$query = $this->db->query($sql);
		return $query->result_array();
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
		    CURLOPT_URL => 'http://hugde-env-symvyatdmf.elasticbeanstalk.com/hugde_assets/plugins/jquery-file-upload/server/php/?file='.urlencode($name).'&_method=DELETE',
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
}

?>