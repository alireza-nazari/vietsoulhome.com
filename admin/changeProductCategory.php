<?php
	include "includes/a_header.php";
	if (isset($_GET['product_ID'])){
		$_GET['cat_ID'] = intval($_GET['cat_ID']);
		$_GET['product_ID'] = intval($_GET['product_ID']);
		$change_cat_query = "UPDATE products SET cat_ID = ".$_GET['cat_ID']." WHERE product_ID = ".$_GET['product_ID'].";";
		$result = mysqli_query($connection, $change_cat_query);
		if ($result == false){
			die(mysqli_error($connection));
		}
		else {
			header('location:menuchange.php');
		}
		
	}
?>