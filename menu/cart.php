<?php include "includes/header.php";?>

<body class="landing">
    <div id="TOPPAGE"></div>
    <div id="page-wrapper">
    <!-- Navigation -->
<?php include "includes/navbarCart.php";?>

<?php
if (isset($_POST['product_ID'])) {
	$pid = $_POST['product_ID'];
	$wasFound = false;
	$i = 0;
	if (!isset($_SESSION['cart_array']) || count($_SESSION['cart_array']) < 1) {
		// cart empty
		$_SESSION['cart_array'] = array(0 => array('product_ID' => $pid, 'quantity' => 1));
	} else {
		// cart is not empty
		foreach ($_SESSION['cart_array'] as $each_item) {
			$i++;
			while (list($key, $value) = each($each_item)) {
				if ($key == 'product_ID' && $value == $pid) {
					array_splice($_SESSION['cart_array'], $i - 1, 1, array(array('product_ID' => $pid, 'quantity' => $each_item['quantity'] + 1)));
					$wasFound = true;
				}
			}
		}
		if ($wasFound == false) {
			array_push($_SESSION['cart_array'], array('product_ID' => $pid, 'quantity' => 1));
		}
	}
}
?>
<?php
if (isset($_POST['cmd']) && $_POST['cmd'] == "emptyCart") {
	unset($_SESSION['cart_array']);
}
?>

<?php
$cartOutput = "";
if (!isset($_SESSION['cart_array']) || count($_SESSION['cart_array']) < 1) {
	$cartOutput = "<h2 align='center'>No product selected<br /><br /><br /><br /></h2><br />";
} else {
	$totalPayment = 0;
	foreach ($_SESSION['cart_array'] as $each_item) {
		$product_ID = $each_item['product_ID'];
		$query = "SELECT * FROM products WHERE product_ID = '{$product_ID}';";
		$run_query = mysqli_query($connection, $query);
		$result = mysqli_fetch_assoc($run_query);
		$cartOutput .= '<div class="row"><div class="col-sm-4"><img class="image fit" style="height: 10em;" src="../images/products/' . $result['product_img'] . '"></div>';
		$cartOutput .= '<div class="col-sm-8">Product: ' . $result['product_title'] . '<br />';
		$cartOutput .= "Quantity: {$each_item['quantity']}<br />";
		$pay = $result['product_price'] * $each_item['quantity'];
		$totalPayment += $pay;
		$cartOutput .= 'Total: $' . $pay . '<br /></div>';
		$cartOutput .= "</div><hr />";
	}

	$cartOutput .= '<div><div class="col-sm-9 text-right">Total Cost</div><div class="col-sm-3 text-right">$ ' . $totalPayment . '</div></div>';
	$tax = number_format($totalPayment * .0825, 2);
	$cartOutput .= '<div><div class="col-sm-9 text-right">Tax</div><div class="col-sm-3 text-right">$ ' . $tax . '</div></div>';
	$totalPayment += $tax;
	$cartOutput .= '<div style="margin-bottom: 10em"><div class="col-sm-9 text-right">TOTAL PAYMENT</div><div class="col-sm-3 text-right">$ ' . $totalPayment . '</div></div>';
	$cartOutput .= '<form method="POST" class="pull-left">
              <input type="hidden" name="cmd" value="emptyCart"></input>
              <button type="submit" class="btn btn-large btn-danger">Empty Cart</button>
            </form>';
	$cartOutput .= '<form method="GET" class="pull-right" action="makeOrder.php">
              <input type="hidden" name="totalCost" value="' . $totalPayment . '"></input>
              <button type="submit" class="btn btn-large btn-primary">Confirm Order</button>
            </form>';
}
?>
        <div id="main" class="wrapper">
          <div class="container">
<?php

echo $cartOutput;
?>


          </div>
        </div>
    </div><!-- /.page-wrapper -->

<?php include "includes/footer.php";?>