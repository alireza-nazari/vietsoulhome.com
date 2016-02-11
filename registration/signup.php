<?php include "header.php"; ?>
<?php include "connection.php"; ?>
<body>
<div class="container" style="margin-top: 3em; text-align: center;">
<?php
	// Create variable with sql-injection prevention
	$lName = mysqli_real_escape_string($connection, $_POST['lname']);
	$fName = mysqli_real_escape_string($connection, $_POST['fname']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = md5(md5($_POST['email']).$_POST['password']);
	$phone = mysqli_real_escape_string($connection, $_POST['phone']);
	$hash = md5(md5($email).'ductruongweb.com'); //for email activation

	$table = "users";

	$checkquery = "SELECT * FROM $table WHERE user_email='{$email}'";
	$result = mysqli_query($connection, $checkquery);
	$count = mysqli_num_rows($result);

	if ($count != 0){
		echo "This email is already registered. Please try a different email!";
		header ("refresh:5; ../");
	}
	else {
		$query = "INSERT INTO $table (user_lastname, user_firstname, user_email, user_password, user_phone_no, user_hash, user_role) VALUES ('$lName', '$fName', '$email', '$password', '$phone', '$hash', 4)";
		$result = mysqli_query($connection, $query);
		if($result){
			echo "Registered succesfully. Please check your email to activate the account and enjoy the website.";
			header("refresh:5; ../");
		}
	}

	//mail password confirmation
	
	$homepage = "http://localhost/vietsoulhome";
	$to      = $email; // Send email to our user
	$subject = 'Signup | Verification'; // Give the email a subject 
	$message = '
	
	Thanks for signing up!
	Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
	 
	------------------------
	Email: '.$email.'
	Password: '.$_POST['password'].'
	------------------------
	 
	Please click this link to activate your account:
	'.$homepage.'/includes/verify.php?email='.$email.'&hash='.$hash.'
	 
	'; // Our message above including the link
	                     
	$headers = 'From:noreply@ductruongweb.com' . "\r\n"; // Set from headers
	mail($to, $subject, $message, $headers); // Send our email
?>
</div>
</body>
</html>