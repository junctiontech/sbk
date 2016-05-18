var base_url = '/sbk/';


function Categories_Map()
{ 
				var value=	$("#categoriesID option:selected").text();
	$.ajax({
				type: "POST",
				url : base_url+'Categories/Categories_Map',
				data: {categoriesID: value },
			})	
				.done(function(msg){
					
					$('#mySelect').html(msg);					
					
					return false;	
				});
		
		return false;
}