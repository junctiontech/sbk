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
function search_product(productval)

{ 
	var category = document.getElementById('select').value;
	var product =productval;//$('.select2-search__field').value;
	
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


 
