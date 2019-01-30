$('document').ready(function(){

    $("#file-4").fileinput({
   		 uploadUrl: "file/upload", // server upload action
   		 allowedFileExtensions:['jpg','png','gif'],
    	 uploadAsync: true,
   		 maxFileCount: 5
	});

});
