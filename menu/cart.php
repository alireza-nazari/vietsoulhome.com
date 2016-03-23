<?php
session_start();
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
	$cartOutput = "<h2 align='center'>No product selected</h2>";
} else {
	$i = 0;
	foreach ($_SESSION['cart_array'] as $each_item) {
		$i++;
		$cartOutput .= "<h2>Cart Item $i</h2>";
		while (list($key, $value) = each($each_item)) {
			$cartOutput .= "$key: $value<br />";
		}
	}
}
?>
<?php
echo 'User ID: ' . $_SESSION['id'];
echo $cartOutput;
?>
<form method="POST">
  <input type="hidden" name="cmd" value="emptyCart"></input>
  <button type="submit">Empty Cart</button>
</form>
