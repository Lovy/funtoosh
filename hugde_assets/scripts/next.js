
	function onclicknext(huggaId,userId){
		$.ajax({
	    	url: "http://d2nds2wyuzde9r.cloudfront.net/home/next/"+huggaId+'/'+userId,
	    	async: false,
	    	dataType: 'json',
	    	beforeSend:function(){
	    		var loader='<img src="http://d2nds2wyuzde9r.cloudfront.net/hugde_assets/img/longLoader.gif" >';
	    		$('#huggaContent').html(loader);
	    		//el = document.getElementById('huggaContent');
				//blockUI(el);
			},
			complete:function(){
				//el = document.getElementById('huggaContent');
				//unblockUI(el);			
			},
	    	success: function(response) {
	    		checklogin();
	    		if(response[0]['lick']['licked']==1 && loginStatus==1){
	    			licktype="green";
	    		}
	    		else{
	    			licktype="default";
	    		}
	    		if(response[0]['flush']['flushed']==1 && loginStatus==1){
	    			flushtype="red";
	    		}
	    		else{
	    			flushtype="default";
	    		}
	    		var view = {
		          huggaId : response[0]['huggaId'],
		          userId: response[0]['userId'],
		          title: response[0]['title'],
		          flushes: response[0]['flushes'],
		          postedBy: response[0]['postedBy'],
		          views: response[0]['views'],
		          originalImageUrl: response[0]['images'][0]['originalImageUrl'],
		          licks : response[0]['licks'],
		          licktype:licktype,
		          flushtype:flushtype
		        };
	    		var template = $('#personTpl').html();
    			var html = Mustache.render(template, view);
    			//console.log(html);
    			$('#huggaContent').html(html);
    			try{
				        FB.XFBML.parse();
				        twttr.widgets.load(); 
				    }catch(ex){}
	    		//loginStatus = response.loginStatus;
	    	}
   		});	
	}
	
	// wrapper function to  block element(indicate loading)
        function blockUI(el, centerY) {
            var el = jQuery(el);
            if (el.height() <= 400) {
                centerY = true;
            }
            el.block({
                message: '<img src="http://d2nds2wyuzde9r.cloudfront.net/hugde_assets/img/ajax-loading.gif" align="">',
                centerY: centerY != undefined ? centerY : true,
                css: {
                    top: '10%',
                    border: 'none',
                    padding: '2px',
                    backgroundColor: 'none'
                },
                overlayCSS: {
                    backgroundColor: '#000',
                    opacity: 0.05,
                    cursor: 'wait'
                }
            });
        }

        // wrapper function to  un-block element(finish loading)
        function unblockUI(el) {
            jQuery(el).unblock({
                onUnblock: function () {
                    jQuery(el).removeAttr("style");
                }
            });
        }

