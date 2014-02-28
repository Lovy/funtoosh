<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class fblogin extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
        $CI = & get_instance();
		$CI->config->load("facebook",TRUE);
		$config = $CI->config->item('facebook');
		$this->load->library('Facebook', $config);
    }
 
    function index(){
        // Try to get the user's id on Facebook
        $userId = $this->facebook->getUser();
 
        // If user is not yet authenticated, the id will be zero
        if($userId == 0){
            // Generate a login url
            $data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email'));
            $this->load->view('fbloginview', $data);
        } else {
            // Get user's data and print it
            $user = $this->facebook->api('/me');
            //echo json_encode($user);
            var_dump($user);
        }
    }
 
	}
 
?>