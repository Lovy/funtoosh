<?php

class login2 extends CI_Controller{
	
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
	
	function fblogin(){
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		
		if($this->session->userdata('IsLoggedIn')){
			$url = base_url().'home';
			redirect($url);
		}
		else{
			// Get user's facebook user id
        	$FbUserId = $this->facebook->getUser();
			if($FbUserId!=0){
				
				$this->load->model('user');
				$UserFbDataInDb = $this->user->validatefbuser($FbUserId);
				if(!empty($UserFbDataInDb)){
					//Put the data in the session
					$this->session->set_userdata($UserFbDataInDb);
					//Get last visited URL of the user
					//$LastURL = $this->session->userdata('LastURL');
						
					//IF set send him there
					//if(!empty($LastURL)){
						//redirect($LastURL);
					//}
					//Else send him to sweet home
					//else{
						$url = base_url().'home';
			        	redirect($url);	
					//}
				}
				else{
					// Get user's data from fb
            		$UserFbData = $this->facebook->api('/me');
            		
            		//Get user's profile pic
            		$ProfilePhotoData = $this->facebook->api('/me/?fields=picture');
					$ProfilePhoto = $ProfilePhotoData['picture']['data']['url'];
					
					//Add profile photo in the user's data
					$UserFbData['ProfilePicUrl']=$ProfilePhoto;
					 //Create this fb user's data in the database
					$result = $this->user->createfbuser($UserFbData);
					if(!empty($result)){
						$this->session->set_userdata($result);
						
						//Get last visited URL of the user
						$LastURL = $this->session->userdata('LastURL');
						
						//IF set send him there
						//if(!empty($LastURL)){
							//redirect($LastURL);
						//}
						//Else send him to sweet home
						//else{
							$url = base_url().'home';
			        		redirect($url);	
						//}
						
					}
				}
			}
			else{				
				//$data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email,user_photos'));
				//$this->load->view('hugga_home',$data);
			}
			
		}		
	}

	/*
	public function show_login($show_error=FALSE){
		$data['error']=$show_error;
		$data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email,user_photos'));
		//$this->load->view('login',$data);
		$this->load->view('xlogin',$data);
	}*/
	
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