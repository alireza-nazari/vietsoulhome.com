<?php include "includes/header.php"; ?>

<body class="landing">
    <div id="page-wrapper">
    <!-- Navigation -->
<?php include "includes/navbar.php"; ?>

        <div id="main" class="wrapper style1">
            <div class="container-fluid">
                <div class="row">
        <!-- Menu Entries Column -->
                    <div class="1u 12u$(medium)"><br/></div>
                    <div class="8u 12u$(medium)">  
<?php

    $query = "SELECT * FROM categories;";
    $cat_query = mysqli_query($connection, $query);


    while ($cat_row = mysqli_fetch_assoc($cat_query)){
        echo '<header class="major"><h2>';
        echo $cat_row['cat_title'];
        echo '<small> '.$cat_row['cat_short_hint'].'</small></h2>';
        if ($cat_row['cat_description'])
            echo '<p> '.$cat_row['cat_description'].'</p>';
        echo '</header><div class="row 150%">';
        $query = "SELECT * FROM products WHERE cat_ID = {$cat_row['cat_ID']};";
        $product_query = mysqli_query($connection, $query);
        $ifTwoProductPrinted = 0;
        $total_product_row_in_one_cat = mysqli_num_rows($product_query);
        $product_row = mysqli_fetch_assoc($product_query);
        while ($product_row){
            $product_row1 = mysqli_fetch_assoc($product_query);
            echo '<div class="6u 12u$(medium)">';
            echo '<h3>'.$product_row['product_title'].'<small> '.$product_row['product_viet_title'].'</small></h3>';

            if ($product_row['product_img']){
                echo '<div class="row"><div class="5u 12u$(medium)">';
                echo '<img class="image fit" style="width: 11em; height: 11em;" src="../images/products/'.$product_row['product_img'].'">';
                echo '</div><div class="7u 12u$(medium)">';
            }

            echo '<p>'.$product_row['product_description'].'</p>';
            echo '<strong class="pull-left">'.$product_row['product_quantity'].'</strong><strong class="pull-right">$ '.$product_row['product_price'].'</strong>';
            if ($product_row['product_title'] == $product_row1['product_title']){
                echo '<br/><strong class="pull-left">'.$product_row1['product_quantity'].'</strong><strong class="pull-right">$ '.$product_row1['product_price'].'</strong>';
                $product_row1 = mysqli_fetch_assoc($product_query);
            }
            echo '</div></div><!-- /.row product--></div><!-- /.categories -->';
            $product_row = $product_row1;
        }
        echo '</div><!-- ./row 150% --><hr></hr>';
    } //end while loop PHP for categories
?>
                    </div>
    
<?php include "includes/sidebar.php"; ?>

                </div><!-- /.row -->
            </div><!-- /.page content -->
        </div>
    </div><!-- /.page-wrapper -->

<?php include "includes/footer.php"; ?>