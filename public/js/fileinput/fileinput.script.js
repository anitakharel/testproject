$('document').ready(function(){

    $("#file-4").fileinput({
   		 uploadUrl: "News/imageadd", // server upload action
   		 allowedFileExtensions:['jpg','png','gif'],
    	 uploadAsync: true,
   		 maxFileCount: 1
	});

});
