var FormFileUpload = function () {


    return {
        //main function to initiate the module
        init: function () {

             // Initialize the jQuery File Upload widget:
            $('#fileupload').fileupload({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},                
                url: 'http://hugde-env-symvyatdmf.elasticbeanstalk.com/hugde_assets/plugins/jquery-file-upload/server/php/indexmeme.php'
            });

            // Enable iframe cross-domain access via redirect option:
            $('#fileupload').fileupload(
                'option',
                'redirect',
                window.location.href.replace(
                    /\/[^\/]*$/,
                    '/cors/result.html?%s'
                )
            );

            // Demo settings:
            $('#fileupload').fileupload('option', {
                url: 'http://hugde.com/hugde_assets/plugins/jquery-file-upload/server/php/indexmeme.php',
                // Enable image resizing, except for Android and Opera,
                // which actually support image resizing, but fail to
                // send Blob objects via XHR requests:
                /*
                disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator.userAgent),*/
                disableImageResize: false,
                maxFileSize: 5000000,
                imageQuality: 100,
                //imageMaxWidth: 493,
                imageMinWidth: 493,
                singleFileUploads: false,
                //maxNumberOfFiles: 1,
                limitMultiFileUploads:1,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                submit:function(e,data){
                	data.formData = $('#fileupload').serializeArray();
                }
            }).on('fileuploaddone', function (e, data) {
            	var filesresult = data.result;
            	var nexturl = filesresult.files[0].url;
            	console.log(nexturl);
            	console.log(filesresult);
			    var nexturl='http://hugde.com/memes/createhugga?t='+nexturl;
			    window.location.replace(nexturl);
			});

                // Upload server status check for browsers with CORS support:
            if ($.support.cors) {
                $.ajax({
                    url: 'http://hugde.com/hugde_assets/plugins/jquery-file-upload/server/php/indexmeme.php',
                    type: 'HEAD'
                }).fail(function () {
                    $('<div class="alert alert-danger"/>')
                        .text('Upload server currently unavailable - ' +
                                new Date())
                        .appendTo('#fileupload');
                });
            }
            
            ////////////////////

            // Initialize the jQuery File Upload widget:
            $('#fileupload').fileupload({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
                autoUpload: false,
                url: 'http://hugde.com/hugde_assets/plugins/jquery-file-upload/server/php/indexmeme.php'
            });

            // initialize uniform checkboxes  
            App.initUniform('.fileupload-toggle-checkbox');
        },
        
    };

}();


