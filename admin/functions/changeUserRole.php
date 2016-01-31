<?php
include "../../includes/connection.php";
if (isset($_GET['user_ID'])){
	$query = "UPDATE users SET user_role = ".$_GET['role_ID']." WHERE user_ID = ".$_GET['user_ID'].";";
	$result = mysqli_query($connection, $query);
	if ($result == false){
			die(mysqli_error($connection));
		}
		else {
			header('location:../user.php');
		}
}
?>