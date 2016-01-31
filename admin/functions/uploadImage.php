<?php
	include "../../includes/connection.php";
	if (isset($_POST['uploadProductImage'])){
		$product_image = $_FILES['image']['name'];
		$product_image_temp = $_FILES['image']['tmp_name'];
		move_uploaded_file($product_image_temp, "../../images/products/$product_image");

		if (isset($_POST['product_ID'])){
			$query = "UPDATE products SET product_img = '".$product_image."' WHERE product_ID = ".$_POST['product_ID'].";";
			$result = mysqli_query($connection, $query);
			if ($result)
				if (file_exists("../../images/products/$product_image"))
					header("location:../menuchange.php");
		}
	}
	
	if (isset($_POST['deleteProductImage'])){
		$query = "UPDATE products SET product_img = '' WHERE product_ID = ".$_POST['product_ID'].";";
		$result = mysqli_query($connection, $query);
		if ($result)
			header("location:../menuchange.php");
	}
?>