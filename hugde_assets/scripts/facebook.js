
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '226343797569469',
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));


	function fblogin(){
		FB.login(function(response) {
		    if (response.authResponse=='connected') {
		        // The person logged into your app
		        getData();
		    } else {
		        // The person cancelled the login dialog
		    }
		});
	}
  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function getData() {
    FB.api('/me?fields=email,name,picture', function(response) {
    	//send data through ajax
    	$.ajax({
						
						//url to send the data to
						url: "http://hugde.com/fblogin/facebook",
						async:false,
						data: {'response':response},
						type: 'post',
						dataType: 'json',
						beforeSend:function(){
						//Show Autosaving div
							$("#spinner").css('display','block');
						},
						complete:function(){
							window.location.href("http://hugde.com/home");
						},
						success:function(data){
							console.log("success");
							return 1;
						}
				});
     //console.log(response);
    });   
  }
   
  function logout(){
  	FB.logout(function(response) {
        // Person is now logged out
        console.log('Logged out');
    });
  }
