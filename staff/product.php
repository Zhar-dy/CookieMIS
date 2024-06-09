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
  <?php include '../Functions.php'?>
    <!-- Product section start -->
    <section class="product_section">
        <div class="container">
            <div class="product_text">Our <span style="color: #5ca0e9;">products</span></div>
            <p class="long_text">Cookie that will satisfy your desire</p>
        </div>
        <div class="container product_container">
            <?php
            // This will get the product from the database
            getProducts1In();
            ?>
        </div>
    </section>
    <!-- Product section end -->

  <!-- Footer File -->
  <?php include '../reusableCodes/footer1in.php' ?>
</body>

</html>