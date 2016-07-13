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
if(window.location.hostname=="192.168.1.151"){
	var base_url = 'http://192.168.1.151/sbk/'; 
}
function search_product(productval)
{ 
	var category = document.getElementById('select').value;
	var product =productval;
	
	if(product !==''  && category !=='')
	{
    $.ajax({
    type: "POST",
    url: "search_product",
  	data:{productName:product, categoryName:category},

    cache: false,
    success: function(html)
    {// alert(html);
    $("#productName").html(html);
    }
    });
}return false;  	  


}

function getproductimage(productID)
{ 
		$("#loader").fadeIn();
		var productID =productID;
		var categoryID = document.getElementById('select').value;
		if(productID !=='')
		{
			$.ajax({
				type: "POST",
				url: base_url+"Product/getproductimage",
				data:{productID:productID,categoryID:categoryID},

				cache: false,
				success: function(html)
				{
				$("#showimage").html(html);
				//$("#loader").fadeOut();
				}
			});
		}else{
			alert("Invalid request!!");
			$("#loader").fadeOut();
		}
	return false;  	  
}

function getProductToMapp(productID)
{ 
		$("#loader").fadeIn();
		var productID =document.getElementById('productName').value;
		var categoriesID=document.getElementById('select').value;
		if(productID !=='' && categoriesID !='')
		{
			$.ajax({
				type: "POST",
				url: base_url+"Product/getProductToMapp",
				data:{productID:productID,categoriesID:categoriesID},

				cache: false,
				success: function(html)
				{
				$("#unmappedproduct").html(html);
			//	$("#loader").fadeOut();
				}
			});
		}else{
			alert("Invalid request!!");
			$("#loader").fadeOut();
		}
	return false;  	  
}

function getProductToMappSnapdeal(productID)
{ 
		$("#loader").fadeIn();
		var productID =document.getElementById('productName').value;
		var categoriesID=document.getElementById('select').value;
		if(productID !=='' && categoriesID !='')
		{
			$.ajax({
				type: "POST",
				url: base_url+"Product/getProductToMappSnapdeal",
				data:{productID:productID,categoriesID:categoriesID},

				cache: false,
				success: function(html)
				{
				$("#unmappedproductsnapdeal").html(html);
				$("#loader").fadeOut();
				}
			});
		}else{
			alert("Invalid request!!");
			$("#loader").fadeOut();
		}
	return false;  	  
}

function getMappedProduct(productID)
{ 
		$("#loader").fadeIn();
		var productID =document.getElementById('productName').value;
		if(productID !=='' )
		{
			$.ajax({
				type: "POST",
				url: base_url+"Product/getMappedProduct",
				data:{productID:productID},

				cache: false,
				success: function(html)
				{
				$("#mappedproduct").html(html);
				//$("#loader").fadeOut();
				}
			});
		}else{
			alert("Invalid request!!");
			$("#loader").fadeOut();
		}
	return false;  	  
}

function mappit(childproductID)
{ 
		$("#loader").fadeIn();
		var childproductID =childproductID;
		var productID=document.getElementById('productName').value;
		if(productID !==''  && childproductID !='')
		{
			$.ajax({
				type: "POST",
				url: base_url+"Product/mappit",
				data:{productID:productID,childproductID:childproductID},

				cache: false,
				success: function(html)
				{
					if(html=='success'){
						getProductToMapp();
						getMappedProduct();
					}else{
						alert(html);
					}
				$("#loader").fadeOut();
				}
			});
		}else{
			alert("Invalid request!!");
			$("#loader").fadeOut();
		}
	return false;  	  
}

function unmappit(mappedproductID,productID)
{ 
		$("#loader").fadeIn();
		var mappedproductID =mappedproductID;
		if(mappedproductID !=='' )
		{
			$.ajax({
				type: "POST",
				url: base_url+"Product/unmappit",
				data:{mappedproductID:mappedproductID,productID:productID},

				cache: false,
				success: function(html)
				{
					if(html=='success'){
						getProductToMapp();
						getMappedProduct();
					}else{
						alert(html);
					}
				$("#loader").fadeOut();
				}
			});
		}else{
			alert("Invalid request!!");
			$("#loader").fadeOut();
		}
	return false;  	  
}

function inactiveproduct(productID)
{ 
		$("#loader").fadeIn();
		var productID =productID;
		if(productID !=='' )
		{
			$.ajax({
				type: "GET",
				url: base_url+"Product/inactiveproduct/Inactive/"+productID,
				//data:{productID:productID},

				cache: false,
				success: function(html)
				{
					if(html=='success'){
						getProductToMapp();
						getMappedProduct();
					}else{
						alert(html);
					}
				$("#loader").fadeOut();
				}
			});
		}else{
			alert("Invalid request!!");
			$("#loader").fadeOut();
		}
	return false;  	  
}

$(document).ready(function(){
	  
				$(document).on('keyup', '.select2-search__field', function() { 
				search_product(this.value);
				});
				
			});

function chooseattribute(x){
	
	if (typeof x =='undefined'){
	var id=0;
	
	}
	else {
		id=x;

	}

	var category= document.getElementById('select').value;
		if( category !=='' )
	{ 
    $.ajax({
    type: "POST",
    url: base_url+'Product/chooseattribute',
  	data:{categoriesID:category},

    cache: false,
    success: function(html)
    { //alert(html);
    $("#productAttributeLabel"+id).html(html);
    }
    });
	
}

return false;  	  

}

function selectAll(source)

{  alert('hi');die;
		checkboxes = document.getElementsByName('mapped_value[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
	

}

 

var counter = 1;
var limit = 30;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "lable " + (counter + 1) + " <br><input type='text' name='myInputs[]'>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}


 
