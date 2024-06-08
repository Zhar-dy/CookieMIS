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
    <?php include '../reusableCodes/headerStaff.php' ?>

    <section class="add_product_section">
        <div class="container">
            <h2 class="section-title">Add New Product</h2>
            <form  method="POST" action="db_add_product.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_Name">Product Name:</label>
                    <input type="text" id="product_Name" name="product_Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_Name">Product Highlight:</label>
                    <input type="text" id="product_Highlight" name="product_Highlight" class="form-control" required>
                    <b>Note: </b>Might need to add preview for this to work
                </div>

                <div class="form-group">
                    <label for="product_Description">Product Description:</label>
                    <textarea id="product_Description" name="product_Description" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="product_Price">Product Price:</label>
                    <input type="number" id="product_Price" name="product_Price" min="0" step="0.01"
                        class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="product_Stock">Product Stock:</label>
                    <input type="number" id="product_Stock" name="product_Stock" min="0" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="product_Status">Product Status:</label>
                    <select id="product_Status" name="product_Status" class="form-control">
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_image">Product Image:</label>
                    <input type="file" id="file" name="file" class="form-control" required>
                    <!--<input type="hidden" name="pic" value="<?php //echo $row['picture']; ?>" />-->
                </div>

                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </section>

    <!-- Footer File -->
    <?php include '../reusableCodes/footer1in.php' ?>
</body>

</html>