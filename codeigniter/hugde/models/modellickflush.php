<?php

class modellickflush extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->db->query("SET time_zone='+5:30'");
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
	
	function calHomeIndex($huggaId=NULL,$licks=0,$flushes=0){
		
		//////////////////////////////////QUERIES	////////////////////////////////////////
		$sql = "select timestamp from hugga where huggaId=?";
		$query = $this->db->query($sql,array($huggaId));
		$row = $query->result_array();
		//last update time
		$lastTime = strtotime($row[0]['timestamp']);
		
		//////////////////////////////////TIME CALCULATION//////////////////////////////////
		//get current time
		$currentTime = time();
		//time elapsed in days
		$elapsedTime = ($currentTime-$lastTime)/(1000*60*60*24);
		//TimeFactor
		$timeFactor;
		if ($elapsedTime<=5) {
			$timeFactor=1;
		}
		elseif ($elapsedTime>5 and $elapsedTime<=8) {
			$timeFactor=2;
		}
		elseif ($elapsedTime>8) {
			$timeFactor=3;
		}
		
		///////////////////////////////V CALCULATION/////////////////////////////////////
		//get tweets and likes
		$tweets;$likes;
		$v= $licks-$flushes;
		
		///////////////////////////////HOME INDEX CALCULATION///////////////////////////
		$homeIndex = floatval($v/$timeFactor);
		$array = array("lasttime"=>$lastTime,"curtime"=>$currentTime,"elaptime"=>$elapsedTime,"tf"=>$timeFactor,"v"=>$v);
		return $array;
	}
}

?>