$(document).ready(function(){
	var pagesLoaded = 1; //1st page already loaded during intitialization
	var totalHuggas;
	var loading = false;
	$.ajax({
		url:"http://hugde.com/home/totalhuggas",
		async:false,
		dataType:"json",
		success:function(data){
			totalHuggas = data[0].count;
		}
		
	});
	var huggasPerPage = 1;
	//console.log(totalHuggas);
	var totalPages = Math.round(parseInt(totalHuggas)/parseInt(huggasPerPage));
	//console.log(totalPages);
	
	function getDocHeight() {
    var D = document;
    return Math.max(
        Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
        Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
        Math.max(D.body.clientHeight, D.documentElement.clientHeight)
    );
	}
	  
    $(window).scroll(function() { //detect page scroll
        
        if($(window).scrollTop() + $(window).height() >= getDocHeight())  //user scrolled to bottom of the page?
        {
            console.log("Autoscroll called");
            if(pagesLoaded < totalPages && loading==false) //there's more data to load
            {
                loading = true; //prevent further ajax loading
                //$('.animation_image').show(); //show loading image
                
                //load data from the server using a HTTP POST request
                $.post('http://hugde.com/home/autoload',{'HPP': huggasPerPage,'PN':pagesLoaded+1}, function(data){
                                    
                    $(".article-block").append(data); //append received data into the element
					try{
				        FB.XFBML.parse();
				        twttr.widgets.load(); 
				    }catch(ex){}
                    //hide loading image
                    $('.animation_image').hide(); //hide loading image once data is received
                    
                    pagesLoaded++; //loaded group increment
                    loading = false; 
                
                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                    
                    alert(thrownError); //alert with HTTP error
                    $('.animation_image').hide(); //hide loading image
                    loading = false;
                
                });
                
            }
        }
   
	});
});
