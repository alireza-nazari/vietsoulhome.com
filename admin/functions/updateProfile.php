<?php
include "../../includes/connection.php";
if (isset($_POST['update'])) {
	$change_user_profile_query = "UPDATE users SET user_lastname = '" . $_POST['user_lastname'] . "', user_firstname = '" . $_POST['user_firstname'];
	$change_user_profile_query .= "', user_phone_no = '" . $_POST['user_phone_no'] . "', user_email = '" . $_POST['user_email'];

	//check if there is any picture upload
	if (isset($_FILES['user_img']['name'])) {
		$user_image = 'id_' . $_POST['user_ID'];
		$user_image_temp = $_FILES['user_img']['tmp_name'];
		move_uploaded_file($product_image_temp, "../../images/users/$user_image");
		$change_user_profile_query .= "', user_img = '{$user_image}";
	}
	//check if password is set
	if (!empty($_POST['user_password'])) {
		$password = md5(md5($_POST['user_email']) . $_POST['user_password']);
		$change_user_profile_query .= "', user_password = '{$password}";
	}
	$change_user_profile_query .= "' WHERE user_ID = " . $_POST['user_ID'] . ";";
	$result = mysqli_query($connection, $change_user_profile_query);
	if ($result == false) {
		die(mysqli_error($connection));
	} else {
		header('location:../profile.php');
	}
}
?>