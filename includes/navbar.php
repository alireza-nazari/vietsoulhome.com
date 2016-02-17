<header id="header">
  <h1 id="logo"><a href="">VietSoul</a></h1>
  <nav id="nav">
    <ul>
      <li><a href="#two" class="scrolly">About</a></li>
      <li><a href="menu/">Menu</a></li>
      <li><a href="contact/">Contact</a></li>
<?php
  if(isset($_SESSION['email'])){
    switch ($_SESSION['role']) {
      case '1':
        echo '<li><a href="#"><i class="fa fa-user"></i> Account </a><ul>';
        echo '<li><a href="admin/"><i class="fa fa-wrench"></i> Admin page</a></li>';
        echo '<li><a href="admin/functions/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>';
        echo '</ul></li>';
        break;
      
      default:
        # code...
        break;
    }
  }
  else
    echo '<li><a href="registration/login.php" class="button special">Sign In</a></li>';
?>  
    </ul>
  </nav>
</header>