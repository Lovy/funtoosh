<?php

class tags extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('utility');
		$this->load->library('session');
		$this->load->library('Mobile_Detect');
	}
	
	function index(){
		
	}

	function addTag($tagName,$userId,$huggaId){
		$this->load->model('modeltag');
		if($this->modeltag->tagExist($tagName)==1){
			//check if tag Mapping also exists or not
			if($this->modeltag->tagMappingExist($tagName,$huggaId)==1){
				//Do nothing
				return 0;
			}else{
				$tagId = $this->modeltag->getTagId($tagName);
				$this->modeltag->insertTagMap($tagId,$huggaId);
			}
		}else{
			//add tag first
			$this->modeltag->addTag($tagName,$userId);
			$tagId = $this->modeltag->getTagId($tagName);
			//add tag Mapping
			$this->modeltag->insertTagMap($tagId,$huggaId);
		}
	}

	function deleteTag($huggaId,$tagName,$userId){
		$this->load->model('modeltag');
		//if tag exists with this particular hugga only then delete tag from mapping as well as tag table
		// otherwise just delete the tag mapping for this huggaid
		$LoginFlag = $this->session->userdata('IsLoggedIn');
		if(!empty($LoginFlag)){
			$tagId = $this->modeltag->getTagId($tagName);
			if($this->modeltag->huggaPerTag($tagName)>0){
				//delete only tag mapping
				$this->modeltag->deleteTagMap($tagId,$huggaId);
			}else{
				//deleta tag
				$this->modeltag->deleteTag($tagName,$userId);
				//delete mapping
				$this->modeltag->deleteTagMap($tagId,$huggaId);
			}
		}
	}
	
	function getTags($huggaId){
		$this->load->model('modeltag');
		return $this->modeltag->getTags($huggaId);
	}
}

?>