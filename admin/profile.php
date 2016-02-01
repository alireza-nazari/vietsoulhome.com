<?php include "includes/a_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/a_navigation.php"; ?>
<?php
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $query = "SELECT * FROM users WHERE user_email = '{$email}';";
        $user_profile_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($user_profile_query);
        if ($count != 1)
            die ("Database Error....");
        else $row = mysqli_fetch_assoc($user_profile_query);
    }
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <h1 class="page-header">
                        Profile
                        <small>Change your profile</small>
                        <img src="../images/users/<?php echo $row['user_img'];?>">
                    </h1>
<div class="col-lg-12">
            <form class="form-horizontal" method="POST" action="functions/updateProfile.php" enctype="multipart/form-data">
            <fieldset>
            <!-- Update Form -->
            <!-- Hidden input -->
            <input type="hidden" name="user_ID" value="<?php echo $row['user_ID'];?>" />
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label">ID: <?php echo $row['user_ID'];?></label>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="fname">First name:</label>
              <div class="controls">
                <input id="fname" name="user_firstname" class="form-control" type="text" class="input-large" required value="<?php echo $row['user_firstname'];?>">
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="lname">Last name:</label>
              <div class="controls">
                <input id="lname" name="user_lastname" class="form-control" type="text" class="input-large" required value="<?php echo $row['user_lastname'];?>">
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="email">Email:</label>
              <div class="controls">
                <input id="email" name="user_email" class="form-control" type="email" class="input-large" required value="<?php echo $row['user_email'];?>">
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="phone">Phone:</label>
              <div class="controls">
                <input id="phone" class="form-control phone" name="user_phone_no" type="tel" placeholder="(800) 000-0000" class="input-large" required value="<?php echo $row['user_phone_no'];?>">
              </div>
            </div>
            <!-- Image input-->
            <div class="control-group">
              <label class="control-label" for="img">Picture Profile</label>
              <div class="controls">
                <input id="img" name="user_img" type="file">
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

            <!-- Change Password Form -->
            <form class="form-horizontal" method="POST" action="functions/updateProfile.php">
            <fieldset>
            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input id="password" name="user_password" class="form-control" type="password" placeholder="********" class="input-large" required>
                  <div class="col-sm-6">
                        <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
                        <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
                    </div>
                    <div class="col-sm-6">
                        <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
                        <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
                    </div>
                  </div>
            </div>
            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
              <div class="controls">
                <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="********" class="input-large" required data-match="#password">
                <div class="col-sm-12"><span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Password Matched</div>
                <br/>
              </div>
            </div>
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="changePassword"></label>
              <div class="controls">
                <button id="changePassword" name="changePassword" class="btn btn-info">Change Password</button>
              </div>
            </div>
            </fieldset>
            </form>
</div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/a_footer.php"; ?>