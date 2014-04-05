<?php
date_default_timezone_set('Asia/Kolkata');
error_reporting(E_ALL);
ini_set('display_errors', 1);
class modeltag extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->db->query("SET time_zone='+5:30'");
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
		$result = $query->result_array();
		return $result[0]['tagId'];
	}
	
	function tagMappingExist($tagName,$huggaId){	
		$sql = "select * from hugga_tags where huggaId=? and tagId IN (select tagId from tags where tagName=?)";
		$query = $this->db->query($sql,array($huggaId,$tagName));
		if($query){
			return 1;
		}else{
			return 0;
		}
	}

	//convert the tag name to all lower case
	function toLower($tagName){
		return strtolower($tagName);
	}
	
	//add dashes replacing whitspace in the tagname
	function cleanTag($tagName){
		return trim(str_replace(" ", "-", $tagName));
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
	
}

?>