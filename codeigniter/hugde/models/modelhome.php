<?php

class modelhome extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function loadData($huggaId=NULL,$userId=NULL,$myhugga=NULL,$huggasPerPage=NULL,$pageNo=NULL){
		if($huggaId==NULL && $myhugga=='HIDE'){ //show all huggas
			$sql1 = "select * from hugga order by timestamp desc LIMIT ?,?";
			$huggasPerPage = intval($huggasPerPage);
			$query = $this->db->query($sql1,array(($huggasPerPage*($pageNo-1)),($huggasPerPage)));
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
					$this->load->model('modellickflush');
					$lickResponse = $this->modellickflush->getLickStatus($row['huggaId'],$userId);
					$flushResponse = $this->modellickflush->getFlushStatus($row['huggaId'],$userId);
					$lick['licked']=$lickResponse;
					$flush['flushed']=$flushResponse;
					$row['lick']=$lick;
					$row['flush']=$flush;
					$hugga[]=$row;
				}
				return $hugga;
			}
		}
		if(!$huggaId && $myhugga=='SHOW'){
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
					$this->load->model('modellickflush');
					$lickResponse = $this->modellickflush->getLickStatus($row['huggaId'],$userId);
					$flushResponse = $this->modellickflush->getFlushStatus($row['huggaId'],$userId);
					$lick['licked']=$lickResponse;
					$flush['flushed']=$flushResponse;
					$row['lick']=$lick;
					$row['flush']=$flush;
					$hugga[]=$row;
				}
				return $hugga;
			}
		}

		if($huggaId!=NULL && $myhugga!=TRUE){
			
			$sql1 = "select * from hugga where huggaId =? order by timestamp desc LIMIT ?,?";
			$huggasPerPage = intval($huggasPerPage);
			$query = $this->db->query($sql1,array($huggaId,($huggasPerPage*($pageNo-1)),($huggasPerPage)));
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
					$this->load->model('modellickflush');
					$lickResponse = $this->modellickflush->getLickStatus($row['huggaId'],$userId);
					$flushResponse = $this->modellickflush->getFlushStatus($row['huggaId'],$userId);
					$lick['licked']=$lickResponse;
					$flush['flushed']=$flushResponse;
					$row['lick']=$lick;
					$row['flush']=$flush;
					$hugga[]=$row;
				}
				return $hugga;
			}
		}			
	}

	function loadSideBar(){
		$sql = "select huggaId from sidebar";
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
					$hugga = array();
					$hugga[]= $query3->result_array();
					$row['sidebar']=$hugga;
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
		$sql='delete from hugga where huggaId=?';
		$query = $this->db->query($sql,array($huggaId));
		
	}
}

?>