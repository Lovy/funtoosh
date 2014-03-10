<?php

class logout extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('utility');
		//Facebook related
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
        $CI = & get_instance();
		$CI->config->load("facebook",TRUE);
		$config = $CI->config->item('facebook');
		$this->load->library('Facebook', $config);
	}
	
	function index(){
		$this->facebook->destroySession();
		$this->session->sess_destroy();
		$url = base_url().'home';
        redirect($url);
	}
}

?>