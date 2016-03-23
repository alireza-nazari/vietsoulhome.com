<?php include_once "../includes/connection.php";?>
<?php
$query = "INSERT INTO orders(user_ID) VALUES ({$_SESSION['id']});";
mysqli_query($connection, $query);
?>