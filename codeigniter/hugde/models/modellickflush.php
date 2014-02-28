<?php

class modellickflush extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function getLickStatus($huggaId,$userId){
		$query = $this->db->get_where("userlick",array("userId"=>$userId,"huggaId"=>$huggaId));
		if($query->num_rows()==0){
				//insert new entry			
				return 0;
		}
		else{
				return 1;
		}
	}
	
	function getFlushStatus($huggaId,$userId){
		$query = $this->db->get_where("userflush",array("userId"=>$userId,"huggaId"=>$huggaId));
		if($query->num_rows()==0){
				//insert new entry			
				return 0;
		}
		else{
				return 1;
		}
	}
	
	function updateLickCount($huggaId,$lickValue){
		$sql = 'update hugga set licks = ? where huggaId = ?';
		$this->db->query($sql, array($lickValue, $huggaId));
	}
	
	function updateFlushCount($huggaId,$flushValue){
		$sql = 'update hugga set flushes = ? where huggaId = ?';
		$this->db->query($sql, array($flushValue, $huggaId));
	}
	
	function deleteLick($huggaId,$userId){
		$sql = 'delete from userlick where userId=? and huggaId=?';
		$this->db->query($sql, array($userId, $huggaId));
	}
	
	function deleteFlush($huggaId,$userId){
		$sql = 'delete from userflush where userId=? and huggaId=?';
		$this->db->query($sql, array($userId, $huggaId));
	}
	
	function insertLick($huggaId,$userId){
		$sql = "insert into userlick (huggaId,userId) values ('$huggaId','$userId')";
		$this->db->query($sql);
	}
	
	function insertFlush($huggaId,$userId){
		$sql = "insert into userflush (huggaId,userId) values ('$huggaId','$userId')";
		$this->db->query($sql);
	}
}

?>