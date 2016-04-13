<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="../">VietSoul Homepage</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Account<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="profile.php">Profile</a></li>
              <li><a href="functions/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!-- /container -->
  </div>
  <!-- /navbar-inner -->
</div>
<!-- /navbar -->

<?php
$query = $_SERVER['PHP_SELF'];
$path = pathinfo($query);
$basename = $path['basename'];
?>

<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <?php if ($basename == 'index.php') {
	echo '<li class="active">';
} else {
	echo '<li>';
}
?>
        <a href="index.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <?php if ($basename == 'menuchange.php') {
	echo '<li class="active">';
} else {
	echo '<li>';
}
?>
        <a href="menuchange.php"><i class="icon-book"></i><span>Menu Control</span> </a> </li>
        <?php if ($basename == 'user.php') {
	echo '<li class="active">';
} else {
	echo '<li>';
}
?>
        <a href="user.php"><i class="icon-user"></i><span>Users</span> </a></li>
        <?php if ($basename == 'order.php') {
	echo '<li class="active">';
} else {
	echo '<li>';
}
?>
        <a href="order.php"><i class="icon-hdd"></i><span>Orders</span> </a> </li>
      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->