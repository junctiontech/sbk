function search_product(productval='')

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
 $(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div class="col-md-3"></div><div class="col-md-3 col-sm-3 col-xs-12" ><input autocomplete="off" class="form-control col-md-5 col-xs-12"  name="productAttributeLabel[]" type="text" placeholder="Label" required="required"  data-items="8"/></div><div class="col-md-3 col-sm-3 col-xs-12"  ><input autocomplete="off" class="form-control col-md-5 col-xs-12"  name="productAttributeValue[]" type="text" placeholder="value" required="required"  data-items="8"/></div>';
        var newInput = $(newIn);
		
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
		
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
	
 });

 

