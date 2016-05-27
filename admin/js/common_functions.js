//var base_url="http://"+window.location.hostname+':'+location.port+"/sbk/";
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
function get_products_by_cat(categoryID)
{ 
	$.ajax({
				type: "POST",
				url : base_url+'Inventory/get_products_by_cat',
				data: {categoryID: categoryID  },
				beforeSend: function() {
				$("#loader").fadeIn();
			}
			})	
				.done(function(msg){
					$("#loader").fadeOut();
					$('#inventoryunit').html(msg);
					return false;	
				});
		
		return false;
}