var base_url = '/sbk/';


function Get_categoryurl()
{  
				var value=	$("#categoriesID option:selected").text();
	$.ajax({
				type: "POST",
				url : base_url+'Subcategories/Get_categoryurl',
				data: {categoriesID: value },
			})	
				.done(function(msg){
				
					$('#mySelect').html(msg);					
					
					return false;	
				});
		
		return false;
}