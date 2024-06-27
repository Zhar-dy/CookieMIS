<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cart</title>
  <!-- Header Meta File -->
  <?php include './reusableCodes/headerMeta.php' ?>
</head>

<body>
  <!-- Header File -->
  <?php include 'reusableCodes/header.php' ?>

  <!-- cart section start -->

        
        <header>
          <p class="long_text" style="font-size: 35px; font-weight: bold">Our Product</p>
          <div class="shopping">
            <img src="images/shopcart.svg">
            <span class="quantity">0</span>
          </div>
        </header>
        <section class="product_section">
          <div class="container product_container" id="productContainer">
            <!-- Product boxes will be appended here by JavaScript, find at app.js -->
          </div>
          <div class="list"></div>

          <!-- For debugging purposes -->
          <?php //include 'reusableCodes/Functions.php';
          //$sata = getProductsWithoutHTML();
          //echo $sata;
          ?>
          <!-- <p>Test</p> -->
  </section>
  <div class="cart">
            <h1 style="font-weight: bold;">Cart</h1>
            <ul class="listCart"></ul>
            <div class="checkOut">
                <div class="total">0</div>
                <div class="closeShopping">Close</div>
            </div>
        </div>
  <!-- cart section end -->

  <!-- Footer File -->
  <?php include 'reusableCodes/footer.php' ?>
  <script src="js/app.js"></script>
</body>

</html>
