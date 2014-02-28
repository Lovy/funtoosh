      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
         //Charts.init();
         FormComponents.init();
         //UIjQueryUISliders.init();
         //Charts.initPieCharts();
         
          var dataSource = [
		    {region: "B.Tech", val: 4119626293},
		    {region: "BA", val: 1012956064},
		    {region: "B.com", val: 344124520},
		    {region: "B.E", val: 590946440},
		    {region: "B.Arch", val: 727082222},
		    {region: "B.Des", val: 35104756},
		    {region: "B.Sc", val: 590946440},
		    {region: "B.C.A", val: 727082222},
		];

		$("#chartContainer").dxPieChart({
	    dataSource: dataSource,
	    title: "Breakup-Science Background",
		tooltip: {
			enabled: true,
			format:"millions",
			percentPrecision: 2,
			customizeText: function() { 
				return this.percentText + " of Science students chose " + this.originalArgument;
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
		
		////////////////////////////code to load satisfaction chart////////////////////////////////////
		$("#slider-range-max1").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount1").text(ui.value);
                    $("#rating_degree").val(ui.value);
                },
                stop: function( event, ui ) {
                	
                }
                
            });

            $("#slider-range-max-amount1").text($("#slider-range-max1").slider("value"));
            $("#rating_degree").val($("#slider-range-max1").slider("value"));
		
			$("#slider-range-max2").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount2").text(ui.value);
                    $("#rating_college").val(ui.value);
                },
                stop: function( event, ui ) {
                	
                }
                
            });

            $("#slider-range-max-amount2").text($("#slider-range-max2").slider("value"));
            $("#rating_college").val($("#slider-range-max2").slider("value"));
            
            	$("#slider-range-max3").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount3").text(ui.value);
                    $("#rating_field").val(ui.value);
                },
                stop: function( event, ui ) {
                	
                }
                
            });

            $("#slider-range-max-amount3").text($("#slider-range-max3").slider("value"));
            $("#rating_field").val($("#slider-range-max3").slider("value"));
            
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
	
			function autosave_notify(){
				$("#autosave").css('display','block');
				setTimeout(function(){$("#autosave").hide();},2000);
			}
      });