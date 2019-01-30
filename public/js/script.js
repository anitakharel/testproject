 $(document).ready(function() {
	
	$("#RemoveImage").click(function(){  
		var image_name = $(this).attr('data-image-name');
		var id =  $(this).attr('data-id');
		var link = $(this).attr('data-link');
		//alert(image_name);
		$.ajax({
			type: "POST",
			url: link,
			data: {image_name:image_name, id:id },
			dataType: "text",
			success: function(response){
				//alert(response);
				$('.img-show').hide();
				$('.img-div').show();
			}
		}); 
	});

}); 