<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Product</title>
    <!-- Header Meta File -->
    <?php include '../reusableCodes/headerMeta1in.php' ?>
</head>

<body>
    <!-- Header File -->
    <?php include '../reusableCodes/headerAdmin.php' ?>

    <section class="add_product_section">
        <div class="container">
            <h2>Add New Product</h2>
            <form action="addProduct.php" method="post" enctype="multipart/form-data">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required>

                <label for="product_desc">Product Description:</label>
                <textarea id="product_desc" name="product_desc" required></textarea>

                <label for="product_price">Product Price:</label>
                <input type="number" id="product_price" name="product_price" min="0" step="0.01" required>

                <label for="product_stock">Product Stock:</label>
                <input type="number" id="product_stock" name="product_stock" min="0" required>

                <label for="product_status">Product Status:</label>
                <select id="product_status" name="product_status">
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>

                <label for="product_image">Product Image:</label>
                <input type="file" id="product_image" name="product_image" required>

                <input type="submit" value="Add Product">
            </form>
        </div>
    </section>

    <!-- Footer File -->
    <?php include '../reusableCodes/footer1in.php' ?>
</body>

</html>