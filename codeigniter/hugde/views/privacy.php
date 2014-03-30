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
   <title>Hugde | Making sh*t awesome</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="Enjoy unlimited funny pictures all over the globe and get entertained. Don't be too lazy to laugh." name="description" />
   <meta content="" name="author" />
   <meta name="MobileOptimized" content="320">
   <!-- BEGIN GLOBAL MANDATORY STYLES -->          
   <link href="<?php echo assets_url(); ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BEGIN THEME STYLES --> 
   <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>plugins/select2/select2_metro.css" />
   <link href="<?php echo assets_url(); ?>css/style-metronic.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>css/style.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>css/plugins.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>css/pages/blog.css" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>plugins/bootstrap-datepicker/css/datepicker.css" />
   <link href="<?php echo assets_url(); ?>css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="<?php echo assets_url(); ?>css/custom.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo assets_url(); ?>plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link href="<?php echo assets_url(); ?>plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />
   <link href="<?php echo assets_url(); ?>css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<link href="<?php echo assets_url(); ?>plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo assets_url(); ?>css/pages/portfolio.css" rel="stylesheet" type="text/css"/>
   <!-- END THEME STYLES -->
   <link rel="shortcut icon" href="<?php echo assets_url(); ?>img/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<div id="fb-root"></div> 
 <!--------------------------------------------------------------------------------------Twitter--------------------------------------------------------------------------------------------->
 <!--<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
 <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
   
   
   <!-- BEGIN HEADER -->   
   <div class="header navbar navbar-inverse navbar-fixed-top" style="min-height: 60px">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="header-inner">
         <!-- BEGIN LOGO -->  
         <a class="navbar-brand" href="http://hugde.com/home">
         <img src="<?php echo assets_url(); ?>img/hugdew.jpg" alt="logo" class="img-responsive" style="margin-top: -13px;height: 59px;" />
         </a>
         <!-- END LOGO -->
         <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
         <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
         <img src="<?php echo assets_url(); ?>img/menu-toggler.png" alt="" />
         </a> 
         <!-- BEGIN HORIZANTAL MENU -->
			<div class="hor-menu hidden-sm hidden-xs" style="margin-left: -4px">
				<ul class="nav navbar-nav" style="padding: 9px">
					<li>
						<a href="<?php echo base_url(),'home'; ?>">
						Home
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'justout'; ?>">Just Out</a>
					</li>
					<li>
						<a href="<?php echo base_url(),'desi'; ?>">Desi</a>
					</li>
					<li>
						<a href="<?php echo base_url(),'firangi'; ?>">Firangi</a>
					</li>
					<li>
						<a href="<?php echo base_url(),'seasonal'; ?>">Seasonal</a>
					</li>
					<!--<li>
						<a href="<?php echo base_url(),'labs'; ?>">Labs</a>
					</li>-->
					<!--<li>
						<span class="hor-menu-search-form-toggler">&nbsp;</span>
						<div class="search-form">
							<form class="form-search">
								<div class="input-group">
									<input type="text" placeholder="Search..." class="form-control">
									<div class="input-group-btn">
										<button type="button" class="btn"></button>
									</div>
								</div>
							</form>
						</div>
					</li>-->
				</ul>
			</div>
			<!-- END HORIZANTAL MENU -->
			 
         <!-- END RESPONSIVE MENU TOGGLER -->
         <!-- BEGIN TOP NAVIGATION MENU -->
         <ul class="nav navbar-nav pull-right" style="margin-top: 14px">
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- BEGIN INBOX DROPDOWN -->
             
            
            <?php
                        	if(empty($data['IsLoggedIn'])){
            ?>
                        		
                        		<li class="dropdown" >
                        		 <button data-toggle="modal" href="#basic" type="button" class="btn green">Upload</button>
            	<!--<a data-toggle="modal" href="#basic" >Upload <i class="icon-upload"></i></a>-->
            </li>
                        		 <li class="dropdown" >
                        		 	<button  data-toggle="modal" href="#basic" type="button" class="btn blue">Login</button>
            	<!--<a data-toggle="modal" href="#basic" >Login <i class="icon-user"></i></a>-->
            </li>
            <li class="dropdown">
            	<button data-toggle="modal" href="#basic2" type="button" class="btn purple">Signup</button>
            	<!--<a data-toggle="modal" href="#basic2" >SignUp <i class="icon-signin"></i></a>-->
            </li>	
			<?php
			}				
            ?>
            
            
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <?php
               	if(!empty($data['IsLoggedIn'])){
            ?>
                        		<li class="dropdown" >
                        			<button data-toggle="modal" href="#full" type="button" class="btn green">Upload</button>
            	<!--<a data-toggle="modal" href="#full" >Upload <i class="icon-upload"></i></a>-->
            </li>
                        		<li class="dropdown user" style="margin-top: -5px">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
               <?php
               		if(!empty($data['FbProfilePhotoUrl'])){
               ?>	
               <img alt="" src="<?php echo $data['FbProfilePhotoUrl']; ?>" style="width:29px"/>
               <?php
					}
					else{
				?>
				<img alt="" src="http://d2nds2wyuzde9r.cloudfront.net/hugde_assets/img/poopicon.jpg" style="width:29px"/>
				<?php
					}
				?>
               <span class="username"><?php echo $data['name']; ?></span>
               <i class="icon-angle-down"></i>
               </a>
               <ul class="dropdown-menu">
                  <li><a href="http://hugde.com/home/myhugge"><i class="icon-user"></i> My Hugge</a>
                  </li>
                  
                  <li><a href="http://hugde.com/logout" onclick="javascript:logout();"><i class="icon-key"></i> Log Out</a>
                  </li>
               </ul>
            </li>                	
			<?php
				}			
            ?>
            
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
     <!-- BEGIN EMPTY PAGE SIDEBAR -->
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu visible-sm visible-xs">
				<li >
					<a href="<?php echo base_url(),'home'; ?>">
					Home
					</a>
				</li>
				<li>
						<a href="<?php echo base_url().'justout'; ?>">Just Out</a>
					</li>
					<li>
						<a href="<?php echo base_url(),'desi'; ?>">Desi</a>
					</li>
					<li>
						<a href="<?php echo base_url(),'firangi'; ?>">Firangi</a>
					</li>
					<li>
						<a href="<?php echo base_url(),'seasonal'; ?>">Seasonal</a>
					</li>
					<!--<li>
						<a href="<?php echo base_url(),'labs'; ?>">Labs</a>
					</li>-->
				
			</ul>
		</div>
		<!-- END EMPTY PAGE SIDEBAR --> 
     
      <!-- BEGIN PAGE -->
      <div class="page-content">           
         <!-- BEGIN PAGE CONTENT-->
         <div class="row">
         	<h3>Privacy</h3>
            <div class="col-md-12">
            	<h2>Introduction</h2>
             	<p>Your privacy is critically important to us. HUGDE, Inc. (“hugde”) takes pride in protecting private nature of your personal information very seriously and vows to protect it. This privacy policy, which we adapted from a policy initially provided by Automattic (WordPress.com), describes how we treat the information we collect when you visit and use our websites. Please read this notice very carefully.</p>
				<h2>Website Visitors</h2>
				<p>Like most website operators, HUGDE collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. HUGDE’s purpose in collecting non-personally identifying information is to better understand how HUGDE’s visitors use its website. From time to time, HUGDE may release non-personally-identifying information in the aggregate, e.g. by publishing a report on trends in the usage of its website.HUGDE also collects potentially personally-identifying information like Internet Protocol (IP) addresses. HUGDE does not use such information to identify its visitors, and does not disclose such information, other than under the same circumstances that it uses and discloses personally-identifying information, as described below.</p>
				<h2>Gathering of Personally-Identifying Information</h2>
				<p>Certain visitors to HUGDE’s websites choose to interact with HUGDE in ways that require HUGDE to gather personally-identifying information. The amount and type of information that HUGDE gathers depends on the nature of the interaction. For example, we ask visitors who sign up for HUGDE.com to provide a username and email address. In each case, HUGDE collects such information only insofar as is necessary or appropriate to fulfill the purpose of the visitor’s interaction with HUGDE. HUGDE does not disclose personally-identifying information other than as described below. And visitors can always refuse to supply personally-identifying information, with the caveat that it may prevent them from engaging in certain website-related activities.</p>
				<h2>Aggregated Statistics</h2>
				<p>HUGDE may collect statistics about the behavior of visitors to its websites. For instance, HUGDE may monitor the most popular collections on HUGDE.com. HUGDE may display this information publicly or provide it to others. However, HUGDE does not disclose personally-identifying information other than as described below.</p>
				<h2>Protection of Certain Personally-Identifying Information</h2>
				<p>HUGDE discloses potentially personally-identifying and personally-identifying information only to those of its employees, contractors and affiliated organizations that (i) need to know that information in order to process it on HUGDE’s behalf or to provide services available at HUGDE’s websites, and (ii) that have agreed not to disclose it to others. Some of those employees, contractors and affiliated organizations may be located outside of your home country; by using HUGDE’s websites, you consent to the transfer of such information to them. In addition, in some cases we may choose to buy or sell assets. In these types of transactions, user information is typically one of the business assets that is transferred. Moreover, if HUGDE or substantially all of its assets were acquired, or in the unlikely event that HUGDE goes out of business or enters bankruptcy, user information would be one of the assets that is transferred or acquired by a third party. You acknowledge that such transfers may occur, and that any acquirer of HUGDE may continue to use your personal and non-personal information only as set forth in this policy. Otherwise, HUGDE will not rent or sell potentially personally-identifying and personally-identifying information to anyone.</p>
				<p>Other than to its employees, contractors and affiliated organizations, as described above, HUGDE discloses potentially personally-identifying and personally-identifying information only when required to do so by law, or when HUGDE believes in good faith that disclosure is reasonably necessary to protect the property or rights of HUGDE, third parties or the public at large. If you are a registered user of a HUGDE website and have supplied your email address, HUGDE may occasionally send you an email to tell you about new features, solicit your feedback, or just keep you up to date with what’s going on with HUGDE and its products. If you send us a request (for example via a support email or via one of our feedback mechanisms), we reserve the right to publish it in order to help us clarify or respond to your request or to help us support other users. HUGDE takes all measures reasonably necessary to protect against the unauthorized access, use, alteration or destruction of potentially personally-identifying and personally-identifying information.</p><p>You should also be aware that if you submit information to “chat rooms,” “forums” or “message boards” such information becomes public information, meaning that you lose any privacy rights you might have with regards to that information. Such disclosures may also increase your chances of receiving unwanted communications.</p>
				<h2>What about Cookies</h2>
				<p>Cookies are alphanumeric identifiers that we transfer to your computer's hard drive through your Web browser to enable our systems to recognize your browser and to provide features offers, Recommended for You, personalized advertisements on other Web sites and affiliation.
				The Help menu on the menu bar of most browsers will tell you how to prevent your browser from accepting new cookies, how to have the browser notify you when you receive a new cookie and how to disable cookies altogether. Additionally, you can disable or delete similar data used by browser add-ons, such as Flash cookies, by changing the add-on's settings or visiting the website of its manufacturer. However, because cookies allow you to take advantage of some of Services€™s essential features, we recommend that you leave them turned on. For instance, if you block or otherwise reject our cookies, you will not be able to get some features, updates etc.
				If you do leave cookies turned on, be sure to sign off when you finish using a shared computer.
				</p>
				<h2>Ads Idea</h2>
				<p>Ads appearing on any HUGDE websites may be delivered to users by advertising partners, who may set cookies. These cookies allow the ad server to recognize your computer each time they send you an online advertisement to compile information about you or others who use your computer. This information allows ad networks to, among other things, deliver targeted advertisements that they believe will be of most interest to you. This privacy policy covers the use of cookies by HUGDE and does not cover the use of cookies by any advertisers.</p>
				<h2>Links to Intermediary Sites</h2>
				<p>This privacy policy only applies to information collected by HUGDE. This privacy policy does not apply to the practices of companies that HUGDE does not own or control, or employees that HUGDE does not manage. A HUGDE website may contain links to third party websites. Any information you provide to, or that is collected by, third-party sites may be subject to the privacy policies of those sites, if any. We encourage you to read such privacy policies of any third-party sites you visit. It is the sole responsibility of such third parties to adhere to any applicable restrictions on the disclosure of your personally-identifying information, and HUGDE and its affiliates shall not be liable for wrongful use or disclosure of your personally-identifying information by any third party.</p>
				<h2>Security</h2>
				<p>All non-personally-identifying information, potentially personally-identifying and personally identifying-information described above is stored on restricted database servers.</p>
				<h2>Choice/Opt-out</h2>
				<p>If we ever send you information by email concerning new products, services or information that you did not expressly request, we will provide you with an email address by which you may request no further notices.</p>
				<h2>Address Book Data</h2>
				<p>Any external address book data (email contacts, etc.) that a user voluntarily gives HUGDE access to will only be used for the described feature (looking up friends, etc.), and will not be stored or repurposed.</p>
				<h2>Privacy Policy Changes </h2>
				<p>Although most changes are likely to be minor, HUGDE may change its privacy policy from time to time, and in HUGDE’s sole discretion. HUGDE encourages visitors to frequently check this page for any changes to its privacy policy. Your continued use of this site after any change in this privacy policy will constitute your acceptance of such change.</p>
			</div>
		</div>
      </div>
      <!-- END PAGE -->    
   </div>
   <!-- END CONTAINER -->
   <!------------------------------------------------Delete Modal------------------------------------------------->
   	<div class="modal fade" id="delete" tabindex="-1" role="basic" aria-hidden="true">
    	<div class="modal-dialog">
        	<div class="modal-content">
            	<div class="modal-header">
                	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Delete</h4>
                </div>
                <div class="modal-body">
                     Are you sure want to delete?
                </div>
                <div class="modal-footer">
                	<button type="button" class="btn default" data-dismiss="modal">No</button>
                    <button type="button" class="btn blue">Yes</button>
                </div>
           	</div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
   <!------------------------------------------------Login Modal------------------------------------------------->
   					<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                 <h4 class="modal-title">Login</h4>
                              </div>
                              <div class="modal-body">
                          		<form role="form" class="login-form" action="<?php echo base_url().'login/login_user'; ?>" method="post">
                        			<div class="form-body"> 
			                           <div class="form-group">
			                              <label>Email Address</label>
			                              <div class="input-group">
			                                 <span class="input-group-addon"><i class="icon-envelope"></i></span>
			                                 <input type="text" class="form-control" placeholder="Email Address" name="email">
			                              </div>
			                           </div>
			                           <div class="form-group">
			                              <label for="exampleInputPassword1">Password</label>
			                              <div class="input-group">
			                                 <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
			                                 <span class="input-group-addon"><i class="icon-user"></i></span>
			                              </div>
			                           </div>
			                           <div class="form-group">
								         	<button type="button" class="btn default" data-dismiss="modal">Close</button>
								            <button id="loginBtn" type="button" class="btn blue">Submit</button>
								            <img id="spinner" style="display: none" src="<?php echo assets_url().'img/input-spinner.gif'; ?>" />
								       </div>
								       <div class="form-group" style="text-align: center">
								       		<a href="#" id="fblogin"><img src="<?php echo assets_url().'img/active_404.png'; ?>" /></a>
								       		<!--<fb:login-button scope="email,user_photos" show-faces="true" width="200" max-rows="1"></fb:login-button>-->
								       		<!--<div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="true" data-auto-logout-link="true"></div>-->
								       </div>
								       <div id="loginError" style="display: none" class="alert alert-danger">
                        					<strong>Error!</strong> Incorrect credentials
                     					</div>
                        			</div>
                     			</form>
                             </div>         
                          </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                     </div>
   <!-- /.modal -->
   <!------------------------------------------------Signup Modal------------------------------------------------->
      <div class="modal fade" id="basic2" tabindex="-1" role="basic" aria-hidden="true">
      	<div class="modal-dialog">
        	<div class="modal-content">
            	<div class="modal-header">
                	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Hugde</h4>
                </div>
            <div class="modal-body">
             <!-- BEGIN REGISTRATION FORM -->
      			<form id="signupForm" class="register-form" action="<?php echo base_url().'signup'; ?>" method="post">
         		<h3 >Sign Up</h3>
         		<p>Enter your personal details below:</p>
		         <div class="form-group">
		            <label class="control-label visible-ie8 visible-ie9">Full Name</label>
		            <div class="input-icon">
		               <i class="icon-font"></i>
		               <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="name"/>
		            </div>
		         </div>
		         <div class="form-group">
		            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
		            <label class="control-label visible-ie8 visible-ie9">Email</label>
		            <div class="input-icon">
		               <i class="icon-envelope"></i>
		               <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
		            </div>
		         </div>
         
		         <div class="form-group">
		            <label class="control-label visible-ie8 visible-ie9">Country</label>
		            <select name="country" id="select2_sample4" class="select2 form-control">
		               <option value=""></option>
		               <option value="AF">Afghanistan</option>
		               <option value="AL">Albania</option>
		               <option value="DZ">Algeria</option>
		               <option value="AS">American Samoa</option>
		               <option value="AD">Andorra</option>
		               <option value="AO">Angola</option>
		               <option value="AI">Anguilla</option>
		               <option value="AQ">Antarctica</option>
		               <option value="AR">Argentina</option>
		               <option value="AM">Armenia</option>
		               <option value="AW">Aruba</option>
		               <option value="AU">Australia</option>
		               <option value="AT">Austria</option>
		               <option value="AZ">Azerbaijan</option>
		               <option value="BS">Bahamas</option>
		               <option value="BH">Bahrain</option>
		               <option value="BD">Bangladesh</option>
		               <option value="BB">Barbados</option>
		               <option value="BY">Belarus</option>
		               <option value="BE">Belgium</option>
		               <option value="BZ">Belize</option>
		               <option value="BJ">Benin</option>
		               <option value="BM">Bermuda</option>
		               <option value="BT">Bhutan</option>
		               <option value="BO">Bolivia</option>
		               <option value="BA">Bosnia and Herzegowina</option>
		               <option value="BW">Botswana</option>
		               <option value="BV">Bouvet Island</option>
		               <option value="BR">Brazil</option>
		               <option value="IO">British Indian Ocean Territory</option>
		               <option value="BN">Brunei Darussalam</option>
		               <option value="BG">Bulgaria</option>
		               <option value="BF">Burkina Faso</option>
		               <option value="BI">Burundi</option>
		               <option value="KH">Cambodia</option>
		               <option value="CM">Cameroon</option>
		               <option value="CA">Canada</option>
		               <option value="CV">Cape Verde</option>
		               <option value="KY">Cayman Islands</option>
		               <option value="CF">Central African Republic</option>
		               <option value="TD">Chad</option>
		               <option value="CL">Chile</option>
		               <option value="CN">China</option>
		               <option value="CX">Christmas Island</option>
		               <option value="CC">Cocos (Keeling) Islands</option>
		               <option value="CO">Colombia</option>
		               <option value="KM">Comoros</option>
		               <option value="CG">Congo</option>
		               <option value="CD">Congo, the Democratic Republic of the</option>
		               <option value="CK">Cook Islands</option>
		               <option value="CR">Costa Rica</option>
		               <option value="CI">Cote d'Ivoire</option>
		               <option value="HR">Croatia (Hrvatska)</option>
		               <option value="CU">Cuba</option>
		               <option value="CY">Cyprus</option>
		               <option value="CZ">Czech Republic</option>
		               <option value="DK">Denmark</option>
		               <option value="DJ">Djibouti</option>
		               <option value="DM">Dominica</option>
		               <option value="DO">Dominican Republic</option>
		               <option value="EC">Ecuador</option>
		               <option value="EG">Egypt</option>
		               <option value="SV">El Salvador</option>
		               <option value="GQ">Equatorial Guinea</option>
		               <option value="ER">Eritrea</option>
		               <option value="EE">Estonia</option>
		               <option value="ET">Ethiopia</option>
		               <option value="FK">Falkland Islands (Malvinas)</option>
		               <option value="FO">Faroe Islands</option>
		               <option value="FJ">Fiji</option>
		               <option value="FI">Finland</option>
		               <option value="FR">France</option>
		               <option value="GF">French Guiana</option>
		               <option value="PF">French Polynesia</option>
		               <option value="TF">French Southern Territories</option>
		               <option value="GA">Gabon</option>
		               <option value="GM">Gambia</option>
		               <option value="GE">Georgia</option>
		               <option value="DE">Germany</option>
		               <option value="GH">Ghana</option>
		               <option value="GI">Gibraltar</option>
		               <option value="GR">Greece</option>
		               <option value="GL">Greenland</option>
		               <option value="GD">Grenada</option>
		               <option value="GP">Guadeloupe</option>
		               <option value="GU">Guam</option>
		               <option value="GT">Guatemala</option>
		               <option value="GN">Guinea</option>
		               <option value="GW">Guinea-Bissau</option>
		               <option value="GY">Guyana</option>
		               <option value="HT">Haiti</option>
		               <option value="HM">Heard and Mc Donald Islands</option>
		               <option value="VA">Holy See (Vatican City State)</option>
		               <option value="HN">Honduras</option>
		               <option value="HK">Hong Kong</option>
		               <option value="HU">Hungary</option>
		               <option value="IS">Iceland</option>
		               <option value="IN">India</option>
		               <option value="ID">Indonesia</option>
		               <option value="IR">Iran (Islamic Republic of)</option>
		               <option value="IQ">Iraq</option>
		               <option value="IE">Ireland</option>
		               <option value="IL">Israel</option>
		               <option value="IT">Italy</option>
		               <option value="JM">Jamaica</option>
		               <option value="JP">Japan</option>
		               <option value="JO">Jordan</option>
		               <option value="KZ">Kazakhstan</option>
		               <option value="KE">Kenya</option>
		               <option value="KI">Kiribati</option>
		               <option value="KP">Korea, Democratic People's Republic of</option>
		               <option value="KR">Korea, Republic of</option>
		               <option value="KW">Kuwait</option>
		               <option value="KG">Kyrgyzstan</option>
		               <option value="LA">Lao People's Democratic Republic</option>
		               <option value="LV">Latvia</option>
		               <option value="LB">Lebanon</option>
		               <option value="LS">Lesotho</option>
		               <option value="LR">Liberia</option>
		               <option value="LY">Libyan Arab Jamahiriya</option>
		               <option value="LI">Liechtenstein</option>
		               <option value="LT">Lithuania</option>
		               <option value="LU">Luxembourg</option>
		               <option value="MO">Macau</option>
		               <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
		               <option value="MG">Madagascar</option>
		               <option value="MW">Malawi</option>
		               <option value="MY">Malaysia</option>
		               <option value="MV">Maldives</option>
		               <option value="ML">Mali</option>
		               <option value="MT">Malta</option>
		               <option value="MH">Marshall Islands</option>
		               <option value="MQ">Martinique</option>
		               <option value="MR">Mauritania</option>
		               <option value="MU">Mauritius</option>
		               <option value="YT">Mayotte</option>
		               <option value="MX">Mexico</option>
		               <option value="FM">Micronesia, Federated States of</option>
		               <option value="MD">Moldova, Republic of</option>
		               <option value="MC">Monaco</option>
		               <option value="MN">Mongolia</option>
		               <option value="MS">Montserrat</option>
		               <option value="MA">Morocco</option>
		               <option value="MZ">Mozambique</option>
		               <option value="MM">Myanmar</option>
		               <option value="NA">Namibia</option>
		               <option value="NR">Nauru</option>
		               <option value="NP">Nepal</option>
		               <option value="NL">Netherlands</option>
		               <option value="AN">Netherlands Antilles</option>
		               <option value="NC">New Caledonia</option>
		               <option value="NZ">New Zealand</option>
		               <option value="NI">Nicaragua</option>
		               <option value="NE">Niger</option>
		               <option value="NG">Nigeria</option>
		               <option value="NU">Niue</option>
		               <option value="NF">Norfolk Island</option>
		               <option value="MP">Northern Mariana Islands</option>
		               <option value="NO">Norway</option>
		               <option value="OM">Oman</option>
		               <option value="PK">Pakistan</option>
		               <option value="PW">Palau</option>
		               <option value="PA">Panama</option>
		               <option value="PG">Papua New Guinea</option>
		               <option value="PY">Paraguay</option>
		               <option value="PE">Peru</option>
		               <option value="PH">Philippines</option>
		               <option value="PN">Pitcairn</option>
		               <option value="PL">Poland</option>
		               <option value="PT">Portugal</option>
		               <option value="PR">Puerto Rico</option>
		               <option value="QA">Qatar</option>
		               <option value="RE">Reunion</option>
		               <option value="RO">Romania</option>
		               <option value="RU">Russian Federation</option>
		               <option value="RW">Rwanda</option>
		               <option value="KN">Saint Kitts and Nevis</option>
		               <option value="LC">Saint LUCIA</option>
		               <option value="VC">Saint Vincent and the Grenadines</option>
		               <option value="WS">Samoa</option>
		               <option value="SM">San Marino</option>
		               <option value="ST">Sao Tome and Principe</option>
		               <option value="SA">Saudi Arabia</option>
		               <option value="SN">Senegal</option>
		               <option value="SC">Seychelles</option>
		               <option value="SL">Sierra Leone</option>
		               <option value="SG">Singapore</option>
		               <option value="SK">Slovakia (Slovak Republic)</option>
		               <option value="SI">Slovenia</option>
		               <option value="SB">Solomon Islands</option>
		               <option value="SO">Somalia</option>
		               <option value="ZA">South Africa</option>
		               <option value="GS">South Georgia and the South Sandwich Islands</option>
		               <option value="ES">Spain</option>
		               <option value="LK">Sri Lanka</option>
		               <option value="SH">St. Helena</option>
		               <option value="PM">St. Pierre and Miquelon</option>
		               <option value="SD">Sudan</option>
		               <option value="SR">Suriname</option>
		               <option value="SJ">Svalbard and Jan Mayen Islands</option>
		               <option value="SZ">Swaziland</option>
		               <option value="SE">Sweden</option>
		               <option value="CH">Switzerland</option>
		               <option value="SY">Syrian Arab Republic</option>
		               <option value="TW">Taiwan, Province of China</option>
		               <option value="TJ">Tajikistan</option>
		               <option value="TZ">Tanzania, United Republic of</option>
		               <option value="TH">Thailand</option>
		               <option value="TG">Togo</option>
		               <option value="TK">Tokelau</option>
		               <option value="TO">Tonga</option>
		               <option value="TT">Trinidad and Tobago</option>
		               <option value="TN">Tunisia</option>
		               <option value="TR">Turkey</option>
		               <option value="TM">Turkmenistan</option>
		               <option value="TC">Turks and Caicos Islands</option>
		               <option value="TV">Tuvalu</option>
		               <option value="UG">Uganda</option>
		               <option value="UA">Ukraine</option>
		               <option value="AE">United Arab Emirates</option>
		               <option value="GB">United Kingdom</option>
		               <option value="US">United States</option>
		               <option value="UM">United States Minor Outlying Islands</option>
		               <option value="UY">Uruguay</option>
		               <option value="UZ">Uzbekistan</option>
		               <option value="VU">Vanuatu</option>
		               <option value="VE">Venezuela</option>
		               <option value="VN">Viet Nam</option>
		               <option value="VG">Virgin Islands (British)</option>
		               <option value="VI">Virgin Islands (U.S.)</option>
		               <option value="WF">Wallis and Futuna Islands</option>
		               <option value="EH">Western Sahara</option>
		               <option value="YE">Yemen</option>
		               <option value="ZM">Zambia</option>
		               <option value="ZW">Zimbabwe</option>
		            </select>
		         </div>
         
		         <div class="form-group">
		         	<label class="control-label visible-ie8 visible-ie9">Date of birth</label>
		         	<div class="input-icon">
		         		<i class="icon-lock"></i>
		            	<input class="form-control date-picker" placeholder="Date of Birth"  size="16" type="text" value=""  name="dob"/>
		            </div>
		         </div>
		         
		         <p>Enter your password details below:</p>
		        
		         <div class="form-group">
		            <label class="control-label visible-ie8 visible-ie9">Password</label>
		            <div class="input-icon">
		               <i class="icon-lock"></i>
		               <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
		            </div>
		         </div>
		         <div class="form-group">
		            <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
		            <div class="controls">
		               <div class="input-icon">
		                  <i class="icon-ok"></i>
		                  <input id="register_password" class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"/>
		               </div>
		            </div>
		         </div>
		         <div class="form-group">
		            <label>
		            <input type="checkbox" name="tnc"/> I agree to the <a href="<?php echo base_url().'tnc'; ?>" target="_blank">Terms of Service</a> and <a href="<?php echo base_url().'privacy'; ?>" target="_blank">Privacy Policy</a>
		            </label>  
		            <div id="register_tnc_error"></div>
		         </div>
		         <div class="form-group">
		         	<button type="button" class="btn default" data-dismiss="modal">Close</button>
		            <button type="submit" class="btn blue">Submit</button>
		         </div>
      			</form>
      <!-- END REGISTRATION FORM -->
                              </div>
                              <!--<div class="modal-footer">
                                 <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                 <button id="formSubmit" type="button" class="btn blue">Submit</button>
                              </div>-->
                           </div>
                           <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                     </div>
  <!------------------------------------------------Upload Modal------------------------------------------------->                   
	<div class="modal fade" id="full" tabindex="-1" role="basic" aria-hidden="true">
    	<div class="modal-dialog modal-full">
        	<div class="modal-content">
            	<div class="modal-header">
                	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Upload your Hugga</h4>
                </div>
                <div class="modal-body">
                	<div class="row">
            		<div class="col-md-12">
            		<form id="fileupload" action="" method="POST" enctype="multipart/form-data">
            		<div class="form-group">
                    	<label for="exampleInputEmail1">Title</label>
                        <input id="maxlength_defaultconfig" maxlength="120" type="text" class="form-control" placeholder="Enter title here" name="title">
                        <?php
                        	if(!empty($data['IsLoggedIn'])){
                        		echo <<<HTML
                        		<input type="hidden" class="form-control" name="userId" id="userId" value="{$data['userId']}">
                        		<input type="hidden" class="form-control" name="username" id="name" value="{$data['name']}">             	
HTML;
							}
							
               ?>                                    
                        <span class="help-block">Limit: 180 characters</span>
                    </div>
               		<br>
               		<?php
						if(!empty($data['IsAdmin'])){
                           echo'<input type="hidden" name="category" value="hugdeoriginals">';
                        } 
                    ?> 
               		 
                    <!--<div class="form-group">
                              <label>Posting As</label>
                              <select name="anon" class="form-control input-medium">
                                 <option>Anonymous</option>
                                 <option>Use my name</option>
                              </select>
                    </div>-->
               		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                  	<div class="row fileupload-buttonbar">
                    	<div class="col-lg-7">
	                        <!-- The fileinput-button span is used to style the file input field as button -->
	                        <span class="btn green fileinput-button" id="addFiles">
	                        <i class="icon-plus"></i>
	                        <span>Add files...</span>
	                        <input type="file" name="files[]">
	                        </span>
	                        <button type="submit" class="btn blue start">
	                        <i class="icon-upload"></i>
	                        <span>Start upload</span>
	                        </button>
	                        <button type="reset" class="btn yellow cancel">
	                        <i class="icon-ban-circle"></i>
	                        <span>Cancel upload</span>
	                        </button>
	                        <button type="button" class="btn red delete">
	                        <i class="icon-trash"></i>
	                        <span>Delete</span>
	                        </button>
	                        <input type="checkbox" class="toggle">
	                        <!-- The loading indicator is shown during file processing -->
	                        <span class="fileupload-loading"></span>
                     	</div>
	                     <!-- The global progress information -->
	                     <div class="col-lg-5 fileupload-progress fade">
	                        <!-- The global progress bar -->
	                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
	                           <div class="progress-bar progress-bar-success" style="width:0%;"></div>
	                        </div>
	                        <!-- The extended global progress information -->
	                        <div class="progress-extended">&nbsp;</div>
	                     </div>
                  	</div>
	                  <!-- The table listing the files available for upload/download -->
	                  <table role="presentation" class="table table-striped clearfix">
	                     <tbody class="files"></tbody>
	                  </table>
               			</form>
               			<!--<div class="panel panel-success">
		                  <div class="panel-heading">
		                     <h3 class="panel-title">Notes</h3>
		                  </div>
		                  <div class="panel-body">
		                     <ul>
		                        <li>The maximum file size for uploads in this demo is <strong>5 MB</strong> (default file size is unlimited).</li>
		                        <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).</li>
		                        <li>Uploaded files will be deleted automatically after <strong>5 minutes</strong> (demo setting).</li>
		                     </ul>
		                  </div>
               			</div>-->
            			</div>
         			</div>
                	</div>
                    <div class="modal-footer">
                    	<button type="button" class="btn default" data-dismiss="modal">Close</button>
                        <button type="button" onclick="window.location.href='http://hugde.com/home/myhugge'" class="btn blue">Save changes</button>
                    </div>
             </div>
                           <!-- /.modal-content -->
			</div>
                        <!-- /.modal-dialog -->
	</div>
 <!----------------------------------------------------END upload modal----------------------------------------->  
   <!-- BEGIN FOOTER -->
   <div class="footer">
      <div class="footer-inner">
         2014 &copy; Hugde India.
      </div>
      <div class="footer-tools">
         <span class="go-top">
         <i class="icon-angle-up"></i>
         </span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
   <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
   <script id="template-upload" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-upload fade">
              <td>
                  <span class="preview"></span>
              </td>
              <td>
                  <p class="name" id="uploadImageName">{%=file.name%}</p>
                  {% if (file.error) { %}
                      <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                  {% } %}
              </td>
              <td>
                  <p class="size">{%=o.formatFileSize(file.size)%}</p>
                  {% if (!o.files.error) { %}
                      <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                      <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                      </div>
                  {% } %}
              </td>
              <td>
                  {% if (!o.files.error && !i && !o.options.autoUpload) { %}
                      <button class="btn blue start">
                          <i class="icon-upload"></i>
                          <span>Start</span>
                      </button>
                  {% } %}
                  {% if (!i) { %}
                      <button class="btn red cancel">
                          <i class="icon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
   </script>
   <!-- The template to display files available for download -->
   <script id="template-download" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-download fade">
              <td>
                  <span class="preview">
                      {% if (file.thumbnailUrl) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                      {% } %}
                  </span>
              </td>
              <td>
                  <p class="name">
                      {% if (file.url) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                      {% } else { %}
                          <span>{%=file.name%}</span>
                      {% } %}
                  </p>
                  {% if (file.error) { %}
                      <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                  {% } %}
              </td>
              <td>
                  <span class="size">{%=o.formatFileSize(file.size)%}</span>
              </td>
              <td>
                  {% if (file.deleteUrl) { %}
                      <button class="btn red delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                          <i class="icon-trash"></i>
                          <span>Delete</span>
                      </button>
                      <input type="checkbox" name="delete" value="1" class="toggle">
                  {% } else { %}
                      <button class="btn yellow cancel">
                          <i class="icon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
   </script>
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
   <script src="<?php echo assets_url(); ?>scripts/jquery.validate.min.js" type="text/javascript"></script>
   <script src="<?php echo assets_url(); ?>plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
   <script src="<?php echo assets_url(); ?>plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript" ></script>

   
   <!--<script type="text/javascript" src="<?php echo assets_url(); ?>plugins/select2/select2.min.js"></script>-->
   <script type="text/javascript" src="<?php echo assets_url(); ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   
   <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
   <script src="<?php echo assets_url(); ?>plugins/fancybox/source/jquery.fancybox.pack.js"></script>
   <!-- END PAGE LEVEL PLUGINS-->
   <!-- BEGIN:File Upload Plugin JS files-->
   <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
   <!-- The Templates plugin is included to render the upload/download listings-->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/vendor/tmpl.min.js"></script>
   <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/vendor/load-image.min.js"></script>
   <!-- The Canvas to Blob plugin is included for image resizing functionality -->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
   <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
   <!-- The basic File Upload plugin -->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
   <!-- The File Upload processing plugin -->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
   <!-- The File Upload image preview & resize plugin -->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
   <!-- The File Upload audio preview plugin -->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
   <!-- The File Upload video preview plugin -->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
   <!-- The File Upload validation plugin -->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
   <!-- The File Upload user interface plugin -->
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
   <!-- The main application script -->
   <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
   <!--[if (gte IE 8)&(lt IE 10)]>
   <script src="<?php echo assets_url(); ?>plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
   <![endif]-->
   <script src="<?php echo assets_url(); ?>scripts/app.js"></script>
   <script src="<?php echo assets_url(); ?>scripts/form-fileupload-meme.js"></script>
   <script src="<?php echo assets_url(); ?>scripts/login-soft.js" type="text/javascript"></script> 
   <script src="<?php echo assets_url(); ?>scripts/lickflush.js" type="text/javascript"></script>   
   <script src="<?php echo assets_url(); ?>scripts/form-components.js" type="text/javascript"></script>
      <script src="<?php echo assets_url(); ?>scripts/autoloadmemes.js" type="text/javascript"></script>   
   <!--<script src="<?php echo assets_url(); ?>scripts/autoloadMyHugge.js" type="text/javascript"></script>-->   
   <script type="text/javascript" src="<?php echo assets_url(); ?>plugins/jquery-mixitup/jquery.mixitup.min.js"></script>
   <script type="text/javascript" src="<?php echo assets_url(); ?>plugins/fancybox/source/jquery.fancybox.pack.js"></script>  
   <script src="<?php echo assets_url(); ?>scripts/app.js"></script>
   <script src="<?php echo assets_url(); ?>scripts/portfolio.js"></script>      
 <!------------Facebook JS--------------->
    <script src="<?php echo assets_url(); ?>scripts/facebook.js" type="text/javascript"></script>     
   <script>
      jQuery(document).ready(function() {    
         App.init();
         Portfolio.init();
         FormFileUpload.init();
         Login.init();
         FormComponents.init();
         $("#uploadSubmit").click(function(){
         	FormFileUpload.submit();
         });
      });
   </script>
   <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48595506-1', 'hugde.com');
  ga('send', 'pageview');

</script>
   <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>