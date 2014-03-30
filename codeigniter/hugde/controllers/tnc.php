<?php
ini_set('display_errors',1);
error_reporting(-1);
class tnc extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('utility');
		$this->load->library('session');
		$this->load->library('Mobile_Detect');
	}
	
	function index(){
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$LoginFlag = $this->session->userdata('IsLoggedIn');
		if(!empty($LoginFlag)){
			$data = $this->session->all_userdata();
			$response['data']=$data;
			$this->load->view('tnc',$response);
		}else{
			$response['data']=array("userId"=>"0");
			$this->load->view('tnc',$response);
		}
	}
}

?>