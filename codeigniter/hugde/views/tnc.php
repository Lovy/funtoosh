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
                        		 <button data-toggle="modal" href="#basic" type="button" class="btn yellow">Create Memes</button>
            	<!--<a data-toggle="modal" href="#basic" >Upload <i class="icon-upload"></i></a>-->
            </li>			
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
                        		 <button onclick="window.location.replace('http://hugde.com/memes');" type="button" class="btn yellow">Create Memes</button>
            	<!--<a data-toggle="modal" href="#basic" >Upload <i class="icon-upload"></i></a>-->
            </li>
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
         	
            <div class="col-md-12">
              <h2>Accepting the Terms of Service</h2>
<p>The holy purpose of this website, hugde.com (the “Site”), owned and operated by HUGDE, Inc., is to provide web publishing services in innovative way to the planet earth. Kindly go through terms of service (“Agreement”) carefully before using the Site or any services provided on the Site (collectively, “Services”). By using or retrieving the Services, you agree to become certain by all the terms and conditions of this Agreement. If you do not agree to all the terms and conditions of this Agreement, do not use the Services. The Services are accessed by you (“Subscriber” or “You”) under the following terms and conditions:</p>
<h2>1. Admittance to the Services</h2>
<p>Subject to the terms and conditions of this Agreement, HUGDE, Inc. may offer to provide the Services, as defined more fully on the Site, and which are selected by Subscriber, especially for Subscriber’s own use, and not for the use or value of any third party. Services shall include, but not be restricted to, any services HUGDE, Inc. performs for Subscriber, as well as the offering of any Content (as defined below) on the Site. HUGDE, Inc. may change, suspend or discontinue the Services at any time, including the availability of any feature, database, or Content. HUGDE, Inc. may also enact limits on certain features and services or restrict Subscriber’s access to parts or all of the Services without notice or liability. HUGDE, Inc. reserves the right, at its discretion, to modify these Terms of Service at any time by posting revised Terms of Service on the Site and by providing notice via e-mail, where possible, or on the Site. Subscriber shall be responsible for reviewing and becoming familiar with any such alterations. Use of the Services by Subscriber following such amendment constitutes Subscriber's acceptance of the terms and conditions of this Agreement as modified.
Subscriber certifies to HUGDE, Inc. that if Subscriber is an individual (i.e., not a corporate entity), Subscriber is at least 13 years of age. No one under the age of 13 may provide any personal information to or on HUGDE, Inc. (including, for example, a name, address, telephone number or email address). Subscriber also certifies that it is legally permitted to use the Services and access the Site, and takes full responsibility for the selection and use of the Services and access of the Site. This Agreement is annulled where prohibited by law, and the right to access the Site is revoked in such jurisdictions. HUGDE, Inc. makes no claim that the Site may be lawfully viewed or that Content may be downloaded outside of India. Access to the Content may not be legal by certain persons or in certain countries. If You access the Site from outside India, You do so at Your own risk and You are responsible for compliance with the laws of Your jurisdiction.
HUGDE, Inc. will use reasonable efforts to ensure that the Site and Services are available twenty-four hours a day, seven days a week. However, there will be occasions when the Site and/or Services will be interrupted for maintenance, upgradation and repairs or due to failure of telecommunications links and equipment. Every practical step will be taken by HUGDE, Inc. to minimize such disruption where it is within HUGDE, Inc.’s reasonable control.
You agree that neither HUGDE, Inc. nor the Site will be liable in any event to you or any other party for any suspension, modification, discontinuance or lack of availability of the Site, the service, your Subscriber Content or other Content.
HUGDE, Inc. retains the right to create limits on use and storage in its sole discretion at any time with or without notice.
Subscriber shall be responsible for obtaining and maintaining any equipment or ancillary services needed to connect to, access the Site or otherwise use the Services, including, without limitation, modems, hardware, software, and long distance or local telephone service. Subscriber shall be responsible for ensuring that such equipment or ancillary services are compatible with the Services.</p>
<h2>2. Site Content</h2>
<p>The Site and its contents are envisioned exclusively for the use of HUGDE, Inc. Subscribers and may only be used in line with the terms of this Agreement. All materials displayed or performed on the Site, including, but not limited to text, graphics, logos, tools, photographs, images, illustrations, software or source code, audio and video, animations and Themes (as defined below), including without limitation the HUGDE, Inc. Template Code (as defined below) (collectively, “Content”) (other than Content posted by Subscriber (“Subscriber Content”)) are the property of HUGDE, Inc. and/or third parties and are protected by India and international copyright laws. The HUGDE, Inc. API shall be used exclusively pursuant to the terms of the API Terms of Service. All trademarks, service marks, and trade names are proprietary to HUGDE, Inc. and/or third parties. Subscriber shall abide by all copyright notices, information, and restrictions contained in any Content accessed through the Services.
The Site is protected by copyright as a collective work and/or compilation, pursuant to Indian copyright laws, international conventions, and other copyright laws. Other than as expressly set forth in this Agreement, Subscriber may not copy, modify, publish, transmit, upload, participate in the transfer or sale of, reproduce (except as provided in this Section), create derivative works based on, distribute, perform, display, or in any way exploit, any of the Content, software, materials, or Services in whole or in part.
subscriber may download or copy the Content, and other items displayed on the Site for download, for personal use only, provided that Subscriber maintains all copyright and other notices contained in such Content. Downloading, copying, or storing any Content for other than personal, noncommercial use is expressly prohibited without prior written permission from HUGDE, Inc., or from the copyright holder identified in such Content's copyright notice. In the event You download software from the Site, the software, including any files, images Incorporated in or generated by the software, and the data accompanying the software (collectively, the “Software”) is licensed to You by HUGDE, Inc. or third party licensors for Your personal, noncommercial use, and no title to the Software shall be transferred to You. You may own the Subscriber Content on which the Software is recorded, but HUGDE, Inc. or third party licensors retain full and complete title to the Software and all intellectual property rights therein.</p>
<h2>3. Subscriber Content</h2>
<p>Subscriber shall own all Subscriber Content that Subscriber contributes to the Site, but hereby grants and agrees to grant HUGDE, Inc. a non-exclusive, worldwide, royalty-free, transferable right and license (with the right to sublicense), to use, copy, cache, publish, display, distribute, modify, create derivative works and store such Subscriber Content and to allow others to do so (“Content License”) in order to provide the Services. On termination of Subscriber’s membership to the Site and use of the Services, HUGDE, Inc. shall make all reasonable efforts to promptly remove from the Site and cease use of the Subscriber Content; however, Subscriber recognizes and agrees that caching of or references to the Subscriber Content may not be immediately removed. Subscriber warrants, represents and agrees Subscriber has the right to grant HUGDE, Inc. and the Site the rights set forth above. Subscriber represents, warrants and agrees that it will not contribute any Subscriber Content that (a) infringes, violates or otherwise interferes with any copyright or trademark of another party, (b) reveals any trade secret, unless Subscriber owns the trade secret or has the owner’s permission to post it, (c) infringes any intellectual property right of another or the privacy or publicity rights of another, (d) is libelous, defamatory, abusive, threatening, harassing, hateful, offensive or otherwise violates any law or right of any third party, (e) contains a virus, Trojan horse, worm, time bomb or other computer programming routine or engine that is envisioned to damage, detrimentally interfere with, surreptitiously intercept or expropriate any system, data or information, or (f) remains posted after Subscriber has been notified that such Subscriber Content violates any of sections (a) to (e) of this sentence. HUGDE, Inc. reserves the right to remove any Subscriber Content from the Site, suspend or terminate Subscriber’s right to use the Services at any time, or pursue any other remedy or relief available to HUGDE, Inc. and/or the Site under equity or law, for any reason (including, but not limited to, upon receipt of claims or allegations from third parties or authorities relating to such Subscriber Content or if HUGDE, Inc. is concerned that Subscriber may have breached the immediately preceding sentence), or for no reason at all.</p>
<h2>4. Constraints</h2>
<p>Subscriber is responsible for all of its activity in connection with the Services and accessing the Site. Any fraudulent, abusive, or otherwise illegal activity or any use of the Services or Content in violation of this Agreement may be grounds for termination of Subscriber’s right to Services or to access the Site. Subscriber may not post or transmit, or cause to be posted or transmitted, any communication or solicitation designed or envisioned to obtain password, account, or private information from any HUGDE, Inc. user.
Use of the Site or Services to violate the security of any computer network, crack passwords or security encryption codes, transfer or store illegal material including that are deemed threatening or obscene, or engage in any kind of illegal activity is expressly prohibited. Under no circumstances will Subscriber use the Site or the Service to (a) send unsolicited e-mails, bulk mail, spam or other materials to users of the Site or any other individual, (b) harass, threaten, stalk or abuse any person or party, including other users of the Site, (c) create a false identity or to impersonate another person, or (d) post any false, inaccurate or Incomplete material or delete or revise any material that was not posted by You.</p>
<h2>5. Assurance disclaimer</h2>
<p>HUGDE, Inc. has no special relationship with or fiduciary duty to Subscriber. Subscriber acknowledges that HUGDE, Inc. has no control over, and no duty to take any action regarding: which users gains access to the Site; which Content Subscriber accesses via the Site; what effects the Content may have on Subscriber; how Subscriber may interpret or use the Content; or what actions Subscriber may take as a result of having been exposed to the Content. Much of the Content of the Site is provided by and is the responsibility of the user or subscriber who posted the Content. HUGDE, Inc. does not monitor the Content of the Site and takes no responsibility for such Content. Subscriber releases HUGDE, Inc. from all liability for Subscriber having acquired or not acquired Content through the Site. The Site may contain, or direct Subscriber to sites containing, information that some people may find offensive or inappropriate. HUGDE, Inc. makes no representations concerning any content contained in or accessed through the Site, and HUGDE, Inc. will not be responsible or liable for the accuracy, copyright compliance, legality or decency of material contained in or accessed through the Site.
Although HUGDE, Inc. and the Site will make reasonable efforts to store and preserve the material residing on the Site, neither HUGDE, Inc. nor the Site is responsible or liable in any way for the failure to store, preserve or access Subscriber Content or other materials you transmit or archive on the Site. You are strongly urged to take measures to preserve copies of any data, material, content or information you post or upload on the Site. You are exclusively responsible for creating back-ups of your Subscriber Content.
The Services, Content, Site and any Software are provided on an "as is" basis, without warranties of any kind, either express or implied, including, without limitation, implied warranties of merchantability, fitness for a particular purpose or non-infringement. HUGDE, Inc. makes no representations or warranties of any kind with respect to the Site, the Services, including any representation or warranty that the use of the Site or Services will (a) be timely, uninterrupted or error-free or operate in combination with any other hardware, software, system or data, (b) meet your requirements or expectations, (c) be free from errors or that defects will be corrected, (d) be free of viruses or other harmful components.
To the fullest extent allowed by law, HUGDE, Inc. disclaims any liability or responsibility for the accuracy, reliability, availability, completeness, legality or operability of the material or services provided on this Site. By using this Site, you acknowledge that HUGDE, Inc. is not responsible or liable for any harm resulting from (1) use of the Site; (2) downloading information contained on the Site including but not limited to downloads of content posted by subscribers; (3) unauthorized disclosure of images, information or data that results from the upload, download or storage of content posted by subscribers; (4) the temporary or permanent inability to access or retrieve any Subscriber Content from the Site, including, without limitation, harm caused by viruses, worms, Trojan horses, or any similar contamination or destructive program.
Some places do not allow limitations on how long an implied warranty lasts, so the above limitations may not apply to Subscriber.</p>
<h2>6. Intermediary websites</h2>
<p>Users of the Site may gain access from the Site to third party sites on the Internet through hypertext or other computer links on the Site. Third party sites are not within the supervision or control of HUGDE, Inc. or the Site. Unless explicitly otherwise provided, neither HUGDE, Inc. nor the Site make any representation or warranty whatsoever about any third party site that is linked to the Site, or endorse the products or services offered on such site. HUGDE, Inc. and the Site disclaim: (a) all responsibility and liability for content on third party websites and (b) any representations or warranties as to the security of any information (including, without limitation, credit card and other personal information) You might be requested to give any third party, and You hereby irrevocably waive any claim against the Site or HUGDE, Inc. with respect to such sites and third party content.</p>
<h2>7. Registration and safety</h2>
<p>As a condition to using Services, Subscriber will be required to register with HUGDE, Inc. and select a password and HUGDE, Inc. URL. Subscriber shall provide HUGDE, Inc. with accurate, complete, and updated registration information, including Subscriber’s e-mail address. Failure to do so shall constitute a breach of this Agreement, which may result in immediate termination of Subscriber's account. Subscriber may not (a) select or use as a HUGDE, Inc. URL a name of another person with the intent to impersonate that person; or (b) use as a HUGDE, Inc. URL a name subject to any rights of a person other than Subscriber without appropriate authorization. HUGDE, Inc. reserves the right to refuse registration of, or cancel a HUGDE, Inc. URL in its discretion. Subscriber shall be responsible for maintaining the confidentiality of Subscriber's HUGDE, Inc. password. Subscriber is exclusively responsible for any use of or action taken under Subscriber’s password and accepts full responsibility for all activity conducted through Subscriber’s account and agrees to and hereby releases the Site and HUGDE, Inc. from any and all liability concerning such activity. Subscriber agrees to notify HUGDE, Inc. immediately of any actual or suspected loss, theft, or unauthorized use of Subscriber’s account or password. The Site will take reasonably security precautions when using the internet, telephone or other means to transport date or other communications, but expressly disclaims any and all liability for the accessing of any such data communications by unauthorized persons or entities.</p>
<h2>8. Insurance</h2>
<p>Subscriber will indemnify and hold HUGDE, Inc., its directors, officers and employees, harmless, including costs and attorneys' fees, from any claim or demand made by any third party due to or arising out of Subscriber’s access to the Site, use of the Services, the violation of this Agreement by Subscriber, or the infringement by Subscriber, or any third party using the Subscriber's account, of any intellectual property or other right of any person or entity.</p>
<h2>9. Limitation of liability</h2>
<p>In no event shall HUGDE, Inc., its directors, officers, shareholders, employees or members be liable with respect to the Site or the Services for (a) any indirect, incidental, punitive, or consequential damages of any kind whatsoever; (b) damages for loss of use, profits, data, images, Subscriber Content or other intangibles; (c) damages for unauthorized use, non-performance of the Site, errors or omissions; or (d) damages related to downloading or posting Content. HUGDE, Inc.'s and the Site's collective liability under this agreement shall be limited to USD 400. Some places do not allow the exclusion or limitation of Incidentals or consequential damages, so the above limitations and exclusions may not apply to Subscriber.
<h2>10. Fees and payment</h2>
<p>Some of the Services may require payment of fees in future. All fees will be stated in U.S. dollars in future if we HUGDE ever charged any penny. Subscriber shall pay all applicable fees, as described on the Site in connection with such Services selected by Subscriber, and any related taxes or additional charges. All fees are non-refundable unless expressly stated otherwise on the Site. Subscriber represents to HUGDE, Inc. that Subscriber is the authorized account holder or an authorized user of the chosen method of payment used to pay for the paid aspects of the Services. HUGDE, Inc. may modify and/or eliminate such fee-based Services at its discretion. Subscriber understands and agrees that the payment for virtual goods grants Subscriber a limited license to use the virtual goods as specified on the Site.
HUGDE, Inc. may change its prices at any time but will provide you reasonable notice of any such changes by posting the new prices on the Site and by sending you email notification. If you do not wish to pay the new prices, you may cancel the services prior to the change going into effect.</p>
<h2>11. Termination</h2>
<p>Either party may terminate the Services at any time by notifying the other party by any means. HUGDE, Inc. may also terminate or suspend any and all Services and access to the Site immediately, without prior notice or liability, if Subscriber breaches any of the terms or conditions of this Agreement. Upon termination of Subscriber's account, Subscriber’s right to use the Services, access the Site and any Content will immediately be ceased. All provisions of this Agreement which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, and limitations of liability. Termination of Your access to and use of the Site and the Services shall not relieve Subscriber of any obligations arising or accruing prior to such termination or limit any liability which Subscriber otherwise may have to HUGDE, Inc. or the Site, including without limitation any indemnification obligations contained herein.</p>
<h2>12. Privacy</h2>
<p>Please review our Privacy Policy, which governs the use of personal information on the Site and to which Subscriber agrees to be bound as a user of the Site.</p>
<h2>13. Miscellaneous</h2>
<p>This Agreement (Including the Privacy Policy), as modified from time to time, constitutes the entire agreement between You, the Site and HUGDE, Inc. with respect to the subject matter hereof. This Agreement replaces all prior or contemporaneous understandings or agreements, written or oral, regarding the subject matter hereof. The failure of either party to exercise in any respect any right provided for herein shall not be deemed a waiver of any further rights hereunder. HUGDE, Inc. shall not be liable for any failure to perform its obligations hereunder where such failure results from any cause beyond HUGDE, Inc.’s reasonable control, Including, without limitation, mechanical, electronic or communications failure or degradation. If any provision of this Agreement is found to be unenforceable or invalid, that provision shall be limited or eliminated to the minimum extent necessary so that this Agreement shall otherwise remain in full force and effect and enforceable. This Agreement is not assignable, transferable or sub licensable by Subscriber except with HUGDE, Inc.’s prior written consent. HUGDE, Inc. may assign this Agreement in whole or in part at any time without Subscriber’s consent. This Agreement shall be governed by and construed in accordance with the laws of the Indian penal code without regard to the conflict of laws provisions thereof. No agency, partnership, joint venture, or employment is created as a result of this Agreement and Subscriber does not have any authority of any kind to bind HUGDE, Inc. in any respect whatsoever.</p>
<h2>14. Notice and Procedure for Making Claims of Copyright or Other Intellectual Property Infringements</h2>
<p>HUGDE respects the intellectual property of others and takes the protection of copyrights and all other intellectual property very seriously, and we ask our users to do the same. Infringing activity will not be tolerated on or through the Services.
HUGDE’s intellectual property policy is to (a) remove material that HUGDE believes in good faith, upon notice from an intellectual property owner or their agent, is infringing the intellectual property of a third party by being made available through the Services, and (b)remove any Subscriber Content posted to the Services by “repeat infringers.” HUGDE considers a “repeat infringer” to be any user that has uploaded Subscriber Content to the Services and for whom HUGDE has received more than two takedown notices compliant with the provisions of 17 U.S.C. § 512(c) with respect to such Subscriber Content. HUGDE has discretion, however, to terminate the account of any user after receipt of a single notification of claimed infringement or upon HUGDE’s own determination.
Procedure for Reporting Claimed Infringement
If you believe that any content made available on or through the Services has been used or exploited in a manner that infringes an intellectual property right you own or control, then please promptly send a “Notification of Claimed Infringement” containing the following information to the Designated Agent identified below. Your communication must Include substantially the following:
- A physical or electronic signature of a person authorized to act on behalf of the owner of the work(s) that has/have been allegedly infringed;
- Identification of works or materials being infringed, or, if multiple works are covered by a single notification, a representative list of such works;
- Identification of the specific material that is claimed to be infringing or to be the subject of infringing activity and that is to be removed or access to which is to be disabled, and information reasonably sufficient to permit HUGDE to locate the material;
- Information reasonably sufficient to permit HUGDE to contact you, such as an address, telephone number, and, if available, an electronic mail address at which you may be contacted;
- A statement that you have a good faith belief that the use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law; and
- A statement that the information in the notification is accurate, and under penalty of perjury, that you are authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.
You should consult with your own lawyer and/or see 17 U.S.C. § 512 to confirm your obligations to provide a valid notice of claimed infringement.
Designated Agent Contact Information
HUGDE’s Designated Agent for notices of claimed infringement can be contacted at:
Via E-mail: copyright@hugde.com

