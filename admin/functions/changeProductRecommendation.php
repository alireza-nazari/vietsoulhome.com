<?php
	include "../../includes/connection.php";
	if (isset($_GET['product_ID'])){
		$product_ID = intval($_GET['product_ID']);
		$product_recommend = intval($_GET['product_recommend']);
		$recommend_query = "UPDATE products SET product_recommend = ".$product_recommend." WHERE product_ID = ".$product_ID.";";
		$result = mysqli_query($connection, $recommend_query);
		if ($result == false){
			die(mysqli_error($connection));
		}
		else {
			header('location:../menuchange.php');
		}
		
	}
?>