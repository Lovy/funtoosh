<?php

class login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('utility');
	}
	
	function index(){
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		
		//checks if the user is logged in
		if($this->session->userdata('IsLoggedIn')){
			$url = base_url().'home';
			redirect($url);
		}
		else {
			$this->show_login();
		}
		
	}
	
	public function show_login($show_error=FALSE){
		$data['error']=$show_error;
		$this->load->view('home',NULL);
	}
	
	public function login_user(){
		$data = $this->input->post('temp');
		parse_str($data,$output);
		//var_dump($output);
		$email=$output['email'];
		$password=$output['password'];
		
		//XSS Clean the input data for security
		$email = $this->security->xss_clean($email);
		$password = $this->security->xss_clean($password);
		$this->load->model('user');
		$result = $this->user->validate_user($email,$password);
		//check if email and pass are not null and they exist in the db
		if(!empty($result)){
			$this->session->set_userdata($result);
			/*
			//Get last visited URL of the user
			$LastURL = $this->session->userdata('LastURL');
			
			//IF set send him there
			if(!empty($LastURL)){
				redirect($LastURL);
			}
			
			//Else send him to sweet home
			else{
				$url = base_url().'home';
        		redirect($url);	
			}
			 * */
			//$url = base_url().'home';
        	//redirect($url);	
			echo 1;
		}
		else {
			$array = array('result'=>'0');
			echo json_encode($array);
		}
	}

	public function checklogin(){
		if($this->session->userdata('IsLoggedIn')){
			$array= array("loginStatus"=>TRUE);
		}
		else {
			$array= array("loginStatus"=>FALSE);
		}
		
		echo json_encode($array);
	}
}

?>