<style type="text/css">
  .none {
    all: initial;
    background: url(http://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png) no-repeat #ddd;
    background-position: 97% 60%;
    color: rgb(76, 76, 76);
    padding: 0.05em 1em 0.05em 0.5em;
    margin: 0.5em;
    border: 1px solid #ccc;
    border-radius: 0.3em;
  }
</style>
<?php include_once "../includes/connection.php";?>
<?php

if (isset($_GET['id'])) {
	$id = intval($_GET['id']);
	$query = "SELECT * FROM categories WHERE cat_ID = '{$id}';";
}
if (isset($_GET['search'])) {
	$search = $_GET['search'];
	$query = "SELECT * FROM categories WHERE (cat_title LIKE '%{$search}%' OR cat_short_hint LIKE '%{$search}%' OR cat_description LIKE '%{$search}%');";
}

// Default query
$cat_query_display = mysqli_query($connection, $query);
$cat_num_rows = mysqli_num_rows($cat_query_display);
if ($cat_num_rows == 0) {
	$query = "SELECT * FROM categories;";
	$cat_query_display = mysqli_query($connection, $query);
}

// Check search product
if ($search) {
	$query = "SELECT * FROM products WHERE (product_title LIKE '%{$search}%' OR product_description LIKE '%{$search}%');";
	$product_query = mysqli_query($connection, $query);
	$product_num_rows = mysqli_num_rows($product_query);
	if ($product_num_rows > 0) {
		while ($product_row = mysqli_fetch_assoc($product_query)) {
			$query = "SELECT * FROM categories WHERE cat_ID = '" . $product_row['cat_ID'] . "';";
			$cat_query_display = mysqli_query($connection, $query);
			$cat_row = mysqli_fetch_assoc($cat_query_display);
			echo '<div id="' . $cat_row['cat_ID'] . '" style="padding-top: 3.2em"><header class="major"><h2>';
			echo $cat_row['cat_title'];
			echo '<small> ' . $cat_row['cat_short_hint'] . '</small></h2>';
			if ($cat_row['cat_description']) {
				echo '<p> ' . $cat_row['cat_description'] . '</p>';
			}

			echo '</header><div class="row 150%">';
			echo '<div class="6u 12u$(medium)">';
			echo '<h3>' . $product_row['product_title'] . '<small> ' . $product_row['product_viet_title'] . '</small>';
			if ($_SESSION['role'] == 3) {
				echo '<form method="POST" onsubmit="return submitData(this);" class="pull-right">';
				echo '<input type="hidden" name="product_ID" id="product_ID" value="' . $product_row['product_ID'] . '" />';
				echo '<button class="submitForm" type="submit"><span class="fa fa-shopping-cart"></span> Add</button>';
				echo '</form>';
			}
			echo '</h3>';

			if ($product_row['product_img']) {
				echo '<div class="row"><div class="5u 12u$(small)">';
				echo '<img class="image fit" style="width: 11em; height: 11em;" src="../images/products/' . $product_row['product_img'] . '">';
				echo '</div><div class="7u 12u$(small)">';
			}

			echo '<p>' . $product_row['product_description'] . '</p>';
			echo '<strong class="pull-left">' . $product_row['product_quantity'] . '</strong><strong class="pull-right">$ ' . $product_row['product_price'] . '</strong>';
			if ($product_row['product_title'] == $product_row1['product_title']) {
				echo '<br/><strong class="pull-left">' . $product_row1['product_quantity'] . '</strong><strong class="pull-right">$ ' . $product_row1['product_price'] . '</strong>';
				$product_row1 = mysqli_fetch_assoc($product_query);
			}

			if ($product_row['product_img']) {
				echo '</div><!-- /.row -->';
			}
			echo '<span class="icon fa-shopping-cart"></span>';
			echo '</div></div><!-- /.row product--></div><!-- /.categories -->';
			$product_row = $product_row1;
			echo '</div></div><!-- ./row 150% --><hr></hr>';
		}
	}
}

while ($cat_row = mysqli_fetch_assoc($cat_query_display)) {
	echo '<div id="' . $cat_row['cat_ID'] . '" style="padding-top: 3.2em"><header class="major"><h2>';
	echo $cat_row['cat_title'];
	echo '<small> ' . $cat_row['cat_short_hint'] . '</small></h2>';
	if ($cat_row['cat_description']) {
		echo '<p> ' . $cat_row['cat_description'] . '</p>';
	}

	echo '</header><div class="row 150%">';
	$query = "SELECT * FROM products WHERE cat_ID = {$cat_row['cat_ID']};";
	$product_query = mysqli_query($connection, $query);
	$product_row = mysqli_fetch_assoc($product_query);
	while ($product_row) {
		$product_row1 = mysqli_fetch_assoc($product_query);
		echo '<div class="6u 12u$(medium)">';
		echo '<h3>' . $product_row['product_title'] . '<small> ' . $product_row['product_viet_title'] . '</small>';
		if (($_SESSION['role'] == 3)) {
			echo '<form method="POST" onsubmit="return submitData(this);" class="pull-right">';
			if ($product_row['product_title'] == $product_row1['product_title']) {
				echo '<select class="none" name="product_ID" id="product_ID"><option value="' . $product_row['product_ID'] . '"> Small</option><option value="' . $product_row1['product_ID'] . '"> Large</option></select>';
			} else {
				echo '<input type="hidden" name="product_ID" id="product_ID" value="' . $product_row['product_ID'] . '" />';
			}
			echo '<button class="submitForm" type="submit"><span class="fa fa-shopping-cart"></span> Add</button>';
			echo '</form>';
		}
		echo '</h3>';

		if ($product_row['product_img']) {
			echo '<div class="row"><div class="5u 12u$(small)">';
			echo '<img class="image fit" style="width: 11em; height: 11em;" src="../images/products/' . $product_row['product_img'] . '">';
			echo '</div><div class="7u 12u$(small)">';
		}

		echo '<p>' . $product_row['product_description'] . '</p>';
		echo '<strong class="pull-left">' . $product_row['product_quantity'] . '</strong><strong class="pull-right">$ ' . $product_row['product_price'] . '</strong>';
		if ($product_row['product_title'] == $product_row1['product_title']) {
			echo '<br/><strong class="pull-left">' . $product_row1['product_quantity'] . '</strong><strong class="pull-right">$ ' . $product_row1['product_price'] . '</strong>';
			$product_row1 = mysqli_fetch_assoc($product_query);
		}
		echo '</div>';
		echo '</div><!-- /.row product--></div><!-- /.categories -->';
		$product_row = $product_row1;
	}
	echo '</div></div><!-- ./row 150% --><hr></hr>';
}
?>