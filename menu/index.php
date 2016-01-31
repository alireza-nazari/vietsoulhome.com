<?php include "includes/header.php"; ?>

    <!-- Navigation -->
<?php include "includes/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container-fluid">

        <div class="row">
    

            
            <!-- Menu Entries Column -->
            <div class="col-md-10 col-md-offset-1">
<?php
    if (isset($_POST['searchbtn'])){
        $search = $_POST['search'];
        $query = "SELECT * FROM categories WHERE cat_title LIKE '$search';";
        $cat_query = mysqli_query($connection, $query);
        $count_search_query = mysqli_num_rows($cat_query);
        if ($count_search_query == 0){
            $query = "SELECT * FROM categories;";
            $cat_query = mysqli_query($connection, $query);
            echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Nothing is found with your search...</div>';
        }
    } else {
        $query = "SELECT * FROM categories;";
        $cat_query = mysqli_query($connection, $query);
    }

    while ($cat_row = mysqli_fetch_assoc($cat_query)){
        echo '<br/><br/><h1 class="page-header">';
        echo $cat_row['cat_title'];
        echo '<small> '.$cat_row['cat_short_hint'].'</small></h1>';
        if ($cat_row['cat_description'])
            echo '<p class="lead"> '.$cat_row['cat_description'].'</p>';
        $query = "SELECT * FROM products WHERE cat_ID = {$cat_row['cat_ID']};";
        $product_query = mysqli_query($connection, $query);
        $ifTwoProductPrinted = 0;
        $total_product_row_in_one_cat = mysqli_num_rows($product_query);
        $product_row = mysqli_fetch_assoc($product_query);
        while ($product_row){
            $product_row1 = mysqli_fetch_assoc($product_query);
            $divideable_to_3 = $total_product_row_in_one_cat % 3;
            if ($divideable_to_3 == 0)
                echo '<div class="col-lg-4">';
            else
                echo '<div class="col-lg-6">';
            echo '<h3 class="page-header">'.$product_row['product_title'].'<small> '.$product_row['product_viet_title'].'</small></h3>';
            echo '<div class="col-lg-5">';
            if ($product_row['product_img'])
                echo '<img class="img-responsive" style="width: 20em; height: 15em" src="../images/products/'.$product_row['product_img'].'">';
            echo '</div>';
            echo '<div class="col-lg-7"><br/><p>'.$product_row['product_description'].'</p><br/>';
            echo '<strong class="pull-left">'.$product_row['product_quantity'].'</strong><strong class="pull-right">$ '.$product_row['product_price'].'</strong>';
            echo '<div class="row"></div>';
            if ($product_row['product_title'] == $product_row1['product_title']){
                echo '<strong class="pull-left">'.$product_row1['product_quantity'].'</strong><strong class="pull-right">$ '.$product_row1['product_price'].'</strong>';
                $product_row1 = mysqli_fetch_assoc($product_query);
            }
            echo '</div></div>';
            $product_row = $product_row1;
        }
        echo '<div class="row"></div>';
    } //end while loop PHP for categories
?>  
            </div>
        
        </div>
        <!-- /.row -->
        <br/><br/><br/><br/>
        <hr>

<?php include "includes/footer.php"; ?>