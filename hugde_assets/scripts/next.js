
	function onclicknext(huggaId,userId){
		$.ajax({
	    	url: "http://hugde.com/home/next/"+huggaId+'/'+userId,
	    	async: false,
	    	dataType: 'json',
	    	beforeSend:function(){
	    		el = document.getElementById('huggaContent');
				blockUI(el);
			},
			complete:function(){
				el = document.getElementById('huggaContent');
				unblockUI(el);			
			},
	    	success: function(response) {
	    		//console.log(response);
	    		var view = {
		          huggaId : response.huggaId,
		          userId: response.userId,
		          title: response.title,
		          flushes: response.flushes,
		          postedBy: response.postedBy,
		          views: response.views,
		          originalImageUrl: response.images.originalImageUrl,
		          licks : response.licks
		        };
	    		var template = $('#personTpl').html();
    			var html = Mustache.render(template, view);
    			console.log(html);
    			$('#huggaContent').html(html);
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
                message: '<img src="http://hugde.com/hugde_assets/img/ajax-loading.gif" align="">',
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

