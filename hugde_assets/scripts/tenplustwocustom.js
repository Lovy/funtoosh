      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
         //Charts.init();
         FormComponents.init();
         //UIjQueryUISliders.init();
         //Charts.initPieCharts();
         
         
         //BEGIN Default Streamwise distribution Chart
          var dataSource = [
		    {"stream": "Science(PCM)", "val": 4119626293},
		    {"stream": "Science(PCB)", "val": 1012956064},
		    {"stream": "Science(PCMB)", "val": 344124520},
		    {"stream": "Commerce", "val": 590946440},
		    {"stream": "Arts", "val": 727082222}
		];
		var x ="10+2";

		$("#chartContainer").dxPieChart({
	    dataSource: dataSource,
	    title: x+": Stream Wise Breakup",
		tooltip: {
			enabled: true,
			format:"millions",
			percentPrecision: 2,
			customizeText: function() { 
				return this.percentText + " of students chose " + this.originalArgument + " after Tenth";
			}
		},
		legend: {
			horizontalAlignment: "center",
			verticalAlignment: "bottom",
			margin: 0
		},
		series: [{
			type: "doughnut",
			argumentField: "stream"
		}]
		});
		// ENDS Stream Wise Chart
		
			$("#slider-range-max").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 10,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount").text(ui.value);
                    $("#rating").val(ui.value);
                },
                stop: function( event, ui ) {
                	$("#chartContainer").hide(function(){
                		var delay=0;//1 seconds
					    setTimeout(function(){
					    //your code to be executed after 1 seconds
					    //BEGIN My Streamwise satisfaction Chart
				          var dataSource2 = [
						   {region: "Totally Screwed", val: 401243},
						    {region: "Could have been better", val: 112956064},
						    {region: "Just Right", val: 344124520},
						    {region: "It was good", val: 50946440},
						    {region: "Couldn't be better", val: 430946440}
						];
						var Stream = document.getElementById("stream").value;
						$("#chartContainer2").dxPieChart({
					    dataSource: dataSource2,
					    title: Stream+": Decision Rating Breakup",
						tooltip: {
							enabled: true,
							format:"millions",
							percentPrecision: 2,
							customizeText: function() { 
								return this.percentText + " of students said " + this.originalArgument;
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
						// ENDS Stream Wise Satisfaction Chart
					    $("#chartContainer2").show();
					    },delay)
                		
                	});
                	
                }
                
            });

            $("#slider-range-max-amount").text($("#slider-range-max").slider("value"));
            $("#rating").val($("#slider-range-max").slider("value"));
            
            $("#dropdown").change(function () {
            	
		        if (document.getElementById("dropdown").value == "Streamwise Distribution"){
			        $("#chartContainer").show();
			        $("#chartContainer2").hide();
			    }     
			    else{
			         $("#chartContainer").hide();
			        $("#chartContainer2").show();
			    }  
		    });
		    
           
      });
