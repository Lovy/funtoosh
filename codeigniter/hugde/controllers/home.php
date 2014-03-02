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
			$response['huggas'] = $this->modelhome->loadData(NULL,$data['userId'],'HIDE',5,1);   //(huggasPerPage,pageNo)
			$response['sidebar'] = $this->modelhome->loadSideBar();
			$response['data']=$data;
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
			$response['huggas'] = $this->modelhome->loadData(NULL,NULL,'HIDE',5,1);
			$response['sidebar'] = $this->modelhome->loadSideBar();
			$response['data']=array("userId"=>"0");
			//echo json_encode($response);
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
			$url = 'http://hugde-env-symvyatdmf.elasticbeanstalk.com/home/myhugge';
			redirect ($url);
		}
	}
	
	function autoload(){
		$huggasPerPage = $this->input->post('HPP');
		$pageNo = $this->input->post('PN');
		$LoginFlag = $this->session->userdata('IsLoggedIn');
		if(!empty($LoginFlag)){
			$data = $this->session->all_userdata();
			//var_dump($data);
			$this->load->model('modelhome');
			$response['huggas'] = $this->modelhome->loadData(NULL,$data['userId'],'HIDE',$huggasPerPage,$pageNo);   //(huggasPerPage,pageNo)
			$response['data']=$data;
			
			//return HTML code
			//echo json_encode($response);
			echo $this->jsonToHtml($response);
			
		}
		else{
			$this->load->model('modelhome');
			$response['huggas'] = $this->modelhome->loadData(NULL,NULL,'HIDE',$huggasPerPage,$pageNo);
			
			//return HTML code
			echo $this->jsonToHtml($response);
			
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
				
		$x.='	
		<div class="row">
                  		<div class="col-md-12">
                  			<div class="clearfix">                 				
                  			<!------------In case already licked by the user then the id - licked else unlicked. Similar for flush --------
                  			lick(userId,HuggaId)
                  			-->	
                  			<a href="javascript:void(0);" onclick="lick('.$item["userId"].','.$item["huggaId"].',this);" class="btn '.$y.' lick" id="licked">Lick <i class="icon-chevron-up"></i> <span class="badge badge-danger">'.$item['licks'].'</span></a>                			
                  			<a href="javascript:void(0);" onclick="flush('.$item['userId'].','.$item['huggaId'].',this);" class="btn '.$z.' flush" id="flushed">Flush <i class="icon-chevron-down"></i> <span class="badge badge-success">'.$item['flushes'].'</span></a>                           
                  			</div>		
                  		</div>	
                  	</div>
                  	 <a href="'.base_url().'hugga/'.$item['huggaId'].'"><h3><b>'.$item['title'].'</b></h3></a>
                     <div class="blog-tag-data">
                     	<a href="'.base_url().'hugga/'.$item['huggaId'].'"><img src="'. $item['images'][0]['originalImageUrl'].'" class="img-responsive" alt="" style="width:100%"></a>
                        <div class="row">
                           <div class="col-md-2">
                           	
                           		<a href="https://twitter.com/share?count=horizontal" class="twitter-share-button" data-lang="en">Tweet</a>
                           		<!--<div class="pull-right" style="margin-top:-25px"><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></div>-->
                           
                           	</div>
                           	<div class="col-md-4">
                           	  	<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" style="width: 150px !important"></div>
                           		
                          	</div>
                          	
                          	<div class="col-md-3">
                          		Posted by: '. $item['postedBy'].'
                          	</div>
                          	<div class="col-md-3" style="font-size: 18px">
                          		Views '.$item['views'].'
                          	</div>
                          	<div class="col-md-2">
                          		 <a href="#" class="btn btn-xs red" >Flag <i class=" icon-flag"></i></a>
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
			$response['huggas'] = $this->modelhome->loadData(NULL,$data['userId'],'SHOW',100,1);
			$response['sidebar'] = $this->modelhome->loadSideBar();
			$response['data']=$data;
			//Detect mobile and load no-sidebar version
			$mobile = $this->mobile_detect->isMobile();
			if($mobile){
				$this->load->view('hugga_home_myhuggas',$response);
			}
			else{
				//var_dump($response);
				$this->load->view('hugga_home_myhuggas',$response);
			}
		}
		else{
			echo "Not logged in";
		}
	}
	
	function next($huggaId){
		
		// seed with microseconds
		$this->load->model('modelhome');
		$totalHuggas = $this->modelhome->totalHuggas();
		//var_dump($totalHuggas);
		
		$totalHuggas =intval($totalHuggas[0]['count']);
		srand($this->make_seed());
		$nextId = rand(1,$totalHuggas);
		if($huggaId!=$nextId){
			if($this->modelhome->huggaExist($nextId)){
			$url = base_url().'hugga/'.$nextId;
			redirect($url);
			}
			else{
				$url = base_url().'home/next/'.$nextId;
				redirect($url);
			}
		}
	
	}
	
	function make_seed()
	{
	  list($usec, $sec) = explode(' ', microtime());
	  return (float) $sec + ((float) $usec * 100000);
	}
	
}

?>