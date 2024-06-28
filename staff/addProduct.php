<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Product</title>
    <!-- Header Meta File -->
    <?php include '../reusableCodes/headerMeta1in.php' ?>

    <style>
        .fonts {
            font-size: 20px;
            font-weight: bold;
            color: #191919;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <!-- Header File -->
    <?php include '../reusableCodes/headerStaff.php' ?>

    <section class="add_product_section">
        <div class="container" style="margin-top: 30px;">
            <h2 class="section-title">Add New Product</h2>
            <form method="POST" action="db_add_product.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_Name">Product Name:</label>
                    <input type="text" id="product_Name" name="product_Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="product_Name">Product Highlight:</label>
                    <input type="text" id="product_Highlight" name="product_Highlight" class="form-control" required>
                    <div>Example:</div>
                    <b id="productPreview" class="product_text"></b>
                </div>
                <button type="button" id="previewButton" class="btn btn-secondary">Preview</button>

                <div class="form-group">
                    <label for="product_Description">Product Description:</label>
                    <textarea id="product_Description" name="product_Description" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="product_Price">Product Price:</label>
                    <input type="number" id="product_Price" name="product_Price" min="0" step="0.01" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="product_Stock">Product Stock:</label>
                    <input type="number" id="product_Stock" name="product_Stock" min="0" class="form-control" required>
                </div>
                <div class="form-group">
                    <h6 for="product_Status">Product Status:</h6>
                    <select class="status-select" name='product_Status' id='product_Status'>
                        <option value="Available" selected>Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_image">Product Image:</label>
                    <input type="file" id="file" name="file" class="form-control" required>
                    <!--<input type="hidden" name="pic" value="<?php //echo $row['picture']; 
                                                                ?>" />-->
                </div>

                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </section>

    <!-- Footer File -->


    <script>
        document.getElementById('previewButton').addEventListener('click', function() {
            const productName = document.getElementById('product_Name').value;
            const productHighlight = document.getElementById('product_Highlight').value;
            const previewDiv = document.getElementById('productPreview');

            if (productName && productHighlight) {
                previewDiv.innerHTML = `<p class= 'fonts'>${productName} <span style="color: #5ca0e9;">${productHighlight}</span></p>`;
            } else {
                previewDiv.innerHTML = 'Please enter both Product Name and Product Highlight.';
            }
        });
    </script>
</body>

</html>