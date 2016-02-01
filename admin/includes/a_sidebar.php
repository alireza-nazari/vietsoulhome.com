<?php
$query = $_SERVER['PHP_SELF'];
$path = pathinfo( $query );
$basename = $path['basename'];
?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <?php if ($basename == 'index.php') echo '<li class="active">'; else echo '<li>'?>
            <a href="../admin/"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
        <?php if ($basename == 'menuchange.php') echo '<li class="active">'; else echo '<li>'?>
            <a href="menuchange.php"><i class="fa fa-fw fa-book"></i> Menu Control</a></li>
        <?php if ($basename == 'user.php') echo '<li class="active">'; else echo '<li>'?>
            <a href="user.php"><i class="fa fa-fw fa-users"></i> Users</a></li>
        <?php if ($basename == 'order.php') echo '<li class="active">'; else echo '<li>'?>
            <a href="order.php"><i class="fa fa-fw fa-database"></i> Orders</a></li>
        <?php if ($basename == 'profile.php') echo '<li class="active">'; else echo '<li>'?>
            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a></li>
    </ul>
</div>
