<?php
// Inialize session
session_start();

// Include database connection settings
include('../reusableCodes/connectdb.php');

if(isset($_POST['update_product'])){
    // Capture values from the form
    $productID = $_POST['productID'];
    $productName = $_POST['name'];
    $productHighlight = $_POST['highlight'];
    $productDesc = $_POST['desc'];
    $productStatus = $_POST['status'];
    $productStock = $_POST['stock'];
    $productPrice = $_POST['price'];

    // Fetch current product data
    $sql = "SELECT * FROM product WHERE product_ID = $productID";
    $query = mysqli_query($conn, $sql);
    $tempArray = mysqli_fetch_array($query);

    // Validate and assign values
    $productName = !empty($productName) ? $productName : $tempArray['product_Name'];
    $productHighlight = !empty($productHighlight) ? $productHighlight : $tempArray['product_Highlight'];
    $productDesc = !empty($productDesc) ? $productDesc : $tempArray['product_Description'];
    $productStatus = isset($productStatus) ? $productStatus : $tempArray['product_Status'];
    $productStock = isset($productStock) ? $productStock : $tempArray['product_Stock'];
    $productPrice = isset($productPrice) ? $productPrice : $tempArray['product_Price'];

    // Update query
    $sql2 = "UPDATE product SET 
                product_Name = '$productName', 
                product_Highlight = '$productHighlight', 
                product_Description = '$productDesc', 
                product_Status = '$productStatus', 
                product_Price = '$productPrice', 
                product_Stock = '$productStock' 
            WHERE product_ID = $productID";
    
    $query = mysqli_query($conn, $sql2);
    
    if($query){
        echo "<script type='text/javascript'>alert('Product is updated successfully!');</script>";
    } else {
        echo "<script type='text/javascript'>alert('An error occurred!');</script>";
    }
    
    echo "<br>Process finished";
    header('Location: view_Product.php');
    exit();
} else {
    echo "Invalid request!";
    exit();
}

mysqli_close($conn);
?>
