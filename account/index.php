<?php include "header.php";?>
<?php include "navbar.php";?>

<div class="container">
  <h1 style="text-align: center; padding-top: 2em;">Welcome to account page, <?php echo ucfirst($_SESSION['firstname']); ?></h1>
</div>
<hr />
<div class="container">
  <h2>Order History</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Items</th>
        <th>Quantity</th>
        <th>Time Ordered</th>
        <th>Total Payment</th>
      </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM orders WHERE user_ID = {$_SESSION['id']};";
$result = mysqli_query($connection, $query);
while ($echoResult = mysqli_fetch_assoc($result)) {
	echo '<tr>';
	echo '<td>' . $echoResult['order_ID'] . '</td>';
	$detail_query = "SELECT * FROM order_details WHERE order_ID = {$echoResult['order_ID']};";
	$detail_result = mysqli_query($connection, $detail_query);
	echo '<td>';
	while ($array_detail = mysqli_fetch_assoc($detail_result)) {
		$product_query = "SELECT * FROM products WHERE product_ID = {$array_detail['product_ID']};";
		$product_result = mysqli_query($connection, $product_query);
		$echo_product = mysqli_fetch_assoc($product_result);
		echo $echo_product['product_title'];
		echo '<br />';
	}
	echo '</td><td>';
	$detail_result = mysqli_query($connection, $detail_query);
	while ($array_detail = mysqli_fetch_assoc($detail_result)) {
		echo $array_detail['order_product_quantity'];
		echo '<br />';
	}
	echo '</td>';
	echo '<td>' . $echoResult['order_time'] . '</td>';
	echo '<td>' . $echoResult['order_payment'] . '</td>';
	echo '</tr>';
}

?>
    </tbody>
  </table>
</div>



<?php include "footer.php";?>