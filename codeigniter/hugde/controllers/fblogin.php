<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class fblogin extends CI_Controller {
 
    function __construct(){
       parent::__construct();
		$this->load->helper('utility');
		$this->load->library('session');
      
    }
 
    function facebook(){
      	$UserFbData = $this->input->post('response');
		//$array = array("IsLoggedIn"=>TRUE);
		//$this->session->set_userdata($array);
		$FbUserId=$UserFbData['id'];
		$this->load->model('user');
		$UserFbDataInDb = $this->user->validatefbuser($FbUserId);
		if(!empty($UserFbDataInDb)){
			//Put the data in the session
			$this->session->set_userdata($UserFbDataInDb);
			//$url = base_url().'home';
			//redirect($url);					
		}
		else{
			//Create this fb user's data in the database
			$result = $this->user->createfbuser($UserFbData);
			if(!empty($result)){
				$this->session->set_userdata($result);
				//$url = base_url().'home';
				//redirect($url);						
			}
		}
	}
} 
?>