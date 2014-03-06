<?php

class lickflush extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('utility');
		$this->load->library('session');
	}
	
	
	//called from lickflush.js
	function checkLickStatus($huggaId,$userId){
		//get userId from the session
		$userIdServer = $this->session->userdata('userId');
		if($userId == $userIdServer){
			//load model
			$this->load->model('modellickflush');
			$status = $this->modellickflush->getLickStatus($huggaId,$userId);
			if($status==1){
				$returnArray = array ("response"=>1);
				echo json_encode($returnArray);
			}
			if($status==0){
				$returnArray = array ("response"=>0);
				echo json_encode($returnArray);
			}
		}
		else{
			echo 'UserId mismatch';
		}
	}
	
	function checkFlushStatus($huggaId,$userId){
		//get userId from the session
		$userIdServer = $this->session->userdata('userId');
		if($userId == $userIdServer){
			//load model
			$this->load->model('modellickflush');
			$status = $this->modellickflush->getFlushStatus($huggaId,$userId);
			if($status==1){
				$returnArray = array ("response"=>1);
				echo json_encode($returnArray);
			}
			if($status==0){
				$returnArray = array ("response"=>0);
				echo json_encode($returnArray);
			}
		}
		else{
			echo 'UserId mismatch';
		}
	}
	
	function updateLickCount($huggaId,$lickValue){
		//load model
		$this->load->model('modellickflush');
		$this->modellickflush->updateLickCount($huggaId,$lickValue);
	}
	
	function updateFlushCount($huggaId,$flushValue){
		//load model
		$this->load->model('modellickflush');
		$this->modellickflush->updateFlushCount($huggaId,$flushValue);
	}
	
	function deleteLick($huggaId,$userId){
		//get userId from the session
		$userIdServer = $this->session->userdata('userId');
		if($userId == $userIdServer){
			//load model
			$this->load->model('modellickflush');
			$status = $this->modellickflush->deleteLick($huggaId,$userId);
		}
		else{
			echo 'UserId mismatch';
		}
	}
	
	function deleteFlush($huggaId,$userId){
		//get userId from the session
		$userIdServer = $this->session->userdata('userId');
		if($userId == $userIdServer){
			//load model
			$this->load->model('modellickflush');
			$status = $this->modellickflush->deleteFlush($huggaId,$userId);
		}
		else{
			echo 'UserId mismatch';
		}
	}
	
	function insertLick($huggaId,$userId){
		//get userId from the session
		$userIdServer = $this->session->userdata('userId');
		if($userId == $userIdServer){
			//load model
			$this->load->model('modellickflush');
			$status = $this->modellickflush->insertLick($huggaId,$userId);
		}
		else{
			echo 'UserId mismatch';
		}
	}
	
	function insertFlush($huggaId,$userId){
		//get userId from the session
		$userIdServer = $this->session->userdata('userId');
		if($userId == $userIdServer){
			//load model
			$this->load->model('modellickflush');
			$status = $this->modellickflush->insertFlush($huggaId,$userId);
		}
		else{
			echo 'UserId mismatch';
		}
	}
	
	function updateHomeIndex($huggaId,$licks,$flushes){
		$this->load->model('modellickflush');
		return $this->modellickflush->calHomeIndex($huggaId,$licks,$flushes);
	}
}

?>