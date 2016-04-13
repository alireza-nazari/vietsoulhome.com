<?php include "includes/a_header.php";?>

        <!-- Navigation -->
<?php include "includes/a_navigation.php";?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="span12">
        <h1 class="page-header">
          User Management
          <small>Control user's priviledges</small>
        </h1>
      </div>
      <div class="span12">
        <h3 class="page-header">Category Table</h3>
        <table class="table table-bordered table-striped">
          <thead>
            <tr class="success">
              <th>ID</th>
              <th>Customer</th>
              <th>Item Ordered</th>
              <th>Item Quantity</th>
              <th>Timestamp</th>
              <th>Payment</th>
            </tr>
          </thead>
          <tbody>
    <!-- Print users from db -->
<?php
$query = "SELECT * FROM orders;";
$result = mysqli_query($connection, $query);
while ($echoResult = mysqli_fetch_assoc($result)) {
	echo '<tr>';
	echo '<td>' . $echoResult['order_ID'] . '</td>';
	$customer_query = "SELECT * FROM users WHERE user_ID = {$echoResult['user_ID']};";
	$customer_result = mysqli_query($connection, $customer_query);
	$customer_result = mysqli_fetch_assoc($customer_result);
	echo '<td>' . $customer_result['user_firstname'] . ' ' . $customer_result['user_lastname'] . '</td>';
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
    </div> <!-- /.container -->
  </div> <!-- /. main-inner -->
</div>

<script type="text/javascript">
    function saveUserChanges(editableObj, column, id) {
        $(editableObj).css('background', '#FFF url(../images/ajax-loader.gif) no-repeat right');
        $.ajax({
            url: 'functions/saveUserEdit.php',
            type: 'POST',
            data: 'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
            success: function(data){
                $(editableObj).css('background','#FDFDFD');
            }
        });
    }
</script>
<?php include "includes/a_footer.php";?>