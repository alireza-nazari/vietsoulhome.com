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
    
    while ($cat_row = mysqli_fetch_assoc($cat_query)){
        echo '<li><a href="#'.$cat_row['cat_ID'].'" class="scrolly" style="border-bottom: none; color: #fff">'.$cat_row['cat_title'].'</a></li>';
    }
?>
            	</form></ul>
            </li>
            <li><a href="../registration" class="button special">Sign Up</a></li>
        </ul>
    </nav>
</header>