<?php

class photo extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->library('S3');
		$this->load->library('session');
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
	
	public function uploadimage($inputFile,$imgName){
		
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
			
			
			$destination_root = '/var/app/current/hugde_assets/upload/';
			$destination_final = $destination_root.$imgName.'.png';			
			//move_uploaded_file($_FILES["Filedata"]["tmp_name"],$destination_final);
			
			//Resize the image
			//$this->resize('570','425',$destination_final);
			
			
			if($s3->putObjectFile($inputFile, $bucket , $imgName, S3::ACL_PUBLIC_READ) )
			{
				$msg = "S3 Upload Successful.";	
				echo $msg;
				$s3file='http://'.$bucket.'.s3.amazonaws.com/'.$imgName;
				
				$sql = 'INSERT INTO images (originalImageUrl,size,type,name)'.' VALUES (?,?,?,?)';
	            $query = $this->db->prepare($sql);
	            $query->bind_param(
	                'siss',
	                $s3file,
	                filesize($inputFile),
	                'png',
	                $imgName
	            );
	            $query->execute();
	            $imageId = $this->db->insert_id;
				$currentTime = date('Y-m-d H:m:s',time());
				$currentTime2 = time();
				$factor=1390820000;
				$v= 1;
				$homeIndex = floatval($v*($currentTime2-$factor));
				//$licks = intval('1');
				// Insert into hugga table
				$userId = $this->session->userdata('userId');
				$name=$this->session->userdata('name');
				$sql = 'INSERT INTO hugga (userId,homeIndex,imageId,postedBy,category,uploadTimeStamp)'.' VALUES (?,?,?,?,?,?)';
	            $query = $this->db->prepare($sql);
	            $query->bind_param(
	                'iiisss',
	                $userId,
	                $homeIndex,
	                $imageId,
	                $name,
	                'generatedmeme',
	                $currentTime
	            );
	            $query->execute();
	            $huggaId = $this->db->insert_id;
				
				//Insert into userlick table
				$sql2="insert into userlick (userId,huggaId) values (?,?)";
				$query2=$this->db->prepare($sql2);
				$query2->bind_param('ii',$userId,$huggaId);
				$query2->execute();  
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