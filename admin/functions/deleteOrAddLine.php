<?php
    include "../../includes/connection.php";
    // Add and Delete row in categories
    if(isset($_GET['add_cat'])){
        $query = "INSERT INTO categories (cat_title) VALUES ('');";
        mysqli_query($connection, $query);
        header('location:../menuchange.php');
    }
    if(isset($_GET['delete_cat'])){
        $query = "SELECT * FROM categories;";
        $cat_query = mysqli_query($connection, $query);
        $total_cat_rows = mysqli_num_rows($cat_query);
        $query = "DELETE FROM categories WHERE cat_ID = $total_cat_rows;";
        mysqli_query($connection, $query);
        $query = "ALTER TABLE categories AUTO_INCREMENT = $total_cat_rows;";
        mysqli_query($connection, $query);
        header('location:../menuchange.php');
    }

    // Add and Delete row in product
    if(isset($_GET['add_product'])){
        $query = "INSERT INTO products (cat_ID) VALUES (1);";
        mysqli_query($connection, $query);
        header('location:../menuchange.php');
    }
    if(isset($_GET['delete_product'])){
        $query = "SELECT * FROM products;";
        $product_query = mysqli_query($connection, $query);
        $total_product_rows = mysqli_num_rows($product_query);
        $query = "DELETE FROM products WHERE product_ID = $total_product_rows;";
        mysqli_query($connection, $query);
        $query = "ALTER TABLE products AUTO_INCREMENT = $total_product_rows;";
        mysqli_query($connection, $query);
        header('location:../menuchange.php');
    }
?>