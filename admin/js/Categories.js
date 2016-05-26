var base_url = 'www.searchb4kharch.com/';


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