var tenplustwodata;
var userscount=0;
var chartdata = function () {
	
	/*
	var getusers = function() {
		$.ajax({
			//url to get users count	
		   url: "http://localhost/chartdata",  //calling the index function in chartdata controller
		   success: function(data){
		   	console.log("Countbefore"+userscount);
		     userscount = data;
		     console.log("Count"+userscount);
		   }
		 });
	}
	*/
	////////////////////////////////////////////////////////////////////////////////////TEN PLUS TWO///////////////////////////////////////////////////////////////////////////////////////////////
	var slide1 = function(){
		$("#slider-range-max").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 5,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount").text(ui.value);
                    $("#rating").val(ui.value);
                },
                stop: function( event, ui ) {
                	var stream = $("#stream").val();
                	tenplustwo_satisfaction_data(stream);            	
                }
                
            });

            $("#slider-range-max-amount").text($("#slider-range-max").slider("value"));
            $("#rating").val($("#slider-range-max").slider("value"));
	}
	
	function tenplustwo_satisfaction_data(stream){
		$.ajax({
						
						//url to send the data to
						url: "http://localhost/chartdata/getsatisfactiondata_tenplustwo",
						type: 'post',
						data: {'stream':stream},
						dataType: 'json',
						beforeSend:function(){
						//Show Autosaving div
							//autosave_notify();
						},
						complete:function(){
						
						},
						success:function(datas){
								$("#chartContainer").hide(function(){
		                		var delay=0;//1 seconds
							    setTimeout(function(){
							    //your code to be executed after 1 seconds
							    //BEGIN My Streamwise satisfaction Chart
							    console.log(datas[0]);
								var Stream = document.getElementById("stream").value;
								$("#chartContainer2").dxPieChart({
							    dataSource: datas,
							    title: Stream+": Decision Rating Breakup",
								tooltip: {
									enabled: true,
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
									argumentField: "rating_description"
								}]
								});
								// ENDS Stream Wise Satisfaction Chart
							    $("#chartContainer2").show();
							    },delay)
		                		
		                	});
								
						}
					});	
	}
	
    var tenplustwo_streamdata = function() { 
		 $.ajax({
						
						//url to send the data to
						url: "http://localhost/chartdata/getstreamdata_tenplustwo",
						type: 'post',
						dataType: 'json',
						beforeSend:function(){
						//Show Autosaving div
							//autosave_notify();
						},
						complete:function(){
						
						},
						success:function(data){
								///starts chart
								$("#chartContainer").dxPieChart({
							    dataSource: data,
							    title: ": Stream Wise Breakup",
								tooltip: {
									enabled: true,
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
						}
					});		 
    }
    
    /////////////////////////////////////////////////////////////////    BACHELORS    //////////////////////////////////////////////////////////////////////////////////////////////////
    var bachelors_streamdata = function() { 
    	
		 $.ajax({
						
						//url to send the data to
						url: "http://localhost/chartdata/getstreamdata_bachelors",
						type: 'post',
						dataType: 'json',
						beforeSend:function(){
						//Show Autosaving div
							//autosave_notify();
						},
						complete:function(){
						
						},
						success:function(data){
								
								//Pop the last element of data which holds the stream value
								var last = data.pop();
								$("#chartContainer").dxPieChart({
							    dataSource: data,
							    title: "Breakup-"+last.stream+" Background",
								tooltip: {
									enabled: true,
									percentPrecision: 2,
									customizeText: function() { 
										return this.percentText + " of " + last.stream+" students chose " + this.originalArgument;
									}
								},
								legend: {
									horizontalAlignment: "center",
									verticalAlignment: "bottom",
									margin: 0
								},
								series: [{
									type: "doughnut",
									argumentField: "degree"
								}]
								});
						}
					});		 
    }
    
    var slide2 = function(){   //////////degree rating slider
		$("#slider-range-max1").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 5,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount1").text(ui.value);
                    $("#rating_degree").val(ui.value);
                },
                stop: function( event, ui ) {
                	var degree = $("#degree").val();
                	console.log(degree);
                	bachelors_degreesatisfaction_data(degree);            	
                }
                
            });

            $("#slider-range-max-amount1").text($("#slider-range-max1").slider("value"));
            $("#rating_degree").val($("#slider-range-max1").slider("value"));
	}
	
	var slide3 = function(){   ///////////college rating slider
		$("#slider-range-max2").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 5,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount2").text(ui.value);
                    $("#rating_college").val(ui.value);
                },
                stop: function( event, ui ) {
                	var college = $("#college").val();
                	bachelors_collegesatisfaction_data(college);            	
                }
                
            });

            $("#slider-range-max-amount2").text($("#slider-range-max2").slider("value"));
            $("#rating_college").val($("#slider-range-max2").slider("value"));
	}
	
	var slide4 = function(){   /////////////field rating slider
		$("#slider-range-max3").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 5,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount3").text(ui.value);
                    $("#rating_field").val(ui.value);
                },
                stop: function( event, ui ) {
                	var field = $("#field").val();
                	bachelors_fieldsatisfaction_data(field);            	
                }
                
            });

            $("#slider-range-max-amount3").text($("#slider-range-max3").slider("value"));
            $("#rating_field").val($("#slider-range-max3").slider("value"));
	}
    
    function bachelors_degreesatisfaction_data(degree){
		$.ajax({
						
						//url to send the data to
						url: "http://localhost/chartdata/getdegreesatisfactiondata_bachelors",
						type: 'post',
						data: {'degree':degree},
						dataType: 'json',
						beforeSend:function(){
						//Show Autosaving div
							//autosave_notify();
						},
						complete:function(){
						
						},
						success:function(data){
							console.log(data);
								$("#chartContainer").hide(function(){
		                		//var delay=2;//1 seconds
							    //setTimeout(function(){
							    //your code to be executed after 1 seconds
							    //BEGIN My Streamwise satisfaction Chart
								//Pop the last element of data which holds the stream value
								var last = data.pop();
								$("#chartContainer2").dxPieChart({
								    dataSource: data,
								    title: last.degree+": Decision Rating Breakup",
									tooltip: {
										enabled: true,
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
										argumentField: "rating_degree_description"
									}]
								});
								// ENDS Stream Wise Satisfaction Chart
							    $("#chartContainer2").show();
							   });
		                		
		                	
								
						}
					});	
	}
    
    function bachelors_collegesatisfaction_data(college){
		$.ajax({
						
						//url to send the data to
						url: "http://localhost/chartdata/getcollegesatisfactiondata_bachelors",
						type: 'post',
						data: {'college':college},
						dataType: 'json',
						beforeSend:function(){
						//Show Autosaving div
							//autosave_notify();
						},
						complete:function(){
						
						},
						success:function(datas){
								$("#chartContainer").hide(function(){
		                		var delay=0;//1 seconds
							    setTimeout(function(){
							    //your code to be executed after 1 seconds
							    //BEGIN My Streamwise satisfaction Chart
							    //Pop the last element of data which holds the stream value
								var last = datas.pop();
								$("#chartContainer2").dxPieChart({
							    dataSource: datas,
							    title: last.college+": Decision Rating Breakup",
								tooltip: {
									enabled: true,
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
									argumentField: "rating_college_description"
								}]
								});
								// ENDS Stream Wise Satisfaction Chart
							    $("#chartContainer2").show();
							    },delay)
		                		
		                	});
								
						}
					});	
	}
	
	function bachelors_fieldsatisfaction_data(field){
		$.ajax({
						
						//url to send the data to
						url: "http://localhost/chartdata/getfieldsatisfactiondata_bachelors",
						type: 'post',
						data: {'field':field},
						dataType: 'json',
						beforeSend:function(){
						//Show Autosaving div
							//autosave_notify();
						},
						complete:function(){
						
						},
						success:function(datas){
								$("#chartContainer").hide(function(){
		                		var delay=0;//1 seconds
							    setTimeout(function(){
							    //your code to be executed after 1 seconds
							    //BEGIN My Streamwise satisfaction Chart
							    //Pop the last element of data which holds the stream value
								var last = datas.pop();
								$("#chartContainer2").dxPieChart({
							    dataSource: datas,
							    title: last.field+": Decision Rating Breakup",
								tooltip: {
									enabled: true,
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
									argumentField: "rating_field_description"
								}]
								});
								// ENDS Stream Wise Satisfaction Chart
							    $("#chartContainer2").show();
							    },delay)
		                		
		                	});
								
						}
					});	
	}
	
	/////////////////////////////////////////////////////////////////////////////     JOB   /////////////////////////////////////////////////////////////////////////////////////////////
	
	var job_streamdata = function() { 
    	
		 $.ajax({
						
						//url to send the data to
						url: "http://localhost/chartdata/getjobcategorydata_jobs",
						type: 'post',
						dataType: 'json',
						beforeSend:function(){
						//Show Autosaving div
							//autosave_notify();
						},
						complete:function(){
						
						},
						success:function(data){
								//console.log(data[2].stream);
								//Pop the last element of data which holds the stream value
								var last = data.pop();
								$("#chartContainer").dxPieChart({
							    dataSource: data,
							    title: "Breakup-"+last.degree+" Background",
								tooltip: {
									enabled: true,
									percentPrecision: 2,
									customizeText: function() { 
										return this.percentText + " of " + last.degree+" students chose " + this.originalArgument;
									}
								},
								legend: {
									horizontalAlignment: "center",
									verticalAlignment: "bottom",
									margin: 0
								},
								series: [{
									type: "doughnut",
									argumentField: "jobcategory"
								}]
								});
						}
					});		 
    }
    
    var slide5 = function(){   //////////jobcategory rating slider
		$("#slider-range-max1").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 5,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount1").text(ui.value);
                    $("#rating_category").val(ui.value);
                },
                stop: function( event, ui ) {
                	var jobcategory = $("#jobcategory").val();
                	console.log(jobcategory);
                	job_jobcategory_satisfactiondata(jobcategory);            	
                }
                
            });

            $("#slider-range-max-amount1").text($("#slider-range-max1").slider("value"));
            $("#rating_category").val($("#slider-range-max1").slider("value"));
	}
	
	var slide6 = function(){   ///////////company rating slider
		$("#slider-range-max2").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 5,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount2").text(ui.value);
                    $("#rating_company").val(ui.value);
                },
                stop: function( event, ui ) {
                	var company = $("#company").val();
                	job_company_satisfactiondata(company);            	
                }
                
            });

            $("#slider-range-max-amount2").text($("#slider-range-max2").slider("value"));
            $("#rating_company").val($("#slider-range-max2").slider("value"));
	}
	
	var slide7 = function(){   /////////////location rating slider
		$("#slider-range-max3").slider({
                isRTL: App.isRTL(),
                range: "max",
                min: 1,
                max: 5,
                value: 2,
                slide: function (event, ui) {
                    $("#slider-range-max-amount3").text(ui.value);
                    $("#rating_location").val(ui.value);
                },
                stop: function( event, ui ) {
                	var location = $("#location").val();
                	job_location_satisfactiondata(location);            	
                }
                
            });

            $("#slider-range-max-amount3").text($("#slider-range-max3").slider("value"));
            $("#rating_location").val($("#slider-range-max3").slider("value"));
	}
	
	function job_jobcategory_satisfactiondata(jobcategory){
		$.ajax({
						
						//url to send the data to
						url: "http://localhost/chartdata/get_jobcategory_satisfactiondata_jobs",
						type: 'post',
						data: {'jobcategory':jobcategory},
						dataType: 'json',
						beforeSend:function(){
						//Show Autosaving div
							//autosave_notify();
						},
						complete:function(){
						
						},
						success:function(datas){
								$("#chartContainer").hide(function(){
		                		var delay=0;//1 seconds
							    setTimeout(function(){
							    //your code to be executed after 1 seconds
							    //BEGIN My Streamwise satisfaction Chart
							    //Pop the last element of data which holds the stream value
								var last = datas.pop();
								$("#chartContainer2").dxPieChart({
							    dataSource: datas,
							    title: last.jobcategory+": Decision Rating Breakup",
								tooltip: {
									enabled: true,
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
									argumentField: "rating_jobcategory_description"
								}]
								});
								// ENDS Stream Wise Satisfaction Chart
							    $("#chartContainer2").show();
							    },delay)
		                		
		                	});
								
						}
					});	
	}
	
	function job_company_satisfactiondata(company){
		$.ajax({
						
						//url to send the data to
						url: "http://localhost/chartdata/get_company_satisfactiondata_jobs",
						type: 'post',
						data: {'company':company},
						dataType: 'json',
						beforeSend:function(){
						//Show Autosaving div
							//autosave_notify();
						},
						complete:function(){
						
						},
						success:function(datas){
								$("#chartContainer").hide(function(){
		                		var delay=0;//1 seconds
							    setTimeout(function(){
							    //your code to be executed after 1 seconds
							    //BEGIN My Streamwise satisfaction Chart
							    //Pop the last element of data which holds the stream value
								var last = datas.pop();
								$("#chartContainer2").dxPieChart({
							    dataSource: datas,
							    title: last.company+": Decision Rating Breakup",
								tooltip: {
									enabled: true,
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
									argumentField: "rating_company_description"
								}]
								});
								// ENDS Stream Wise Satisfaction Chart
							    $("#chartContainer2").show();
							    },delay)
		                		
		                	});
								
						}
					});	
	}
	
	function job_location_satisfactiondata(location){
		$.ajax({
						
						//url to send the data to
						url: "http://localhost/chartdata/get_location_satisfactiondata_jobs",
						type: 'post',
						data: {'location':location},
						dataType: 'json',
						beforeSend:function(){
						//Show Autosaving div
							//autosave_notify();
						},
						complete:function(){
						
						},
						success:function(datas){
								$("#chartContainer").hide(function(){
		                		var delay=0;//1 seconds
							    setTimeout(function(){
							    //your code to be executed after 1 seconds
							    //BEGIN My Streamwise satisfaction Chart
							    //Pop the last element of data which holds the stream value
								var last = datas.pop();
								$("#chartContainer2").dxPieChart({
							    dataSource: datas,
							    title: last.location+": Decision Rating Breakup",
								tooltip: {
									enabled: true,
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
									argumentField: "rating_location_description"
								}]
								});
								// ENDS Stream Wise Satisfaction Chart
							    $("#chartContainer2").show();
							    },delay)
		                		
		                	});
								
						}
					});	
	}
    
    return {
        streamdata_tenplustwo: function () {
        	tenplustwo_streamdata();
        },
        slider_tenplustwo: function(){
        	slide1();
        },
        streamdata_bachelors: function(){
        	bachelors_streamdata();
        },
        slider_bachelors: function(){
        	slide2();
        	slide3();
        	slide4();
        },
        jobcategory_data_job: function(){
        	job_streamdata();
        },
        slider_job: function(){
        	slide5();
        	slide6();
        	slide7();
        }
    };

}();