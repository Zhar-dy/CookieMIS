<?php
// Include database connection settings
include('../reusableCodes/connectdb.php');

session_start();

if (isset($_GET['delete'])) {
    $productID = $_GET['delete'];

    $sql = "DELETE FROM product WHERE product_ID = $productID";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "Successfully deleted Product";
        header("location:view_Product.php");
        exit();
    } else {
        echo "An error occurred!";
    }

} elseif (isset($_GET['update'])) {
    $productID = $_GET['update'];

    $sql = "SELECT * FROM product WHERE product_ID = $productID";
    $query = mysqli_query($conn, $sql);

    if (!$query || mysqli_num_rows($query) <= 0) {
        echo "Product not found!";
        exit();
    }

    $productData = mysqli_fetch_array($query);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Update Product</title>
        <!-- Include header meta -->
        <?php include '../reusableCodes/headerMeta1in.php'; ?>
    </head>

    <body>
        <!-- Include header -->
        <?php include '../reusableCodes/headerStaff.php'; ?>
<!--0 id
		1 name
		2 description
		3 highlight
		4 status
		5 stock
		6 price
		7 picture -->
        <div class="update_profile_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="update_text">Update Product</h1>
                        <form method="POST" action="saveProduct.php">
                            <div class="form-group">
                                <label for="name">Product Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $productData[1]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="highlight">Product Highlight:</label>
                                <input type="text" class="form-control" id="highlight" name="highlight" value="<?php echo $productData[3]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="desc">Product Description:</label>
                                <textarea class="form-control" id="desc" name="desc"><?php echo $productData[2]; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Product Availability:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" <?php if ($productData[4] === "1") echo "selected"; ?>>Available</option>
                                    <option value="0" <?php if ($productData[4] === "0") echo "selected"; ?>>Not Available</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock total:</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $productData[5]; ?>" min="0">
                            </div>
                            <div class="form-group">
                                <label for="price">Price(RM):</label>
                                <input type="number" class="form-control" id="price" name="price" value="<?php echo $productData[6]; ?>" min="0">
                            </div>
                            <input type="hidden" name="productID" value="<?php echo $productID; ?>">
                            <button type="submit" class="btn btn-primary" name="update_product">Update Product</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h1 class="update_text">Update Picture</h1>

                            <div class="form-group">
                                <label for="picture">Picture:</label>
                                <input type="file" name="file" id="file">
                                <img src="../images/cookies/<?php echo $productData[7]; ?>" width="500" height="500">
                            </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Include footer -->
        <?php include '../reusableCodes/footer1in.php'; ?>

    </body>

    </html>

<?php
} else {
    echo "Invalid action!";
}
?>
