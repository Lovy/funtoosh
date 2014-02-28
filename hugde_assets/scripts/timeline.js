var timeline = function () {

    var oncontinuepress = function(nodename) {
       var a;

		$.ajax({
		   url: "http://localhost/signup/transfermain",
		   data: {'nodename':nodename},
		   type: 'post',
		   success: function(data){
		     console.log("PrevNode data sent")
		   }
		 });	
    }
    
    return {
        oncontinue: function(nodename){
        	oncontinuepress(nodename);	
        }
    };

}();