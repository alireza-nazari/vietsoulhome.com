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
	$i = 0;
	foreach ($_SESSION['cart_array'] as $each_item) {
		$i++;
		$cartOutput .= "<h2>Cart Item $i</h2>";
		while (list($key, $value) = each($each_item)) {
			if ($key == 'product_ID') {
				$query = "SELECT * FROM products WHERE product_ID = '{$value}';";
				$run_query = mysqli_query($connection, $query);
				$result = mysqli_fetch_assoc($run_query);
				$cartOutput .= '<img class="image fit" style="width: 11em; height: 11em;" src="../images/products/' . $result['product_img'] . '">';
				$cartOutput .= "Product: " . $result['product_title'];

				$cartOutput .= "<br />";
			} else {
				$cartOutput .= "$key: $value<br />";
			}
		}
		$cartOutput .= "<hr />";
	}

	$cartOutput .= '<form method="POST" class="pull-left">
              <input type="hidden" name="cmd" value="emptyCart"></input>
              <button type="submit" class="btn btn-large btn-warning">Empty Cart</button>
            </form>';
	$cartOutput .= '<form method="GET" class="pull-right" action="makeOrder.php">
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