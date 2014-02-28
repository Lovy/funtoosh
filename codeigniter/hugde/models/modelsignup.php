<?php

class modelsignup extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function storeprevnode($nodename,$id,$other){
		$array = array("userid"=>$id,"previousnode"=>$nodename,"other"=>$other);
		$query = $this->db->get_where("prevnode",array("userid"=>$id));
		if($query->num_rows()==0){
				//insert new entry			
				$this->db->insert('prevnode',$array);
		}
		else{
				//update already existing entry
				$sql = "update prevnode set previousnode=?,other=? where userid = ?"; 
				$this->db->query($sql, array($nodename,$other,$id));
				//$this->db->where('userid',$id);
				//$array2 = array("previousnode"=>$nodename);
				//$this->db->update("prevnode",$array2);
		}
	}
	
}

?>