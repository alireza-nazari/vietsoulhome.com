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
    function saveToDB(table, editableObj, column, id) {
        $(editableObj).css('background', '#FFF url(../images/ajax-loader.gif) no-repeat right');
        $.ajax({
            url: 'menuchange.php',
            type: 'POST',
            data: 'table='+table+'&column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
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
            <td contenteditable='true' onBlur="saveToDB('categories', this, 'cat_title', '<?php echo $row['cat_ID'];?>')"><?php echo $row['cat_title']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('categories', this, 'cat_short_hint', '<?php echo $row['cat_ID'];?>')"><?php echo $row['cat_short_hint']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('categories', this, 'cat_description', '<?php echo $row['cat_ID'];?>')"><?php echo $row['cat_description']; ?></td>
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
        if (strpos($content,'<br>') !== false)
            $content = substr($content, 0, -4);
        $query = "UPDATE ".$_POST['table']." SET ".$_POST['column']." = '".$content."' WHERE cat_ID = ".$_POST['id'].";";
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
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                <!-- Print category from db -->
<?php
    $query = "SELECT * FROM products ORDER BY product_ID ASC;";
    $cat_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($cat_query)){
?>
        <tr>
            <td><?php echo $row['product_ID']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('products', this, 'cat_ID', '<?php echo $row['product_ID'];?>')"><?php echo $row['cat_ID']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('products', this, 'product_name', '<?php echo $row['product_ID'];?>')"><?php echo $row['product_name']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('products', this, 'product_description', '<?php echo $row['product_ID'];?>')"><?php echo $row['product_description']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('products', this, 'product_price', '<?php echo $row['product_ID'];?>')"><?php echo $row['product_price']; ?></td>
            <td contenteditable='true' onBlur="saveToDB('products', this, 'product_recommend', '<?php echo $row['product_ID'];?>')"><?php echo $row['product_recommend']; ?></td>
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
