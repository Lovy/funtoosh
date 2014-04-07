<?php
//date_default_timezone_set('Asia/Kolkata');
//error_reporting(E_ALL);
ini_set('display_errors', 1);
class modeltag extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->db->query("SET time_zone='+5:30'");
	}
	
	function loadData($userId,$huggasPerPage,$pageNo,$tagName){
			$this->load->model('modeltag');
			$tagId = $this->modeltag->getTagId($tagName);
			$sql1 = "select * from hugga where huggaId IN (select huggaId from hugga_tags where tagId=?) order by huggaId desc LIMIT ?,?";
			$huggasPerPage = intval($huggasPerPage);
			$query = $this->db->query($sql1,array($tagId,($huggasPerPage*($pageNo-1)),($huggasPerPage)));
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
	
	function loadTopTags(){
		$sql = "SELECT count(huggaId) as a, tagId from hugga_tags group by tagId order by a desc LIMIT 0,15";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			//create an array to store huggas
				$topTags = array();
				//Loop through each row returned from the query
				foreach ($query->result_array() as $row) {
    				//Retrieve images for each space
    				$sql2 ="select tagName from tags where tagId=?";
    				$query2 =$this->db->query($sql2,array($row['tagId']));
					$row2=$query2->result_array();
					$topTags[]=$row2[0]['tagName'];
				
				}
				return $topTags;
		}
	}
	
	
	//Database tables:
	// 1)tags : tagId,tagName,userId,timestamp
	// 2)hugga_tags : Id,huggaId,tagId,timestamp
	//check if the tag already exists in the database or not
	//Return 1 if exist
	//Return 0 is not
	function tagExist($tagName){
		
		$sql = "select * from tags where tagName=?";
		$query= $this->db->query($sql,array($tagName));
		if($query->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
		
	}
	
	function getTagId($tagName){
		$sql="select tagId from tags where tagName=?";
		$query = $this->db->query($sql,array($tagName));
		if($query->num_rows()>0){
			$result = $query->result_array();
			return $result[0]['tagId'];
		}
		
	}
	
	function tagMappingExist($tagId,$huggaId){	
		$sql = "select * from hugga_tags where huggaId=? and tagId=?";
		$query = $this->db->query($sql,array($huggaId,$tagId));
		if($query->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}

	//convert the tag name to all lower case
	function toLower($tagName){
		return trim(strtolower($tagName));
	}
	
	//add dashes replacing whitspace in the tagname
	function cleanTag($tagName){
		return trim(str_replace(" ", "", $tagName));
	}
	
	//insert tag mapping and return the mapped id
	function insertTagMap($tagId,$huggaId){
		$sql="insert into hugga_tags (huggaId,tagId) values (?,?)";
		$query = $this->db->query($sql,array($huggaId,$tagId));
		if($query){
			return $this->db->insert_id();
		}else{
			return 0;
		}
		
	}
	
	//delete Tag Mapping
	function deleteTagMap($tagId,$huggaId){
		$sql = "delete from hugga_tags where tagId=? and huggaId=?";
		$query = $this->db->query($sql,array($tagId,$huggaId));
		if($query){
			return 1;
		}else{
			return 0;
		}
	}
	
	//add Tag in tag table and return the tagId
	function addTag($tagName,$userId){
		$sql = "insert into tags (tagName,userId) values (?,?)";
		$query = $this->db->query($sql,array($tagName,$userId));
		if($query){
			return $this->db->insert_id();
		}else{
			return 0;
		}
		
	}
	
	//return 1 if success otherwise 0
	function deleteTag($tagName,$userId){
		$sql="delete from tags where tagName=? and userId=?";
		$query = $this->db->query($sql,array($tagName,$userId));
		if($query){
			return 1;
		}else{
			return 0;
		}
	}
	
	function huggaPerTag($tagName){
		$sql = "select * from hugga_tags where tagId IN (select tagId from tags where tagName=?)";
		$query = $this->db->query($sql,array($tagName));
		if($query){
			return $query->num_rows();
		}else{
			return 0;
		}	
	}
	
	function getTags($huggaId){
		$sql ="select tagName from tags where tagId IN (select tagId from hugga_tags where huggaId=?)";
		$query = $this->db->query($sql,array($huggaId));
		if($query->num_rows()>0){
			$result='';
			foreach ($query->result_array() as $row) {
				
				$result.=$row['tagName'];
				$result.=',';
			}
			return $result;
		}
	}
	
}

?>