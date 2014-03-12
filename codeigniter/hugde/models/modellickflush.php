<?php
date_default_timezone_set('Asia/Kolkata');
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
		$elapsedTime = ($currentTime-$lastTime);
		
		///////////////////////////////V CALCULATION/////////////////////////////////////
		//get tweets and likes
		$tweets;$likes;
		$v= $licks-$flushes;
		
		///////////////////////////////HOME INDEX CALCULATION///////////////////////////
		$homeIndex = floatval($v*pow($lastTime,0.2));
		
		///////////////////////////UPDATE HOME INDEX/////////////////////////////////////
		$sql="update hugga set homeIndex=? where huggaId=?";
		$this->db->query($sql,array($homeIndex,$huggaId));
		$array = array("lasttime"=>$lastTime,"curtime"=>$currentTime,"elaptime"=>$elapsedTime,"hi"=>$homeIndex,"v"=>$v);
		return $array;
	}
	
	function calTrendingIndex($huggaId=NULL,$timeInterval=NULL){
		/*
		 * calculate last lick timestamp tlick
			calculate last flush timestamp tflush
			find the recent timestamp tcurrent=max(tlick,tflush)
			n=0;
			while(n<12)
				substract tcurrent by 1(in seconds) and store in tprevious
				calculate count(licks) where timestamp between tcurrent and tprevious
				calculate count(flushes) where timestamp between tcurrent and tprevious
				vn=licks-flushes
				n++
				tcurrent=tprevious
			
			for each v
				index+=vn/n
		 */
		 //echo $huggaId;
		 $sql1="select timestamp from userlick where huggaid=? order by timestamp asc";
		 $query1=$this->db->query($sql1,array($huggaId));
		 if($query1->num_rows()>0){
		 	$firstLickTimestamp = $query1->first_row()->timestamp;
		 	$lastLickTimestamp = $query1->last_row()->timestamp; 
		 }else{
		 	$sql5="select timestamp from hugga where huggaId=?";
			$query5= $this->db->query($sql5,array($huggaId));
			$firstLickTimestamp=$query5->first_row()->timestamp;
			$lastLickTimestamp=$firstLickTimestamp;
		 }
		 
		 //$lastLickTimestamp=$rowLast1[0]['timestamp'];
		 //$firstLickTimestamp=$rowFirst1[0]['timestamp'];
		 
		 $sql2="select timestamp from userflush where huggaid=? order by timestamp asc";
		 $query2=$this->db->query($sql2,array($huggaId));
		 if($query1->num_rows()>0){
		 	$firstFlushTimestamp = $query2->first_row()->timestamp;
		 	$lastFlushTimestamp = $query2->last_row()->timestamp;
		 }else{
		 	//exit;
		 	$lastFlushTimestamp=$firstFlushTimestamp=$lastLickTimestamp;
		 }
		  
		 //$lastFlushTimestamp=$rowLast2[0]['timestamp'];
		 //$firstFlushTimestamp=$rowFirst2[0]['timestamp'];
		 
		 $timeCurrent=$lastLickTimestamp>$lastFlushTimestamp ? $lastLickTimestamp : $lastFlushTimestamp;
		 $iterationCount = ($timeCurrent-($firstLickTimestamp<$firstFlushTimestamp ? $firstLickTimestamp : $firstFlushTimestamp))/($timeInterval*60*60);
		 $timeIntervalSec=$timeInterval*60*60;
		 
		 $v = array();
		 while($iterationCount>0){
		 	$timePrevious = $timeCurrent-$timeIntervalSec;
		 	$timePreviousDate = date('y-m-d H:m:s',$timePrevious);
			$timeCurrentDate = date('y-m-d H:m:s',$timeCurrent);
		 	$sql3="select count(id) as l from userlick where timestamp between ? and ? and huggaId=?";
			$query3=$this->db->query($sql3,array($timePreviousDate,$timeCurrentDate,$huggaId));
			$result3 = $query3->first_row('array');
			$licks = $result3['l'];
			
			$sql4="select count(id) as f from userflush where timestamp between ? and ? and huggaId=?";
			$query4=$this->db->query($sql4,array($timePreviousDate,$timeCurrentDate,$huggaId));
			$result4 = $query4->first_row('array');
			$flushes = $result4['f'];
			
			$v[]=$licks-$flushes;
			$iterationCount-1;
		 }
		 
		 $trendingIndex=0;
		 $i=1;
		 foreach ($v as $value){
		 	$trendingIndex+=$value/$i;
			 $i++;
		 }
		 
		 echo json_encode(array($trendingIndex,$v));
	}
}

?>