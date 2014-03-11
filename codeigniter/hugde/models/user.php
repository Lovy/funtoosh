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
			$data = array("email"=>$row['email'],"userId"=>$row['userId'],"name"=>$row['name'],"FbProfilePhotoUrl"=>$row['facebookProfilePhotoUrl'],"IsLoggedIn"=>TRUE);
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
	
	function validatefbuser($FbId=NULL,$AccessToken=NULL){
		$this->db->select('*');
		$query = $this->db->get_where("users",array("facebookId"=>$FbId));
		//Check if any results are returned
		if($query->num_rows() >0){
			$row = $query->row_array();
			$data = array("email"=>$row['email'],"facebookId"=>$FbId,"userId"=>$row['userId'],"name"=>$row['name'],"FbProfilePhotoUrl"=>$row['facebookProfilePhotoUrl'],"IsLoggedIn"=>TRUE);
			return $data;
		}
		else{
			return FALSE; //this fb user does not exist in our database
		}
	}
	
	function createfbuser($data){
		if(!empty($data)){
				
			//Check if this user is already registered with us through hugde registration
			$query = $this->db->get_where("users",array("email"=>$data['email']));
			if($query->num_rows()>0){
				
				$result = $query->result_array();
				
				//User exists so just add fbid and profile photo url in the db
				$array = array("facebookId"=>$data['id'],"name"=>$data['name'],"facebookProfilePhotoUrl"=>$data['picture']['data']['url']);
				$this->db->where('email',$data['email']);
				$this->db->update('users',$array);
				
				$data = array("email"=>$data['email'],"facebookId"=>$data['id'],"userId"=>$result[0]['userId'],"name"=>$data['name'],"facebookProfilePhotoUrl"=>$data['picture']['data']['url'],"IsLoggedIn"=>TRUE);
				return $data;
			}
			else{
				$array = array("email"=>$data['email'],"facebookId"=>$data['id'],"name"=>$data['name'],"facebookProfilePhotoUrl"=>$data['picture']['data']['url']);
				$this->db->insert('user',$array);
				$id = $this->db->insert_id();
				$data = array("email"=>$data['email'],"facebookId"=>$data['id'],"userId"=>$id,"name"=>$data['name'],"facebookProfilePhotoUrl"=>$data['picture']['data']['url'],"IsLoggedIn"=>TRUE);
				return $data;
			}
			
		}
	}
}

?>