<?php

class home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('utility');
		$this->load->library('session');
		$this->load->library('Mobile_Detect');
	}
	
	function index(){
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$LoginFlag = $this->session->userdata('IsLoggedIn');
		if(!empty($LoginFlag)){
			$data = $this->session->all_userdata();
			//var_dump($data);
			$this->load->model('modelhome');
			$response['huggas'] = $this->modelhome->loadData('0',$data['userId'],'HIDE',4,1,'ALL');   //(huggasPerPage,pageNo)
			$response['sidebar'] = $this->modelhome->loadSideBar();
			$response['data']=$data;
			$response['category']='ALL';
			//echo json_encode($response);
			
			//Detect mobile and load no-sidebar version
			$mobile = $this->mobile_detect->isMobile();
			if($mobile){
				$this->load->view('hugga_home_mobile',$response);
			}
			else{
				$this->load->view('hugga_home',$response);
			}
			
		}
		else{
			$this->load->model('modelhome');
			$response['huggas'] = $this->modelhome->loadData('0',NULL,'HIDE',4,1,'ALL');
			$response['sidebar'] = $this->modelhome->loadSideBar();
			$response['data']=array("userId"=>"0");
			$response['category']='ALL';
			//echo json_encode($response['sidebar']);
			//var_dump($response);
			
			//Detect mobile and load no-sidebar version
			$mobile = $this->mobile_detect->isMobile();
			if($mobile){
				$this->load->view('hugga_home_mobile',$response);
			}
			else{
				$this->load->view('hugga_home',$response);
			}
			
		}
	}

	function delete($huggaId){
		$LoginFlag = $this->session->userdata('IsLoggedIn');
		if(!empty($LoginFlag)){
			$data = $this->session->all_userdata();
			//var_dump($data);
			$this->load->model('modelhome');
			$this->modelhome->deleteHugga($huggaId);   //(huggasPerPage,pageNo)
			$url = 'http://hugde.com/home/myhugge';
			redirect ($url);
		}
	}
	
	function autoload($category){
		$huggasPerPage = $this->input->post('HPP');
		$pageNo = $this->input->post('PN');
		$LoginFlag = $this->session->userdata('IsLoggedIn');
		if(!empty($LoginFlag)){
			$data = $this->session->all_userdata();
			//var_dump($data);
			$this->load->model('modelhome');
			$response['huggas'] = $this->modelhome->loadData('0',$data['userId'],'HIDE',$huggasPerPage,$pageNo,$category);   //(huggasPerPage,pageNo)
			$response['data']=$data;
			//var_dump($response['data']);
			//return HTML code
			//echo json_encode($response);
			if(!empty($response['huggas'])){
				echo $this->jsonToHtml($response);
			}
			
			
		}
		else{
			$this->load->model('modelhome');
			$response['data']=array("userId"=>"0");
			$response['huggas'] = $this->modelhome->loadData('0',NULL,'HIDE',$huggasPerPage,$pageNo,$category);
			
			//return HTML code
			if(!empty($response['huggas'])){
				echo $this->jsonToHtml($response);
			}
			
		}
	}
	
	function autoloadMyhugge($category){
		$huggasPerPage = $this->input->post('HPP');
		$pageNo = $this->input->post('PN');
		$LoginFlag = $this->session->userdata('IsLoggedIn');
		if(!empty($LoginFlag)){
			$data = $this->session->all_userdata();
			//var_dump($data);
			$this->load->model('modelhome');
			$response['huggas'] = $this->modelhome->loadData('0',$data['userId'],'SHOW',$huggasPerPage,$pageNo,$category);   //(huggasPerPage,pageNo)
			$response['data']=$data;
			//var_dump($response['data']);
			//return HTML code
			//echo json_encode($response);
			if(!empty($response['huggas'])){
				echo $this->jsonToHtml($response);
			}
			
			
		}
		else{
			$this->load->model('modelhome');
			$response['data']=array("userId"=>"0");
			$response['huggas'] = $this->modelhome->loadData('0',NULL,'SHOW',$huggasPerPage,$pageNo,$category);
			
			//return HTML code
			if(!empty($response['huggas'])){
				echo $this->jsonToHtml($response);
			}
			
		}
	}
	
	function jsonToHtml($data){
		$x='';
		foreach($data['huggas'] as $item){
			if($item['lick']['licked']==1)
			{$y='green';}
			else{$y='default';}
			
			if($item['flush']['flushed']==1)
			{$z='red';}
			else{$z='default';}
			
			if($item['flush']['flushed']==1) {$a='style="opacity: 0.3"';}else{$a='';}
			if($item['lick']['licked']==1) {$b='style="opacity: 0.3"';}else{$b='';}	
		$x.='	
		<div class="row">
                  		<div class="col-md-12">
                  			<div class="clearfix">                 				
                  			<!------------In case already licked by the user then the id - licked else unlicked. Similar for flush --------
                  			lick(userId,HuggaId)
                  			-->	
                  			<a href="javascript:void(0);" onclick="lick('.$data['data']['userId'].','.$item["huggaId"].',this);" '.$a.'  class="btn '.$y.' lick" id="licked">Lick <i class="icon-chevron-up"></i> <span class="badge badge-danger">'.$item['licks'].'</span></a>                			
                  			<a href="javascript:void(0);" onclick="flush('.$data['data']['userId'].','.$item['huggaId'].',this);" '.$b.' class="btn '.$z.' flush" id="flushed">Flush <i class="icon-chevron-down"></i> <span class="badge badge-success">'.$item['flushes'].'</span></a>                           
                  			</div>		
                  		</div>	
                  	</div>
                  	 <a href="'.base_url().'hugga/'.$item['huggaId'].'" target="_blank"><h3 style="font-weight: 600 !important">'.$item['title'].'</h3></a>
                     <div class="blog-tag-data">
                     	<a href="'.base_url().'hugga/'.$item['huggaId'].'" target="_blank"><img src="http://d2nds2wyuzde9r.cloudfront.net/hugde_assets/img/longLoader.gif" onload="this.src=\''. $item['images'][0]['originalImageUrl'].'\'" class="img-responsive" alt="" style="width:100%"></a>
                        <div class="row">
                           <!--<div class="col-md-2">
                           	
                           		<a href="https://twitter.com/share?count=horizontal" class="twitter-share-button" data-lang="en">Tweet</a>
                           		<div class="pull-right" style="margin-top:-25px"><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></div>
                           
                           	</div>
                           	<div class="col-md-4">
                           	  	<div class="fb-like" data-href="'.base_url().'hugga/'.$item['huggaId'].'" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" style="width: 150px !important"></div>
                           		
                          	</div>-->
                          	<div class="col-md-3">
                           	
							
                           		<!--<a href="https://twitter.com/share?count=horizontal" class="twitter-share-button" data-lang="en">Tweet</a>
                           		<!--<div class="pull-right" style="margin-top:-25px"><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></div>-->
                           	<a href="#" onclick="window.open(\'https://twitter.com/share?url=http%3A%2F%2Fhugde.com%2Fhugga%2F'.$item['huggaId'].'\',\'width=626,height=436\');return false;" data-original-title="twitter" class="social-icon social-icon-color twitter"></a>
                           	<a href="#" onclick="window.open(\'https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fhugde.com%2Fhugga%2F'.$item['huggaId'].'\',\'facebook-share-dialog\',\'width=626,height=436\');return false;" class="social-icon social-icon-color facebook"</a>
                           	
                          	<!--<div class="col-md-3">
                          		Posted by: '. $item['postedBy'].'
                          	</div>
                          	<div class="col-md-3" style="font-size: 18px">
                          		Views '.$item['views'].'
                          	</div>-->
                          	
                        </div>
                        <div class="row" style="margin-top: 5px">
                        	<div class="col-md-12">
                        		<div class="fb-like" data-href="'.base_url().'hugga/'.$item['huggaId'].'" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
                        	</div>
                        </div>
                     </div>
                     <!--end news-tag-data-->
                    
                    <hr>
';
}
	return $x;
	}
	
	function totalHuggas(){
		$this->load->model('modelhome');
		$result = $this->modelhome->totalHuggas();
		echo json_encode($result);
	}
	
	function myhugge(){
		
		$LoginFlag = $this->session->userdata('IsLoggedIn');
		if(!empty($LoginFlag)){
			$userId = $this->session->userdata('userId');
			$data = $this->session->all_userdata();
			$this->load->model('modelhome');
			//loadData($huggaId=NULL,$userId=NULL,$myhugga=NULL,$huggasPerPage=NULL,$pageNo=NULL)
			$response['huggas'] = $this->modelhome->loadData('0',$data['userId'],'SHOW',100,1,'ALL');
			$response['sidebar'] = $this->modelhome->loadSideBar();
			$response['data']=$data;
			//Detect mobile and load no-sidebar version
			$mobile = $this->mobile_detect->isMobile();
			if(is_null($response['huggas'])){
				$this->load->view('myHuggasEmptyPage',$response);
			}else{
				if($mobile){
				$this->load->view('myHuggas',$response);
				}
				else{
					//var_dump($response);
					//$this->load->view('hugga_home_myhuggas',$response);
					$this->load->view('myHuggas',$response);
				}
			}
			
		}
		else{
			echo "Not logged in";
		}
	}
	
	function createhugga(){
		
		$LoginFlag = $this->session->userdata('IsLoggedIn');
		if(!empty($LoginFlag)){
			$userId = $this->session->userdata('userId');
			$data = $this->session->all_userdata();
			$this->load->model('modelhome');
			//loadData($huggaId=NULL,$userId=NULL,$myhugga=NULL,$huggasPerPage=NULL,$pageNo=NULL)
			$response['huggas'] = $this->modelhome->loadData('0',$data['userId'],'SHOW',100,1,'ALL');
			$response['sidebar'] = $this->modelhome->loadSideBar();
			$response['data']=$data;
			//Detect mobile and load no-sidebar version
			$mobile = $this->mobile_detect->isMobile();
			if(is_null($response['huggas'])){
				$this->load->view('createHugga',$response);
			}else{
				if($mobile){
				$this->load->view('createHugga',$response);
				}
				else{
					//var_dump($response);
					//$this->load->view('hugga_home_myhuggas',$response);
					$this->load->view('createHugga',$response);
				}
			}
			
		}
		else{
			echo "Not logged in";
		}
	}
	
	function createhuggaview(){
		$imgData = $this->input->post('imgdata');
		$filteredData=substr($_POST['imgdata'], strpos($_POST['imgdata'], ",")+1);

		// Need to decode before saving since the data we received is already base64 encoded
		$decodedData=base64_decode($filteredData);
		$fn = substr(md5(time()), 0, 5);
		$fp = fopen( "/var/www/html/hugde_assets/upload/$fn.png", 'wb' );
		fwrite( $fp, $decodedData);
		fclose( $fp );
		
		//$fp2= fopen( "/var/www/html/hugde_assets/upload/$fn.png", 'r+' );
		$fp2="/var/www/html/hugde_assets/upload/".$fn.'.png';
		//echo filesize($fp2);
		$this->load->model('photo');
		$this->photo->uploadimage($fp2,$fn);
	}
	
	function next($huggaId,$userId){
		
		// seed with microseconds
		$this->load->model('modelhome');
		
		$result = $this->modelhome->getNextHugga($huggaId,$userId);
		echo json_encode($result);
	}
	
	function flag($huggaId){
		$userId = $this->session->userdata('userId');
		$response = $this->input->post('temp');
		parse_str($response,$output);
		$feedback=$output['feedback'];
		$this->load->model('modellickflush');
		$this->modellickflush->updateFlagCount($huggaId);
		$this->modellickflush->insertFlag($huggaId,$userId,$feedback);	
	}
}

?>