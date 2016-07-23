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


function compare_product(productid)
{	
var count=0;
	$(".chkcount").each(function() {				
           if($(this).prop('checked') == true){				
                count=count+1;				
            }
 });
	var pro_id=productid;	
	if ( pro_id !=='')
	{ 
    $.ajax({
    type: "POST",
	data:{ productid : pro_id },	
    url: base_url+'Landingpage/fetchdata_compare_product',  
    cache: false,
    success: function(s)
    {
	document.getElementById("compare").style.display = "block";	
    $("#productName"+count).html(s);
    }
    });
	}return false; 	
}
function bodyload (){
	$("#body").attr("style", ""); 
}
