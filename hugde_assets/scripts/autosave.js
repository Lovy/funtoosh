var autosave = function () { 
	/////////////////////////code to stringfy the data and store in the database///////////////////////
		    
		    	var save_tenplustwo = function(){
			    	var timeoutTimer;
					jQuery(function($) {
						$('#myform').bind('mousedown keydown', function(event) {
						clearTimeout(timeoutTimer);
						timeoutTimer = setTimeout(function(){autosave_tenplustwo()},2000);
						});
					});
				}
				
				 var save_bachelors = function(){
		    	var timeoutTimer;
				jQuery(function($) {
					$('#myform').bind('mousedown keydown', function(event) {
					clearTimeout(timeoutTimer);
					timeoutTimer = setTimeout(function(){autosave_bachelors()},2000);
					});
				});
				}
				
				 var save_job = function(){
		    	var timeoutTimer;
				jQuery(function($) {
					$('#myform').bind('mousedown keydown', function(event) {
					clearTimeout(timeoutTimer);
					timeoutTimer = setTimeout(function(){autosave_job()},2000);
					});
				});
				}
				
				function autosave_tenplustwo(){
					var temp=$("#myform").serialize();
					//var serializedArr = JSON.stringify( cattemp );
					$.ajax({
						
						//url to send the data to
						url: "http://localhost/tenplustwo/tempstoreformdata",
						data: {'temp':temp},
						type: 'post',
						beforeSend:function(){
						//Show Autosaving div
							autosave_notify();
						},
						complete:function(){
						
						},
						success:function(){
						//Do something
						}
					});	
				}
				
				function autosave_bachelors(){
					var temp=$("#myform").serialize();
					//var serializedArr = JSON.stringify( cattemp );
					$.ajax({
						
						//url to send the data to
						url: "http://localhost/bachelors/tempstoreformdata",
						data: {'temp':temp},
						type: 'post',
						beforeSend:function(){
						//Show Autosaving div
							autosave_notify();
						},
						complete:function(){
						
						},
						success:function(){
						//Do something
						}
					});	
				}
				
				function autosave_job(){
					var temp=$("#myform").serialize();
					//var serializedArr = JSON.stringify( cattemp );
					$.ajax({
						
						//url to send the data to
						url: "http://localhost/job/tempstoreformdata",
						data: {'temp':temp},
						type: 'post',
						beforeSend:function(){
						//Show Autosaving div
							autosave_notify();
						},
						complete:function(){
						
						},
						success:function(){
						//Do something
						}
					});	
				}
		
				function autosave_notify(){
					$("#autosave").css('display','block');
					setTimeout(function(){$("#autosave").hide();},2000);
				}
		    
		    			
			return {
	        //main function to initiate the module
	        tenplustwo_init: function () {
	        	save_tenplustwo();
	        },
	        bachelors_init: function () {
	        	save_bachelors();
	        },
	        job_init: function () {
	        	save_job();
	        }
	    	};
}();	