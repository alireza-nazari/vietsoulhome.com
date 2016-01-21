<?php include "includes/header.php"; ?>

    <!-- Navigation -->
<?php include "includes/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
    
            <!-- Sidebar Widgets Column -->
<?php include "includes/sidebar.php"; ?>
            
            <!-- Menu Entries Column -->
            <div class="col-md-8 col-md-pull-4">
<?php
    if (isset($_POST['searchbtn'])){
        $search = $_POST['search'];
        $query = "SELECT * FROM categories WHERE cat_title LIKE '$search';";
        $post_query = mysqli_query($connection, $query);
        $count_search_query = mysqli_num_rows($post_query);
        if ($count_search_query == 0){
            $query = "SELECT * FROM categories;";
            $post_query = mysqli_query($connection, $query);
            echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Nothing is found with your search...</div>';
        }
    } else {
        $query = "SELECT * FROM categories;";
        $post_query = mysqli_query($connection, $query);
    }

    while ($row = mysqli_fetch_assoc($post_query)){
        $cat_title = $row['cat_title'];
        $cat_short_hint = $row['cat_short_hint'];
        $cat_description = $row['cat_description'];
        $cat_image = $row['cat_img'];
?>  
                <h1 class="page-header">
                    <?php echo $cat_title; ?>
                    <small><?php echo $cat_short_hint; ?></small>
                </h1>

                <p class="lead"><?php echo $cat_description; ?></p>
                <p></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
<?php } //end while loop PHP for posts ?>
            </div>

        </div>
        <!-- /.row -->

        <hr>

<?php include "../includes/footer.php"; ?>