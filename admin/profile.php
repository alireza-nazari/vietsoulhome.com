<?php include "includes/a_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/a_navigation.php";?>
<?php
if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	$query = "SELECT * FROM users WHERE user_email = '{$email}';";
	$user_profile_query = mysqli_query($connection, $query);
	$count = mysqli_num_rows($user_profile_query);
	if ($count != 1) {
		die("Database Error....");
	} else {
		$row = mysqli_fetch_assoc($user_profile_query);
	}

}
?>
        <div id="page-wrapper">

            <div class="container">

                <!-- Page Heading -->
                <div class="row">
                    <h1 class="page-header">
                        Profile
                        <small>Change your profile</small>
<?php
if (file_exists('../images/users/' . $row['user_img'])) {
	echo '<img src="../images/users/' . $row['user_img'] . '">';
}

?>
                    </h1>
<div class="col-lg-12">
            <form class="form-horizontal" method="POST" action="functions/updateProfile.php" enctype="multipart/form-data">
            <fieldset>
            <!-- Update Form -->
            <!-- Hidden input -->
            <input type="hidden" name="user_ID" value="<?php echo $row['user_ID']; ?>" />
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label">ID: <?php echo $row['user_ID']; ?></label>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="fname">First name:</label>
              <div class="controls">
                <input id="fname" name="user_firstname" class="form-control" type="text" class="input-large" required value="<?php echo $row['user_firstname']; ?>">
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="lname">Last name:</label>
              <div class="controls">
                <input id="lname" name="user_lastname" class="form-control" type="text" class="input-large" required value="<?php echo $row['user_lastname']; ?>">
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="email">Email:</label>
              <div class="controls">
                <input id="email" name="user_email" class="form-control" type="email" class="input-large" required value="<?php echo $row['user_email']; ?>">
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="phone">Phone:</label>
              <div class="controls">
                <input id="phone" class="form-control phone" name="user_phone_no" type="tel" placeholder="(800) 000-0000" class="input-large" required value="<?php echo $row['user_phone_no']; ?>">
              </div>
            </div>
            <!-- Image input-->
            <div class="control-group">
              <label class="control-label" for="img">Picture Profile</label>
              <div class="controls">
                <input id="img" name="user_img" type="file">
              </div>
            </div>
            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input id="password" name="user_password" class="form-control" type="password" placeholder="********" class="input-large">
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="update"></label>
              <div class="controls">
                <button id="update" name="update" class="btn btn-info">Update Profile</button>
              </div>
            </div>
            </fieldset>
            </form>

                <hr>
</div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/a_footer.php";?>