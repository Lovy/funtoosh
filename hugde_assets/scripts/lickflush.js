
//$(document).ready(function(){
	
	var loginStatus;
	var lickStatus;
	var flushStatus;
	
	//Initialize functions
	checklogin();
	
	function lick(userId,huggaId,param){
		
		//checkLickStatus(param);
		//checkFlushStatus(param);
		
		if(loginStatus=='0'){
			$('#basic').modal('show');  //show login dialog box in case on logged out
		}
		
		else{	//check if it is licked
			//lickStatus = $(this).attr('id'); //licked or notlicked
			//if(lickStatus == 1){
			if($(param).hasClass('green')){
				//decrement the lick count
				lickcnt = $(param).find('.badge-danger').text();
				lickcntInt = parseInt(lickcnt);
				updatedLickCnt = lickcntInt - 1;
				$(param).find('.badge-danger').text(updatedLickCnt);
				$(param).removeClass('green');
				$(param).addClass('default');
				$(param).next().css('opacity',1);
				//get flush count
				flushcntInt = parseInt($(param).next().find('.badge-success').text());
				//calculate home index
				//updateHomeIndex(huggaId,updatedLickCnt,flushcntInt);
				//updateTrendingIndex(huggaId);
				//update to the new lick count to server
				updateLickCount(updatedLickCnt,huggaId);
				
				//delete lick entry from the db
				deleteLick(huggaId,userId)
			}
			else{
				//if(flushStatus == 1){
				if($(param).next().hasClass('red')){
					//Do nothing
				}
				else{
					//increment the lick count
					lickcnt = $(param).find('.badge-danger').text();
					//console.log(lickcnt);
					lickcntInt = parseInt(lickcnt);
					updatedLickCnt = lickcntInt + 1;
					//console.log(updatedLickCnt);
					$(param).find('.badge-danger').text(updatedLickCnt);
					$(param).removeClass('default');
					$(param).addClass('green');
					$(param).next().css('opacity',0.3);
					//get flush count
					flushcntInt = parseInt($(param).next().find('.badge-success').text());
					//calculate home index
					updateHomeIndex(huggaId,updatedLickCnt,flushcntInt);
					//updateTrendingIndex(huggaId);	
					//update to the new lick count to server
					updateLickCount(updatedLickCnt,huggaId);
					
					//insert lick
					insertLick(huggaId,userId);
				}
			} 
		}
	}
	
	function flush(userId,huggaId,param){
		
		//checkLickStatus(userId,huggaId);
		//checkFlushStatus(userId,huggaId);
		
		if(loginStatus=='0'){
			$('#basic').modal('show');  //show login dialog box in case on logged out
		}
		
		else{	//check if it is licked
			//lickStatus = $(this).attr('id'); //licked or notlicked
			//if(flushStatus == 1){
			if($(param).hasClass('red')){
				//decrement the lick count
				flushcnt = $(param).find('.badge-success').text();
				flushcntInt = parseInt(flushcnt);
				updatedFlushCnt = flushcntInt - 1;
				$(param).find('.badge-success').text(updatedFlushCnt);
				$(param).removeClass('red');
				$(param).addClass('default');
				$(param).prev().css('opacity',1);
				//get lick count
				lickcntInt = parseInt($(param).next().find('.badge-danger').text());
				//calculate home index
				//updateHomeIndex(huggaId,lickcntInt,updatedFlushCnt);
				//updateTrendingIndex(huggaId);
				//update new flush count to the server
				updateFlushCount(updatedFlushCnt,huggaId);
				//delete flush entry from the db
				deleteFlush(huggaId,userId)
			}
			else{
				//if(lickStatus == 1){
				if($(param).prev().hasClass('green')){
					//Do nothing
				}
				else{
					//increment the flush count
					flushcnt = $(param).find('.badge-success').text();
					flushcntInt = parseInt(flushcnt);
					updatedFlushCnt = flushcntInt + 1;
					$(param).find('.badge-success').text(updatedFlushCnt);
					$(param).removeClass('default');
					$(param).addClass('red');
					$(param).prev().css('opacity',0.3);
				
					//get lick count
					lickcntInt = parseInt($(param).next().find('.badge-danger').text());
					//calculate home index
					//updateHomeIndex(huggaId,lickcntInt,updatedFlushCnt);
					//updateTrendingIndex(huggaId);
					//update new flush count to the server
					updateFlushCount(updatedFlushCnt,huggaId);
					
					//insert flush
					insertFlush(huggaId,userId);
				}
			} 
		}
	}
	
	function flagModal(){
		if(loginStatus=='0'){
			$('#basic').modal('show');  //show login dialog box in case on logged out
		}
		else{
			$('#flag').modal('show');
		}
		
	}
	
	function flag(){
		
			var temp=$("#flagForm").serialize();  //converting into string
			var huggaId;
			var oldHuggaId=$("#oldHuggaId").val();
			var flagHuggaId=$("#flagHuggaId").val();
			console.log(oldHuggaId);
			console.log(flagHuggaId);
			if(oldHuggaId=='' || oldHuggaId==NULL){
				huggaId=flagHuggaId;
				console.log(huggaId);
			}
			else{
				huggaId=oldHuggaId;
			}
			$.ajax({
				
			//url to send the data to
			url: "http://hugde.com/home/flag/"+huggaId,
			data: {'temp':temp},
			type: 'post',
			dataType: 'json',
			beforeSend:function(){
			//Show Autosaving div
				//$("#spinner").css('display','block');
			},
			complete:function(){
						
			},
			success:function(data){
				$("#flag").modal('hide');
				$('#flagResponse').modal('show');
					//window.location.replace("http://hugde.com/home");
				//console.log(a);
			}
			});
	}
	
	function checklogin(){
		
		$.ajax({
	    	url: "http://hugde.com/login/checklogin",
	    	async: false,
	    	dataType: 'json',
	    	success: function(response) {
	    		loginStatus = response.loginStatus;
	    	}
   		});		
	}
	/*
	function checkLickStatus(userId,huggaId){
		//query db
		$.ajax({
	    	url: "http://hugde.com/lickflush/checkLickStatus/"+huggaId+'/'+userId,
	    	async: false,
	    	dataType: 'json',
	    	success: function(response) {
	    		lickStatus = response.response;
	    	}
   		});	
	}
	
	function checkFlushStatus(userId,huggaId){
		//query db
		$.ajax({
	    	url: "http://hugde.com/lickflush/checkFlushStatus/"+huggaId+'/'+userId,
	    	async: false,
	    	dataType: 'json',
	    	success: function(response) {
	    		flushStatus = response.response;
	    	}
   		});	
	}
	*/
	function checkLickStatus(param){
		if($(param).hasClass('green')){
			lickStatus=1;
		}else{
			lickStatus=0;
		}
	}
	
	function checkFlushStatus(param){
		if($(param).hasClass('red')){
			flushStatus=1;
		}else{
			flushStatus=0;
		}
	}
	
	function updateLickCount(updatedLickCnt,huggaId){
		//query db
		$.ajax({
	    	url: "http://hugde.com/lickflush/updateLickCount/"+huggaId+'/'+updatedLickCnt,
	    	async: true,
	    	dataType: 'json',
	    	success: function(response) {
	    		
	    	}
   		});	
	}
	
	function updateFlushCount(updatedFlushCnt,huggaId){
		//query db
		$.ajax({
	    	url: "http://hugde.com/lickflush/updateFlushCount/"+huggaId+'/'+updatedFlushCnt,
	    	async: true,
	    	dataType: 'json',
	    	success: function(response) {
	    		
	    	}
   		});	
	}
	
	function updateHomeIndex(huggaId,licks,flushes){
		//query db
		$.ajax({
	    	url: "http://hugde.com/lickflush/updateHomeIndex/"+huggaId+'/'+licks+'/'+flushes,
	    	async: true,
	    	dataType: 'json',
	    	success: function(response) {
	    		console.log(response);
	    	}
   		});	
	}
	
	function updateTrendingIndex(huggaId){
		//query db
		$.ajax({
	    	url: "http://hugde.com/lickflush/updateTrendingIndex/"+huggaId,
	    	async: true,
	    	dataType: 'json',
	    	success: function(response) {
	    		console.log(response);
	    	}
   		});	
	}
	
	function deleteLick(huggaId,userId){
		//query db
		$.ajax({
	    	url: "http://hugde.com/lickflush/deleteLick/"+huggaId+'/'+userId,
	    	async: true,
	    	dataType: 'json',
	    	success: function(response) {
	    		
	    	}
   		});	
	}
	
	function deleteFlush(huggaId,userId){
		//query db
		$.ajax({
	    	url: "http://hugde.com/lickflush/deleteFlush/"+huggaId+'/'+userId,
	    	async: true,
	    	dataType: 'json',
	    	success: function(response) {
	    		
	    	}
   		});	
	}
	
	function insertLick(huggaId,userId){
		//query db
		$.ajax({
	    	url: "http://hugde.com/lickflush/insertLick/"+huggaId+'/'+userId,
	    	async: true,
	    	dataType: 'json',
	    	success: function(response) {
	    		
	    	}
   		});	
	}
	
	function insertFlush(huggaId,userId){
		//query db
		$.ajax({
	    	url: "http://hugde.com/lickflush/insertFlush/"+huggaId+'/'+userId,
	    	async: true,
	    	dataType: 'json',
	    	success: function(response) {
	    		
	    	}
   		});	
	}
	
	
//});
