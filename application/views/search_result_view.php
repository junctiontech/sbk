<html>
<head>
<title>Search example</title>
</head>
<body>
<ul>
<?php  /* print_r($results); die; */ foreach($results as $result):?>
<li><?php echo $result->productName;?></li>
<li><?php echo $result->categoriesUrlKey;?></li>
<li><?php echo $result->productDescription;?></li>
<li><?php echo $result->productsUrlKey;?></li>
<li><?php echo $result->productAttributeLable;?></li>
<li><?php echo $result->productAttributeValue;?></li>
<li><?php echo $result->imageName;?></li>
<li><?php echo $result->productPrice;?></li>
<?php endforeach;?>
</ul>
</body>

</html>