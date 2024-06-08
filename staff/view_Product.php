<?php
  session_start();
?>
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

  <?php include '../reusableCodes/getProductsArray.php';
  updateProduct() ?>


  <!-- view end -->>

    <!-- Footer File -->
    <?php include '../reusableCodes/footer1in.php' ?>
</body>
</html>