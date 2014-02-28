      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
         //Charts.init();
         FormComponents.init();
         //Charts.initPieCharts();
         //UIjQueryUISliders.init();
         
		 var dataSource = [
		    {region: "Production, Maintenance", val: 4119626293},
		    {region: "IT Software", val: 1012956064},
		    {region: "Engineering Design", val: 344124520},
		    {region: "HR", val: 590946440},
		    {region: "Accounts, Finance, Audit", val: 727082222},
		    {region: "Sales", val: 35104756}
		];

		$("#chartContainer").dxPieChart({
	    dataSource: dataSource,
	    title: "Job Categorywise Breakup",
		tooltip: {
			enabled: true,
			format:"millions",
			percentPrecision: 2,
			customizeText: function() { 
				return this.percentText + " of people chose "+ this.originalArgument + " after B.Tech";
			}
		},
		legend: {
			horizontalAlignment: "center",
			verticalAlignment: "bottom",
			margin: 0
		},
		
		series: [{
			type: "doughnut",
			argumentField: "region"
			
		}]
		});
		
		////////////////////////////////////////code to load satisfaction charts//////////////////////////////
		////////////////////////////code to load satisfaction chart////////////////////////////////////
		$("#slider-range-max1").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount1").text(ui.value);
                    $("#rating_category").val(ui.value);
                },
                stop: function( event, ui ) {
                	
                }
                
            });

            $("#slider-range-max-amount1").text($("#slider-range-max1").slider("value"));
            $("#rating_category").val($("#slider-range-max1").slider("value"));
		
			$("#slider-range-max2").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount2").text(ui.value);
                    $("#rating_company").val(ui.value);
                },
                stop: function( event, ui ) {
                	
                }
                
            });

            $("#slider-range-max-amount2").text($("#slider-range-max2").slider("value"));
            $("#rating_company").val($("#slider-range-max2").slider("value"));
            
            	$("#slider-range-max3").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount3").text(ui.value);
                    $("#rating_location").val(ui.value);
                },
                stop: function( event, ui ) {
                	
                }
                
            });

            $("#slider-range-max-amount3").text($("#slider-range-max3").slider("value"));
            $("#rating_location").val($("#slider-range-max3").slider("value"));
            
            /////////////////////////code to stringfy the data and store in the database///////////////////////
		    var timeoutTimer;
			jQuery(function($) {
				$('#myform').bind('mousedown keydown', function(event) {
				clearTimeout(timeoutTimer);
				timeoutTimer = setTimeout(function(){autosave()},2000);
				});
			});
			
			function autosave(){
				var temp=$("#myform").serialize();
				//var serializedArr = JSON.stringify( cattemp );
				$.ajax({
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
		
      });