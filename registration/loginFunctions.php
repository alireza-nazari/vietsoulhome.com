<?php include "header.php";?>
<?php include "../includes/connection.php";?>
<div class="container" style="margin-top: 3em; text-align: center; font-size: 1.5em;">
<?php
session_start();
if (isset($_POST['login'])) {
	// sql-injection prevention
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	// masquerade password
	$password = md5(md5($email) . $password);

	$query = "SELECT * FROM users WHERE user_email = '{$email}' AND user_password = '{$password}';";
	$select_user_query = mysqli_query($connection, $query);

	if (!$select_user_query) {
		die("Fail query " . mysqli_error($connection));
	}

	$count = mysqli_num_rows($select_user_query);
	$row = mysqli_fetch_assoc($select_user_query);
	$role = $row['user_role'];
	if ($count == 1) {
		$_SESSION['email'] = $email;
		$_SESSION['firstname'] = $row['user_firstname'];
		$_SESSION['lastname'] = $row['user_lastname'];
		$_SESSION['phone'] = $row['user_phone_no'];
		$_SESSION['img'] = $row['user_img'];
		$_SESSION['role'] = $row['user_role'];
		switch ($role) {
		case 1:
			header("location: ../admin");
			break;
		case 2:
			header("location: ../employee");
			break;
		case 3:
			header("location: ../");
			break;
		case 4:
			echo "You're not activated. Please check your email to activate your account...";
			session_unset();
			session_destroy();
			header("refresh:5; ../");
			break;
		default:
			# code...
			break;
		}

	} else {
		echo "Wrong Email or Password. Please wait to redirect back to main page...";
		header("refresh:5; ../");
	}
}
?>

</div>
</body>
</html>