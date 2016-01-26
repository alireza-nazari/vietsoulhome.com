<?php include "includes/a_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/a_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Menu Control
                            <small>Alter the Menu</small>
                        </h1>

                        <div> <!-- Category table -->
<script type="text/javascript">
    function saveToDB(table, editableObj, column, id_column, id) {
        $(editableObj).css('background', '#FFF url(../images/ajax-loader.gif) no-repeat right');
        $.ajax({
            url: 'menuchange.php',
            type: 'POST',
            data: 'table='+table+'&column='+column+'&editval='+editableObj.innerHTML+'&id_column='id_column+'&id='+id,
            success: function(data){
                $(editableObj).css('background','#FDFDFD');
            }
        });
    }
</script>
                            <h3 class="page-header">Category Table</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                <!-- Print category from db -->
<?php
    $query = "SELECT * FROM categories ORDER BY cat_ID ASC;";
    $cat_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($cat_query)){
?>
        <tr>
            <td><?php echo $row['cat_ID']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('categories', this, 'cat_title', 'cat_ID', '<?php echo $row['cat_ID'];?>')"><?php echo $row['cat_title']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('categories', this, 'cat_short_hint', 'cat_ID', '<?php echo $row['cat_ID'];?>')"><?php echo $row['cat_short_hint']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('categories', this, 'cat_description', 'cat_ID', '<?php echo $row['cat_ID'];?>')"><?php echo $row['cat_description']; ?></td>
        </tr>
<?php
    }
?>
                                </tbody>
                            </table>
                            <form action="menuchange.php" method="get">
                                <input type="submit" class="btn btn-primary" value="Add More Category" name="add_cat">
                                <input type="submit" class="btn btn-danger" value="Delete Last Category" name="delete_cat">
                            </form>
                <!-- Add and Delete row in categories -->
<?php
    if(isset($_GET['add_cat'])){
        $query = "INSERT INTO categories (cat_title) VALUES ('');";
        mysqli_query($connection, $query);
        header('location:menuchange.php');
    }
    if(isset($_GET['delete_cat'])){
        $query = "SELECT * FROM categories;";
        $cat_query = mysqli_query($connection, $query);
        $total_cat_rows = mysqli_num_rows($cat_query);
        $query = "DELETE FROM categories WHERE cat_ID = $total_cat_rows;";
        mysqli_query($connection, $query);
        $query = "ALTER TABLE categories AUTO_INCREMENT = $total_cat_rows;";
        mysqli_query($connection, $query);
        header('location:menuchange.php');
    }
?>
                <!-- Write editable table content to DB-->
<?php
    if(isset($_POST['column'])){
        $content = mysqli_real_escape_string($connection, $_POST['editval']);
        
        //  Prevent strange <br> tag after edit table cell
        if (strpos($content,'<br>') !== false)
            $content = substr($content, 0, -4);
        
        $query = "UPDATE ".$_POST['table']." SET ".$_POST['column']." = '".$content."' WHERE ".$_POST['id_column']." = ".$_POST['id'].";";
        mysqli_query($connection, $query);
    }
?>
                        </div> <!-- /.Category table -->
                        <hr>
                        <div> <!-- Product table -->
                            <h3 class="page-header">Product Table</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Vietnamese</th>
                                        <th>Quantity</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Recommended</th>
                                    </tr>
                                </thead>
                                <tbody>
                <!-- Print product from db -->
<?php
    $query = "SELECT * FROM products ORDER BY product_ID ASC;";
    $cat_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($cat_query)){
?>
        <tr>
            <td><?php echo $row['product_ID']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('products', this, 'product_title', 'product_ID', '<?php echo $row['product_ID'];?>')"><?php echo $row['product_title']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('products', this, 'product_viet_title', 'product_ID', '<?php echo $row['product_ID'];?>')"><?php echo htmlspecialchars($row['product_viet_title']); ?></td>
            <td contenteditable='true' onBlur="saveToDB('products', this, 'product_quantity', 'product_ID', '<?php echo $row['product_ID'];?>')"><?php echo $row['product_quantity']; ?></td>
            <td>
                <?php
                    $query = "SELECT cat_title FROM categories WHERE cat_ID = {$row['cat_ID']};";
                    $cat_title_query = mysqli_query($connection, $query);
                    $find_cat_title = mysqli_fetch_assoc($cat_title_query);
                ?>
            
                <div class="dropup">
                  <button class="btn btn-default dropdown-toggle" type="button" id="catmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?php echo $find_cat_title['cat_title']; ?>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="catmenu">
    <?php
        $dropdown_query = "SELECT cat_ID, cat_title FROM categories;";
        $cat_dropdown_query = mysqli_query($connection, $dropdown_query);
        while ($row_dropdown = mysqli_fetch_assoc($cat_dropdown_query)){
            echo "<li><a href='changeProductCategory.php?product_ID=".$row['product_ID']."&cat_ID=".$row_dropdown['cat_ID']."'>".$row_dropdown['cat_title']."</li>";
        }
    ?>
                  </ul>
                </div>
            </td>
            <td contenteditable='true' onBlur="saveToDB('products', this, 'product_description', 'product_ID', '<?php echo $row['product_ID'];?>')"><?php echo $row['product_description']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('products', this, 'product_price', 'product_ID', '<?php echo $row['product_ID'];?>')"><?php echo $row['product_price']; ?></td>
            <td>
                <div class="dropup">
                  <button class="btn btn-default dropdown-toggle" type="button" id="recommendproduct" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?php if ($row['product_recommend']== 1){echo 'Yes';}
                        else {echo 'No';}
                    ?>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="recommendproduct">
                    <li><a href="changeProductRecommendation.php?product_ID=<?php echo $row['product_ID']; ?>&product_recommend=1">Yes</li>
                    <li><a href="changeProductRecommendation.php?product_ID=<?php echo $row['product_ID']; ?>&product_recommend=0">No</li> 
                  </ul>
                </div>
            </td>
        </tr>
<?php
    }
?>
                                </tbody>
                            </table>
                            <form action="menuchange.php" method="get">
                                <input type="submit" class="btn btn-primary" value="Add More Product" name="add_product">
                                <input type="submit" class="btn btn-danger" value="Delete Last Product" name="delete_product">
                            </form>
                <!-- Add and Delete row in product -->
<?php
    if(isset($_GET['add_product'])){
        $query = "INSERT INTO products (cat_ID) VALUES (1);";
        mysqli_query($connection, $query);
        header('location:menuchange.php');
    }
    if(isset($_GET['delete_product'])){
        $query = "SELECT * FROM products;";
        $product_query = mysqli_query($connection, $query);
        $total_product_rows = mysqli_num_rows($product_query);
        $query = "DELETE FROM products WHERE product_ID = $total_product_rows;";
        mysqli_query($connection, $query);
        $query = "ALTER TABLE products AUTO_INCREMENT = $total_product_rows;";
        mysqli_query($connection, $query);
        header('location:menuchange.php');
    }
?>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/a_footer.php"; ?>