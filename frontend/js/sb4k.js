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
	if(count>=1)
	{
		document.getElementById("compare").style.display = "block";	
		$("#productName"+count).html(s);
	}
	else
	{
		document.getElementById("compare").style.display = "none";		 
	}
    }
    });
	}return false; 	

}
function bodyload (){
	$("#body").attr("style", ""); 
}


function submit_compare(productid)
{	
var count=0;
	$(".chkcount").each(function() {				
           if($(this).prop('checked') == true){				
                count=count+1;				  
            }
 });
	if(count>=5){
		alert('checked product should not more than 4');
		return false;
	}
	else if(count>=2)
	{	
		return true;	 
	}
	else if(count==1){
				alert('please checked atleast two product');
				return false;		
	}	 
}