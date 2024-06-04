<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Product</title>
    <!-- Header Meta File -->
    <?php include '../reusableCodes/headerMeta1in.php' ?>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header File -->
    <?php include '../reusableCodes/headerUser.php' ?>

    <section class="add_product_section">
        <div class="container">
            <h2 class="section-title">Add New Product</h2>
            <form action="addProduct.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="product_desc">Product Description:</label>
                    <textarea id="product_desc" name="product_desc" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="product_price">Product Price:</label>
                    <input type="number" id="product_price" name="product_price" min="0" step="0.01" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="product_stock">Product Stock:</label>
                    <input type="number" id="product_stock" name="product_stock" min="0" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="product_status">Product Status:</label>
                    <select id="product_status" name="product_status" class="form-control">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_image">Product Image:</label>
                    <input type="file" id="product_image" name="product_image" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </section>

    <!-- Footer File -->
    <?php include '../reusableCodes/footer1in.php' ?>
</body>

</html>