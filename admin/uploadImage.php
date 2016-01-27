<?php
	if (isset($_POST['uploadProductImage'])){
		$product_image = $_FILES['image']['name'];
		$product_image_temp = $_FILES['image']['tmp_name'];
		move_uploaded_file($product_image_temp, "../images/products/$product_image");
	}
	if (file_exists("../images/products/$product_image")){
		header("location:menuchange.php");
	}
?>