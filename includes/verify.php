<?php include "header.php"; ?>
<?php include "connection.php"; ?>
<body>
<div class="container" style="margin-top: 3em; text-align: center;">
<?php
    
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysqli_real_escape_string($connection, $_GET['email']);
    $hash = $_GET['hash'];
    $search = mysqli_query($connection, "SELECT user_email, user_hash, user_role FROM users WHERE user_email='".$email."' AND user_hash='".$hash."' AND user_role='4'") or die(mysql_error()); 
    $match  = mysqli_num_rows($search);
                 
    if($match > 0){
        // We have a match, activate the account
        mysqli_query($connection, "UPDATE users SET user_role='3' WHERE user_email='".$email."' AND user_hash='".$hash."' AND user_role='3'") or die(mysql_error());
        echo '<div>Your account has been activated, you can now login.</div><div>Redirecting back to main page...</div>';
        header("refresh:5; ../");
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div>The url is either invalid or you already have activated your account.</div><div>Redirecting back to main page...</div>';
        header("refresh:5; ../");
    }
                 
}else{
    // Invalid approach
    echo '<div>Invalid approach, please use the link that has been send to your email.</div><div>Redirecting back to main page...</div>';
    header("refresh:5; ../");
}
?>
</div>
</body>
</html>