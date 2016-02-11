<?php include "header.php"; ?>
<?php include "../includes/connection.php"; ?>
<?php
	session_start();
	if (isset($_POST['login'])){
		echo $email = $_POST['email'];
		echo $password = $_POST['password'];
		// sql-injection prevention
		$email = mysqli_real_escape_string($connection, $email);
		$password = mysqli_real_escape_string($connection, $password);
		// masquerade password
		$password = md5(md5($_POST['email']).$password);
		
		$query = "SELECT * FROM users WHERE user_email = '{$email}' AND user_password = '{$password}';";
		$select_user_query = mysqli_query($connection, $query);

		if (!$select_user_query)
			die ("Fail query ".mysqli_error($connection));

		$count = mysqli_num_rows($select_user_query);
		$row = mysqli_fetch_assoc($select_user_query);
		$role = $row['user_role'];
		if ($count == 1){
			$_SESSION['email'] = $email;
			$_SESSION['firstname'] = $row['user_firstname'];
			$_SESSION['lastname'] = $row['user_lastname'];
			$_SESSION['phone'] = $row['user_phone_no'];
			$_SESSION['img'] = $row['user_img'];
			$_SESSION['role'] = $row['user_role'];
			switch ($role) {
				case 1:
					header ("location: ../admin");
					break;
				case 2:
					header ("location: ../employee");
					break;
				case 3:
					header ("location: ../");
					break;
				case 4:
					echo "You're not activated. Please check your email to activate your account...";
					header ("refresh:5; ../");
					break;
				default:
					# code...
					break;
			}

		} else {
			echo "Wrong Email or Password. Please wait to redirect back to main page...";
			header ("refresh:5; ../");
		}
	}
?>