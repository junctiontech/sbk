//var base_url = 'http://www.searchb4kharch.com/'; 
if(window.location.hostname=="localhost"){
	var base_url = 'http://localhost/sbk/'; 
}
if(window.location.hostname=="192.168.1.151"){
	var base_url = 'http://192.168.1.151/sbk/'; 
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
function Deal_category()
{  
				var value=	$("#dealIDs option:selected").text();
				//alert(value);
	$.ajax({
				type: "POST",
				data: {dealID: value },				
				url : base_url+'Deals/Get_data_bycategory',				
			})	
				.done(function(msg){
					//alert(msg);
					$('#mydropdown').html(msg);
					// $("#mydropdown").prop("disabled", false);
					return false;	
				});		
		return false;
}