<?php
session_start();

include('../reusableCodes/connectdb.php');

if (isset($_GET['delete'])) {
    $productID = $_GET['delete'];
    $sql = "DELETE FROM product WHERE product_ID = $productID";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "Successfully deleted User";
        header("location:view_Product.php");
        exit();
    } else {
        echo "An error occurred!";
        exit();
    }
}
