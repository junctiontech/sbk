if(window.location.hostname=="localhost"){
	var base_url = 'http://localhost/sbk/'; 
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
	var product =productval;var unmapped='';
	if($('#unmapped').prop('checked') == true) { 
		unmapped = document.getElementById('unmapped').value;
	}
	
	if(product !==''  && category !=='')
	{
    $.ajax({
    type: "POST",
    url: base_url+"Product/search_product",
  	data:{productName:product, categoryName:category, unmapped:unmapped},

    cache: false,
    success: function(html)
    {
	$("#productName").empty().append(html);
    }
    });
}return false;  	  


}

function getproductimage(productID,parentname)
{ 
		$("#loader").fadeIn();
		var productID =productID;
		var categoryID = document.getElementById('select').value;
		if(productID !=='')
		{
			$.ajax({
				type: "POST",
				url: base_url+"Product/getproductimage",
				data:{productID:productID,categoryID:categoryID,parentname:parentname},

				cache: false,
				success: function(html)
				{
				$("#showimage").html(html);
				$("#loader").fadeOut();
				}
			});
		}else{
			alert("Invalid request!!");
			$("#loader").fadeOut();
		}
	return false;  	  
}

function getProductToMapp(productID,keyword)
{ 
		$("#loader").fadeIn();
		if(keyword=='keyword'){
			var productID =productID;
		}else{
			var productID =document.getElementById('productName').value;
		}
		var categoriesID=document.getElementById('select').value;
		if(productID !=='' && categoriesID !='')
		{
			$.ajax({
				type: "POST",
				url: base_url+"Product/getProductToMapp",
				data:{productID:productID,categoriesID:categoriesID,keyword:keyword},

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

function addkeywords(){
	
	$('.searchhidden').empty();
	$('.searchhidden').html('<label for="tagsinput-1" class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Filter search</label><div class="col-md-6 col-sm-6 col-xs-12 content"><input id="tags_1" data-role="tagsinput" name="filtersearch" type="text" class="tags form-control" value="" placeholder="add or remove"/></div>');
	
	var productName= $("#productName option:selected").text();
	var productName= productName.replace(",","");
	var productsplitname=productName.split(' ');
	
	document.getElementById('tags_1').value='';
	document.getElementById('tags_1').value=productsplitname;
	
	$('#tags_1').tagsInput({
        width: 'auto',
		'defaultText':'add key',
		'onAddTag':onAddTag,
		'onRemoveTag':onRemoveTag
					
    });
}

function getProductToMappSnapdeal(productID,keyword)
{ 
		$("#loader").fadeIn();
		if(keyword=='keyword'){
			var productID =productID;
		}else{
			var productID =document.getElementById('productName').value;
		}
		var categoriesID=document.getElementById('select').value;
		if(productID !=='' && categoriesID !='')
		{
			$.ajax({
				type: "POST",
				url: base_url+"Product/getProductToMappSnapdeal",
				data:{productID:productID,categoriesID:categoriesID,keyword:keyword},

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

function search_flipkart(productID,keyword)
{ 
		$("#loader").fadeIn();
		$("#dynamicheading").html("Flipkart product");
		var productID =productID;
		var categoriesID=document.getElementById('select').value;
		if(productID !=='' && categoriesID !='')
		{
			$.ajax({
				type: "POST",
				url: base_url+"Product/getProductToMappFlipkart",
				data:{productID:productID,categoriesID:categoriesID,keyword:keyword},

				cache: false,
				success: function(html)
				{
				$("#mappedproduct").html(html);
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
						getProductToMappSnapdeal();
					}else{
						alert(html);
					}
				//$("#loader").fadeOut();
				}
			});
		}else{
			alert("Invalid request!!");
			$("#loader").fadeOut();
		}
	return false;  	  
}

function mapp_parent_to_child()
{ 
		$("#loader").fadeIn();
		
		var productID='';var childproductID =[];
		
		 $(".parent1").each(function() {
			
			if($(this).prop('checked') == true){
				
				productID=this.value;
			}
			
         });
		 
		 $(".child").each(function() {
			
			if($(this).prop('checked') == true){
				
				childproductID.push(this.value);
			}
			
         });
		 
		if(productID !==''  && childproductID !='')
		{
			$.ajax({
				type: "POST",
				url: base_url+"Product/mapp_parent_to_child",
				data:{productID:productID,childproductID:childproductID},

				cache: false,
				success: function(html)
				{
					if(html=='success'){
						
						$('#'+productID).css('display','none');
						$('.'+productID).attr('checked',false);
						$.each(childproductID,function(i){
						  $('#'+childproductID[i]).css('display','none');
						  $('.'+childproductID[i]).attr('checked',false);
						});
						
						$("#loader").fadeOut();
					}else{
						$("#loader").fadeOut();
						alert(html);
					}
				//$("#loader").fadeOut();
				}
			});
		}else{
			$("#loader").fadeOut();
			alert("Invalid request!!");
			
		}
		$('#toTop1').css('display','none');
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
						$('#'+productID).css('display','none');
						
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


 
