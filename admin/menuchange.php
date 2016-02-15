<?php include "includes/a_header.php"; ?>

        <!-- Navigation -->
<?php include "includes/a_navigation.php"; ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <h1 class="page-header">
        Menu Control
        <small>Alter the Menu</small>
      </h1>
    </div>

    <!-- Category table -->
    <div class="container">
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
        echo "<tr>";
        echo "<td>{$row['cat_ID']}</td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveCatChanges(this, 'cat_title', '{$row['cat_ID']}')".';"'.">{$row['cat_title']}</td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveCatChanges(this, 'cat_short_hint', '{$row['cat_ID']}')".';"'.">{$row['cat_short_hint']}</td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveCatChanges(this, 'cat_description', '{$row['cat_ID']}')".';"'.">{$row['cat_description']}</td>";
        echo "</tr>";
    }
?>
        </tbody>
      </table>
      <form action="functions/deleteOrAddLine.php" method="get">
        <input type="submit" class="btn btn-primary" value="Add More Category" name="add_cat">
        <input type="submit" class="btn btn-danger" value="Delete Last Category" name="delete_cat">
      </form>
    </div> <!-- /.Category table -->

    <!-- Product table -->
    <div class="container">
      <h3 class="page-header">Product Table</h3>
    </div>
    <div class="container-fluid">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Vietnamese</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Description</th>
            <th>Image</th>
            <th>Price</th>
            <th>Recomend</th>
          </tr>
        </thead>
        <tbody>

                                              
            <!-- Print product from db -->
<?php
    $query = "SELECT * FROM products ORDER BY product_ID ASC;";
    $product_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($product_query)){
        echo "<tr>";
        echo "<td>{$row['product_ID']}</td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveProductChanges(this, 'product_title', '{$row['product_ID']}')".';"'.">{$row['product_title']}</td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveProductChanges(this, 'product_viet_title', '{$row['product_ID']}')".';"'.">{$row['product_viet_title']}</td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveProductChanges(this, 'product_quantity', '{$row['product_ID']}')".';"'.">{$row['product_quantity']}</td>";
        $query = "SELECT cat_title FROM categories WHERE cat_ID = {$row['cat_ID']};";
        $cat_title_query = mysqli_query($connection, $query);
        $find_cat_title = mysqli_fetch_assoc($cat_title_query);
        echo '<td><div class="btn-group"><a class="btn dropdown-toggle" id="catmenu" data-toggle="dropdown">'.$find_cat_title['cat_title'].' <span class="caret"></span></a>';
        echo '<ul class="dropdown-menu" aria-labelledby="catmenu">';
        $dropdown_query = "SELECT cat_ID, cat_title FROM categories;";
        $cat_dropdown_query = mysqli_query($connection, $dropdown_query);
        while ($row_dropdown = mysqli_fetch_assoc($cat_dropdown_query)){
            echo "<li><a href='functions/changeProductCategory.php?product_ID={$row['product_ID']}&cat_ID={$row_dropdown['cat_ID']}'>{$row_dropdown['cat_title']}</li>";
        }
        echo "</ul></div></td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveProductChanges(this, 'product_description', '{$row['product_ID']}')".';"'.">{$row['product_description']}</td>";
        echo '<td>';
        if ($row['product_img'])
            echo '<a rel="popover" data-img="../images/products/'.$row['product_img'].'">Hover to show Image</a>';
        echo '<div style="padding-top: 1em">';
        echo '<form action="functions/uploadImage.php" enctype="multipart/form-data" method="POST">';
        echo '<div class="form-group">';
        echo '<input type="hidden" name="product_ID" value="'.$row['product_ID'].'">';
        if (!$row['product_img']){
            echo '<input type="submit" class="btn btn-sm btn-primary pull-right" value="Upload" name="uploadProductImage">';
            echo '<input type="file" name="image" style="padding-bottom: 0.5em;">';
        } else
            echo '<input type="submit" class="btn btn-sm btn-danger pull-left" value="Delete" name="deleteProductImage">';
        
        echo '</div></form></div></td>';
        echo "<td contenteditable='true' onBlur=".'"'."saveProductChanges(this, 'product_price', '{$row['product_ID']}')".';"'.">{$row['product_price']}</td>";
?>
            <td>
              <div class="btn-group">
                <a class="btn dropdown-toggle" id="recommendproduct" data-toggle="dropdown">
                <?php if ($row['product_recommend']== 1){echo '<i class="icon-check icon-white"></i> Yes';}
                    else {echo '<i class="icon-check-empty icon-white"></i> No';}
                ?>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="functions/changeProductRecommendation.php?product_ID=<?php echo $row['product_ID']; ?>&product_recommend=1"><i class="icon-ok icon-white"></i> Yes</li>
                  <li><a href="functions/changeProductRecommendation.php?product_ID=<?php echo $row['product_ID']; ?>&product_recommend=0"><i class="icon-remove icon-white"></i> No</li> 
                </ul>
              </div>
            </td>
          </tr>
<?php
    }
?>
        </tbody>
      </table>
    </div>
    <!-- /container-fluid -->
    <div class="container">
      <form action="functions/deleteOrAddLine.php" method="get">
        <input type="submit" class="btn btn-primary" value="Add More Product" name="add_product">
        <input type="submit" class="btn btn-danger" value="Delete Last Product" name="delete_product">
      </form>
    </div>
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<script type="text/javascript">
function saveCatChanges(editableObj, column, id) {
    $(editableObj).css('background', '#FFF url(../images/ajax-loader.gif) no-repeat right');
    $.ajax({
        url: 'functions/saveCatEdit.php',
        type: 'POST',
        data: 'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
        success: function(data){
            $(editableObj).css('background','#FDFDFD');
        }
    });
}
function saveProductChanges(editableObj, column, id) {
    $(editableObj).css('background', '#FFF url(../images/ajax-loader.gif) no-repeat right');
    $.ajax({
        url: 'functions/saveProductEdit.php',
        type: 'POST',
        data: 'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
        success: function(data){
            $(editableObj).css('background','#FDFDFD');
        }
    });
}
</script>

<?php include "includes/a_footer.php"; ?>