Counter Notification
If you receive a notification from HUGDE that material made available by you on or through the Services has been the subject of a Notification of Claimed Infringement, then you will have the right to provide HUGDE with what is called a “Counter Notification.” To be effective, a Counter Notification must be in writing, provided to HUGDE’s Designated Agent through one of the methods identified immediately above, and include substantially the following information:
- A physical or electronic signature of the subscriber;
- Identification of the material that has been removed or to which access has been disabled and the location at which the material appeared before it was removed or access to it was disabled;
- A statement under penalty of perjury that the subscriber has a good faith belief that the material was removed or disabled as a result of mistake or misidentification of the material to be removed or disabled; and
- The subscriber’s name, address, and telephone number, and a statement that the subscriber consents to the jurisdiction of Indian District Court for the judicial district in which the address is located, or if the subscriber’s address is outside of the India, for any judicial district in which HUGDE may be found, and that the subscriber will accept service of process from the person who provided a Notification of Claimed Infringement as set forth above or an agent of such person.
A party submitting a Counter Notification should consult a lawyer or see 17 U.S.C. § 512 to confirm the party’s obligations to provide a valid counter notification under the Copyright Act.
HUGDE Actions Following Receipt of Counter Notification
Upon receipt of a Counter Notification, HUGDE shall promptly provide the party submitting a Notification of Claimed Infringement with a copy of the Counter Notification, and HUGDE will replace the removed material or cease disabling access to it in not less than 14, nor more than fourteen (20), business days following receipt of the Counter Notice, unless HUGDE’s Designated Agent first receives notice from the person who submitted the Notification of Claimed Infringement that such person has filed an action seeking a court order to restrain the subscriber from engaging in infringing activity relating to the material on HUGDE’s system or network.
False Notifications of Claimed Infringement or Counter Notifications
The Copyright Act provides that:
[a]ny person who knowingly materially misrepresents under [Section 512 of the Copyright Act (17 U.S.C. § 512)] (1) that material or activity is infringing, or (2) that material or activity was removed or disabled by mistake or misidentification, shall be liable for any damages, including costs and attorneys’ fees, Incurred by the alleged infringer, by any copyright owner or copyright owner’s authorized licensee, or by a service provider, who is injured by such misrepresentation, as the result of [HUGDE] relying upon such misrepresentation in removing or disabling access to the material or activity claimed to be infringing, or in replacing the removed material or ceasing to disable access to it.
17 U.S.C. § 512(f).
HUGDE reserves the right to seek damages from any party that submits a Notification of Claimed Infringement or Counter Notification in violation of the law.
For the avoidance of doubt, only notices submitted under the Digital Millennium Copyright Act and the procedures set forth in this Agreement should be sent to the Designated Agent at copyright@hugde.com or to the postal address identified above. Any other comments, compliments, complaints or suggestions about HUGDE, the operation of the Services or any other matter should be sent to support@hugde.com.</p>

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
                    <h4 class="modal-title"></h4>
                </div>
            <div class="modal-body">
             <!-- BEGIN REGISTRATION FORM -->
      			<form id="signupForm" class="register-form" action="<?php echo base_url().'signup'; ?>" method="post">
         		<h3 >Sign Up and be a hugger !!</h3>
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