<!DOCTYPE html>
<html lang="en">
<head>
  <title>CookieMIS</title>
  <!-- Header Meta File -->
  <?php include '../reusableCodes/headerMeta1in.php' ?>
</head>
<body>
  <!-- Header File -->
  <?php include '../reusableCodes/headerStaff.php' ?>
  
  <!-- view section -->
  <section class="product_section">
  <?php include '../reusableCodes/getProductsArray.php'?>

        <div class="container">

            <p class="long_text">Update product details</p>
        </div>
        <div class="container product_container">
        <?php
        // This will get the product from the database
        updateProduct();
        ?>
        </div>
    </section>
  


  <!-- view end -->>

    <!-- Footer File -->
    <?php include '../reusableCodes/footer1in.php' ?>
</body>
</html>