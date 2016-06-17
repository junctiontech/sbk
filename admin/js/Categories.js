//var base_url = 'http://www.searchb4kharch.com/'; 
if(window.location.hostname=="localhost"){
	var base_url = 'http://localhost/sbk/'; 
}
if(window.location.hostname=="junctiondev.cloudapp.net"){
	var base_url = 'http://junctiondev.cloudapp.net/sbk/'; 
}
if(window.location.hostname=="searchb4kharch.com"){
	var base_url = 'http://searchb4kharch.com/'; 
}
if(window.location.hostname=="www.searchb4kharch.com"){
	var base_url = 'http://www.searchb4kharch.com/'; 
}

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