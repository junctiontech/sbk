//var base_url="http://"+window.location.hostname+':'+location.port+"/sbk/";
var base_url = 'www.searchb4kharch.com/'; 
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