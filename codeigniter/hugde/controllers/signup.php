<?php
/**
 * Copyright 2014 Hugde Pvt Ltd.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */
class signup extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('utility');
		$this->load->library('session');
	}
	
	function index(){
		$signupData = $this->input->post(NULL,TRUE);
		//var_dump($signupData);
		$this->load->model('user');
		$result = $this->user->createUser($signupData);
		if(!empty($result)){
			$this->session->set_userdata($result);
			$url = base_url().'home';
        	redirect($url);	
		}
	}	
}

?>