<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class photo extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->library('S3');
	}
	
	public function resize($w=NULL,$h=NULL,$src=NULL){
		if(!is_null($w) && !is_null($h) && !is_null($src)){
			//log_message('error','Inside resize function');
			//log_message('error',$src);
			$config['image_library'] = 'ImageMagick';
			$config['library_path'] = '/usr/bin';
			$config['source_image']	= $src;
			$config['width']	 = $w;
			$config['height']	 = $h;
			$config['maintain_ratio'] = TRUE;
			$config['master_dim'] = 'width';
			$this->load->library('image_lib', $config); 
			if ( ! $this->image_lib->resize())
			{
				log_message('error',$this->image_lib->display_errors());
			    echo $this->image_lib->display_errors();
			}
		}
		log_message('error','Outside if');
	}
	
	public function uploadimage($imgName){
		
		//$allowed = array('png', 'jpg', 'gif');
		//if(isset($_FILES['Filedata']) && $_FILES['Filedata']['error'] == 0){
			//$extension = pathinfo($_FILES['Filedata']['name'], PATHINFO_EXTENSION);
			//if(!in_array(strtolower($extension), $allowed)){
				//return FALSE;
			//} else {
				
			//Image upload to AWS
			
			$bucket="hugde";
			//if (!class_exists('S3'))require_once('S3.php');
			
			//AWS access info
			if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAI5YSRH55J3SSQY7A');
			if (!defined('awsSecretKey')) define('awsSecretKey', '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');
						
			//instantiate the class
			$s3 = new S3(awsAccessKey, awsSecretKey);
			
			//$s3->getBucket($bucket, S3::ACL_PUBLIC_READ);	
			//Rename image name. 
			//$actual_image_name = time().'_'.$_FILES['Filedata']['name'];
			
			
			//$tmp = $_FILES['Filedata']['tmp_name'];	
			//Image upload to localhost
			
			
			$destination_root = '/var/www/html/hugde/hugde_assets/upload/';
			$destination_final = $destination_root.$imgName.'.png';			
			//move_uploaded_file($_FILES["Filedata"]["tmp_name"],$destination_final);
			
			//Resize the image
			//$this->resize('570','425',$destination_final);
			
			
			if($s3->putObjectFile($destination_final, $bucket , $imgName, S3::ACL_PUBLIC_READ) )
			{
				$msg = "S3 Upload Successful.";	
				echo $msg;
				$s3file='http://'.$bucket.'.s3.amazonaws.com/'.$imgName;
				
				/*
				if(is_null($id)){
					$data = array("Url"=>$s3file,"Size"=>$_FILES["Filedata"]["size"],"SpaceId"=>0);
					$this->db->insert('spacephotos',$data);
				}
				else{
					$data = array("Url"=>$s3file,"Size"=>$_FILES["Filedata"]["size"],"SpaceId"=>$id);
					$this->db->insert('spacephotos',$data);
				}
				 * 
				 */
				 
				unlink($destination_final);
			}
			else {
			$msg = "S3 Upload Fail.";
			
			$msg += "Image size Max 1 MB";
			
			$msg += "Invalid file, please upload image file.";
			
			}			
	}
	
	public function deleteall($id=NULL){
		if(!is_null($id)){
			$this->db->select('Url');
			$query = $this->db->get_where('spacephotos',array("SpaceId"=>$id));
			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$UrlToDelete = str_replace("http://vg-v-photos.s3.amazonaws.com/","",$row['Url']);
					//Image upload to AWS
			
					$bucket="vg-v-photos";
					//if (!class_exists('S3'))require_once('S3.php');
					
					//AWS access info
					if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAISDNUYSJXK3ODTTA');
					if (!defined('awsSecretKey')) define('awsSecretKey', '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');
								
					//instantiate the class
					$s3 = new S3(awsAccessKey, awsSecretKey);
					
					$s3->getBucket($bucket, S3::ACL_PUBLIC_READ);	
					$s3->deleteObject($bucket,$UrlToDelete);	
				}		
			}
			$this->db->delete('spacephotos', array('SpaceId' => $id));
			return TRUE;
		}
		return FALSE;
	}
	
}

?>