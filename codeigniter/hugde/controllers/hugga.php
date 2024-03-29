<?php

class hugga extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('utility');
		$this->load->library('session');
		$this->load->library('Mobile_Detect');
	}
	
	function index($huggaId){
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$LoginFlag = $this->session->userdata('IsLoggedIn');
		$this->session->set_userdata(array("LastVisitedUrl"=>$_SERVER["REQUEST_URI"]));
		//Increase view for this huggaId
		$this->load->model('modelhome');
		$this->modelhome->incViews($huggaId);
		if(!empty($LoginFlag)){
			$data = $this->session->all_userdata();
			//var_dump($data);
			$this->load->model('modelhome');
			//loadData($huggaId=NULL,$userId=NULL,$myhugga=NULL,$huggasPerPage=NULL,$pageNo=NULL)
			$response['huggas'] = $this->modelhome->loadData($huggaId,$data['userId'],'HIDE',5,1,'ALL');   //(huggasPerPage,pageNo)
			$response['sidebar'] = $this->modelhome->loadSideBar();
			$response['data']=$data;
			//echo json_encode($response);
			
			//Detect mobile and load no-sidebar version
			$mobile = $this->mobile_detect->isMobile();
			if($mobile){
				$this->load->view('huggaPage',$response);
			}
			else{
				$this->load->view('huggaPage',$response);
			}
			
		}
		else{
			$this->load->model('modelhome');
			$response['huggas'] = $this->modelhome->loadData($huggaId,NULL,'HIDE',5,1,'ALL');
			$response['sidebar'] = $this->modelhome->loadSideBar();
			$response['data']=array("userId"=>"0");
			//var_dump($response);
			
			//Detect mobile and load no-sidebar version
			$mobile = $this->mobile_detect->isMobile();
			if($mobile){
				$this->load->view('huggaPage',$response);
			}
			else{
				$this->load->view('huggaPage',$response);
			}
			
		}
	}

	
}

?>