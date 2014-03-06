
//$(document).ready(function(){
	
	var loginStatus;
	var lickStatus;
	var flushStatus;
	
	//Initialize functions
	checklogin();
	
	function lick(userId,huggaId,param){
		
		//checkLickStatus(userId,huggaId);
		//checkFlushStatus(userId,huggaId);
		
		if(loginStatus==false){
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
				//update to the new lick count to server
				updateLickCount(updatedLickCnt,huggaId);
				
				//delete lick entry from the db
				deleteLick(huggaId,userId)
			}
			else{
				//if(flushStatus == 1){
				if($(param).hasClass('red')){
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
		
		if(loginStatus==false){
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
				//update new flush count to the server
				updateFlushCount(updatedFlushCnt,huggaId);
				//delete flush entry from the db
				deleteFlush(huggaId,userId)
			}
			else{
				//if(lickStatus == 1){
				if($(param).hasClass('green')){
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
					//update new flush count to the server
					updateFlushCount(updatedFlushCnt,huggaId);
					
					//insert flush
					insertFlush(huggaId,userId);
				}
			} 
		}
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
