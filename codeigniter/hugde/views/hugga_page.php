<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0
Version: 1.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Metronic | Pages - Blog Post</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <meta name="MobileOptimized" content="320">
   <!-- BEGIN GLOBAL MANDATORY STYLES -->          
   <link href="<?php echo assets_url(); ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BEGIN THEME STYLES --> 
   <link href="<?php echo assets_url(); ?>css/style-metronic.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>css/style.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>css/plugins.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>css/pages/blog.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="<?php echo assets_url(); ?>css/custom.css" rel="stylesheet" type="text/css"/>
   <!-- END THEME STYLES -->
   <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	
	<!------------------------------------------------------------------------------------Facebook plugin------------------------------------------------------------------------------->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=502392956524278";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
 <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
 
 <!--------------------------------------------------------------------------------------Twitter--------------------------------------------------------------------------------------------->
 <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
 <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
   
   
   <!-- BEGIN HEADER -->   
   <div class="header navbar navbar-inverse navbar-fixed-top">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="header-inner">
         <!-- BEGIN LOGO -->  
         <a class="navbar-brand" href="index.html">
         <img src="<?php echo assets_url(); ?>img/logo.png" alt="logo" class="img-responsive" />
         </a>
         <!-- END LOGO -->
         <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
         <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
         <img src="<?php echo assets_url(); ?>img/menu-toggler.png" alt="" />
         </a> 
         <!-- END RESPONSIVE MENU TOGGLER -->
         <!-- BEGIN TOP NAVIGATION MENU -->
         <ul class="nav navbar-nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- BEGIN INBOX DROPDOWN -->
            
            
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
               <img alt="" src="<?php echo assets_url(); ?>img/avatar1_small.jpg"/>
               <span class="username">Bob Nilson</span>
               <i class="icon-angle-down"></i>
               </a>
               <ul class="dropdown-menu">
                  <li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a>
                  </li>
                  <li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a>
                  </li>
                  <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox <span class="badge badge-danger">3</span></a>
                  </li>
                  <li><a href="#"><i class="icon-tasks"></i> My Tasks <span class="badge badge-success">7</span></a>
                  </li>
                  <li class="divider"></li>
                  <li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Full Screen</a>
                  </li>
                  <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a>
                  </li>
                  <li><a href="login.html"><i class="icon-key"></i> Log Out</a>
                  </li>
               </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
         </ul>
         <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <div class="clearfix"></div>
   <!-- BEGIN CONTAINER -->   
   <div class="page-container">
     
     
      <!-- BEGIN PAGE -->
      <div class="page-content">
         <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->               
         <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                     <h4 class="modal-title">Modal title</h4>
                  </div>
                  <div class="modal-body">
                     Widget settings form goes here
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn blue">Save changes</button>
                     <button type="button" class="btn default" data-dismiss="modal">Close</button>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
         <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                
         <!-- BEGIN PAGE CONTENT-->
         <div class="row">
            <div class="col-md-12 blog-page">  	
               <div class="row">
               	<div class="col-md-2">
               		
               	</div>
                  <div class="col-md-7 article-block">
                  	
                  	<div class="row">
                  		<div class="col-md-12">
                  			<div class="clearfix">
                  			<a href="#" class="btn green" >Lick <i class="icon-chevron-up"></i> <span class="badge badge-danger">425</span></a>
                  			<a href="#" class="btn red" >Flush <i class="icon-chevron-down"></i> <span class="badge badge-success">42894</span></a>
                  			
                            <a href="#" class="btn blue pull-right" >Next <i class=" icon-chevron-right"></i></a>
                  		
                  			</div>
                  			
                  		
                  		</div>
                  		
                  			
                       
                  		
                  	</div>
                  	 <h3><b>Hello here will be some recent news..</b></h3>
                     <div class="blog-tag-data">
                     	<img src="<?php echo assets_url(); ?>img/gallery/item_img.jpg" class="img-responsive" alt="" style="width:100%">
                        <div class="row">
                           <div class="col-md-1">
                           	
                           		<a href="https://twitter.com/share?count=horizontal" class="twitter-share-button" data-lang="en">Tweet</a>
                           		<!--<div class="pull-right" style="margin-top:-25px"><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></div>-->
                           
                           	</div>
                           	<div class="col-md-3">
                           	  	<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" style="width: 150px !important"></div>
                           		
                          	</div>
                          	
                          	<div class="col-md-3">
                          		Posted by: Jian Hong
                          	</div>
                          	<div class="col-md-3" style="font-size: 18px">
                          		Views 2,34,567
                          	</div>
                          	<div class="col-md-2">
                          		 <a href="#" class="btn btn-xs red" >Flag <i class=" icon-flag"></i></a>
                          	</div>
                        </div>
                     </div>
                     <!--end news-tag-data-->
                    
                     <hr>
                     <style>
                     	.fb_iframe_widget,
						.fb_iframe_widget span,
						.fb_iframe_widget iframe[style]  {width: 100% !important;}
                     </style>
                     <div class="fb-comments" data-href="http://example.com/comments" data-numposts="20" data-colorscheme="light"></div>
                     <!--
                     <div class="post-comment">
                        <h3>Leave a Comment</h3>
                        <form role="form" action="#">
                           <div class="form-group">
                              <input type="text" class="form-control">
                           </div>
                           
                           <button class="margin-top-20 btn blue" type="submit">Post a Comment</button>
                        </form>
                     </div>
                     <hr>
                     <div class="media">
                        <h3>Comments</h3>
                        <a href="#" class="pull-left">
                        <img alt="" src="<?php echo assets_url(); ?>img/blog/9.jpg" class="media-object">
                        </a>
                        <div class="media-body">
                           <h4 class="media-heading">Media heading <span>5 hours ago / <a href="#">Reply</a></span></h4>
                           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                           <hr>
                         
                           <div class="media">
                              <a href="#" class="pull-left">
                              <img alt="" src="<?php echo assets_url(); ?>img/blog/5.jpg" class="media-object">
                              </a>
                              <div class="media-body">
                                 <h4 class="media-heading">Media heading <span>17 hours ago / <a href="#">Reply</a></span></h4>
                                 <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                              </div>
                           </div>
                         
                           <hr>
                           <div class="media">
                              <a href="#" class="pull-left">
                              <img alt="" src="<?php echo assets_url(); ?>img/blog/7.jpg" class="media-object">
                              </a>
                              <div class="media-body">
                                 <h4 class="media-heading">Media heading <span>2 days ago / <a href="#">Reply</a></span></h4>
                                 <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                              </div>
                           </div>
                        
                        </div>
                     </div>
                
                     <div class="media">
                        <a href="#" class="pull-left">
                        <img alt="" src="<?php echo assets_url(); ?>img/blog/6.jpg" class="media-object">
                        </a>
                        <div class="media-body">
                           <h4 class="media-heading">Media heading <span>July 5,2013 / <a href="#">Reply</a></span></h4>
                           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                        </div>
                     </div>-->
                  
                     <hr>
                     
                  </div>
                  <!--end col-md-9-->
                  <div class="col-md-2 blog-sidebar" style="background-color: #ffd703">
                  	<div class="row">
                  		
                        <div class="col-md-12 blog-img blog-tag-data">
                        	<a href="#"><h4><b>22 hilarious pictures of wet cats</b></h4></a>
                           <img src="<?php echo assets_url();?>img/gallery/image3.jpg" alt="" class="img-responsive" >
                           <ul class="list-inline">
                              <li><i class="icon-chevron-up"></i> <a href="#">2013</a></li>
                              <li><i class="icon-chevron-down"></i> <a href="#">213</a></li>
                              <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
                           </ul>
                           
                        </div>
                        
                     </div>
                     <div class="space20"></div>
                     <div class="row">
                        <div class="col-md-12 blog-img blog-tag-data">
                        	<h4><b>All Is Not As It Seems With The Paint Covered Faces Below</b></h4>
                           <img src="<?php echo assets_url();?>img/gallery/image3.jpg" alt="" class="img-responsive">
                           <ul class="list-inline">
                              <li><i class="icon-chevron-up"></i> <a href="#">2013</a></li>
                              <li><i class="icon-chevron-down"></i> <a href="#">213</a></li>
                              <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
                           </ul>
                          
                        </div>
                        
                     </div>
                     <div class="space20"></div>
                     <div class="row">
                        <div class="col-md-12 blog-img blog-tag-data">
                        	<h4><b>All Is Not As It Seems With The Paint Covered Faces Below</b></h4>
                           <img src="<?php echo assets_url();?>img/gallery/image3.jpg" alt="" class="img-responsive">
                           <ul class="list-inline">
                              <li><i class="icon-chevron-up"></i> <a href="#">2013</a></li>
                              <li><i class="icon-chevron-down"></i> <a href="#">213</a></li>
                              <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
                           </ul>
                           
                        </div>
                        
                     </div>
                     <div class="space20"></div>
                     <div class="row">
                        <div class="col-md-12 blog-img blog-tag-data">
                        	<h4><b>All Is Not As It Seems With The Paint Covered Faces Below</b></h4>
                           <img src="<?php echo assets_url();?>img/gallery/image3.jpg" alt="" class="img-responsive">
                           <ul class="list-inline">
                              <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>
                              <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
                           </ul>
                           
                        </div>
                        
                     </div>
                     <div class="space20"></div>
                     <div class="row">
                        <div class="col-md-12 blog-img blog-tag-data">
                        	<h4><b>All Is Not As It Seems With The Paint Covered Faces Below</b></h4>
                           <img src="<?php echo assets_url();?>img/gallery/image3.jpg" alt="" class="img-responsive">
                           <ul class="list-inline">
                              <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>
                              <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
                           </ul>
                           
                        </div>
                        
                     </div>
                     <div class="space20"></div>
                     <div class="row">
                        <div class="col-md-12 blog-img blog-tag-data">
                        	<h4><b>All Is Not As It Seems With The Paint Covered Faces Below</b></h4>
                           <img src="<?php echo assets_url();?>img/gallery/image3.jpg" alt="" class="img-responsive">
                           <ul class="list-inline">
                              <li><i class="icon-calendar"></i> <a href="#">April 16, 2013</a></li>
                              <li><i class="icon-comments"></i> <a href="#">38 Comments</a></li>
                           </ul>
                           
                        </div>
                        
                     </div>
                     <div class="space20"></div>
                     
                     
                     
                    
                  </div>
                  <!--end col-md-3-->
               </div>
            </div>
         </div>
         <!-- END PAGE CONTENT-->
      </div>
      <!-- END PAGE -->    
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div class="footer">
      <div class="footer-inner">
         2013 &copy; Metronic by keenthemes.
      </div>
      <div class="footer-tools">
         <span class="go-top">
         <i class="icon-angle-up"></i>
         </span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
   <!-- BEGIN CORE PLUGINS -->   
   <!--[if lt IE 9]>
   <script src="<?php echo assets_url(); ?>plugins/respond.min.js"></script>
   <script src="<?php echo assets_url(); ?>plugins/excanvas.min.js"></script> 
   <![endif]-->   
   <script src="<?php echo assets_url(); ?>plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
   <script src="<?php echo assets_url(); ?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
   <script src="<?php echo assets_url(); ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="<?php echo assets_url(); ?>plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
   <script src="<?php echo assets_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="<?php echo assets_url(); ?>plugins/jquery.blockui.min.js" type="text/javascript"></script>  
   <script src="<?php echo assets_url(); ?>plugins/jquery.cookie.min.js" type="text/javascript"></script>
   <script src="<?php echo assets_url(); ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
   <!-- END CORE PLUGINS -->
   <script src="<?php echo assets_url(); ?>scripts/app.js"></script>      
   <script>
      jQuery(document).ready(function() {    
         App.init();
      });
   </script>
   <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>