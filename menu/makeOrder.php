<?php include "includes/header.php";?>
<?php
$query = "INSERT INTO orders(user_ID, order_payment) VALUES ('" . $_SESSION['id'] . "', '" . $_GET['totalCost'] . "');";
mysqli_query($connection, $query);
$query = "SELECT * FROM orders;";
$run = mysqli_query($connection, $query);
$id = mysqli_num_rows($run);

foreach ($_SESSION['cart_array'] as $each_item) {
	$query = "INSERT INTO order_details(order_ID, product_ID, order_product_quantity) VALUES ('" . $id . "', '" . $each_item['product_ID'] . "','" . $each_item['quantity'] . "');";
	mysqli_query($connection, $query);
}

unset($_SESSION['cart_array']);
header("location: ../menu");
?>