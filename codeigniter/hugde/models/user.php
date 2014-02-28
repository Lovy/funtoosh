<?php

class user extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function validate_user($email,$password){
		$query = $this->db->get_where("users",array("email"=>$email,"password"=>md5($password)));
		//Check if any results were returned
    	if ($query->num_rows() > 0) {
    		//Pass the data to our local function to create an object for us and return this new object
    		$row = $query->row_array();
			$data = array("email"=>$row['email'],"userId"=>$row['userId'],"name"=>$row['name'],"IsLoggedIn"=>TRUE);
			return $data;
    	}
		return FALSE;
	}
	
	function createUser($data){
		if(!empty($data)){
			$dob=date('Y-m-d',strtotime($data['dob']));
			$dob_x= date('m/d/Y',strtotime($data['dob']));
			$birthDate = explode("/", $dob_x);
		  	//get age from date or birthdate
		  	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
		    ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
			$array = array("email"=>$data['email'],"password"=>md5($data['password']),"name"=>$data['name'],"country"=>$data['country'],"dob"=>$dob,"age"=>$age);
			$this->db->insert('users',$array);
			$id = $this->db->insert_id();
			$returnarray = array("email"=>$data['email'],"name"=>$data['name'],"userId"=>$id,"IsLoggedIn"=>TRUE);
			return $returnarray;
		}
	}
}

?>