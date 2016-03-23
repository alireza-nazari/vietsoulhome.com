<!-- Header -->
<header id="header" class="fixed">
  <h1 id="logo"><a href="../">VietSoul</a></h1>
  <nav id="nav">
    <ul>
      <li><a href="../">Home</a></li>
        <li><a href="../contact/">Contact</a></li>
        <li>
          <a href="#">Products by Category</a>
          <ul><form name="categoryDisplayForm" action="index.php" method="POST">
<?php
$query = "SELECT * FROM categories;";
$cat_query = mysqli_query($connection, $query);

while ($cat_row = mysqli_fetch_assoc($cat_query)) {
	echo '<li><a href="#' . $cat_row['cat_ID'] . '" class="scrolly" style="border-bottom: none; color: #fff">' . $cat_row['cat_title'] . '</a></li>';
}
?>
              </form></ul>
          </li>
<?php
if (isset($_SESSION['email'])) {
	switch ($_SESSION['role']) {
	case '1':
		echo '<li><a href="#"><i class="fa fa-user"></i> Account </a><ul>';
		echo '<li><a href="../admin/"><i class="fa fa-wrench"></i> Admin page</a></li>';
		echo '<li><a href="../admin/functions/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>';
		echo '</ul></li>';
		break;
	case '3':
		echo '<li><a href="#"><i class="fa fa-user"></i> Account </a><ul>';
		echo '<li><a href="../account/"><i class="fa fa-wrench"></i> Account page</a></li>';
		echo '<li><a href="../admin/functions/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>';
		echo '</ul></li>';
		break;

	default:
		break;
	}
} else {
	echo '<li><a href="../registration/login.php" class="button special">Sign In</a></li>';
}
?>

    </ul>
  </nav>
</header>