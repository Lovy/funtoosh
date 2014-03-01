<?php

class logout extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('utility');
	}
	
	function index(){
		$this->session->sess_destroy();
		$url = 'http://hugde-env-symvyatdmf.elasticbeanstalk.com/home';
        redirect($url);
	}
}

?>