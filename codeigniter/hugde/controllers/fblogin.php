<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class fblogin extends CI_Controller {
 
    function __construct(){
       parent::__construct();
		$this->load->helper('utility');
		$this->load->library('session');
      
    }
 
    function facebook(){
      	$data = $this->input->post('response');
		var_dump($data);
	}
} 
?>