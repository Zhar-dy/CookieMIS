<div?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cart</title>
  <!-- Header Meta File -->
  <?php include '../reusableCodes/headerMeta1in.php' ?>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Header File -->
  <?php include '../reusableCodes/header1in.php' ?>

  <!-- cart section start -->

        <div class="container">
        <header>
            <h1>Your Shopping Cart</h1>
            <div class="shopping">
                <img src="../images/shopcart.svg">
                <span class="quantity">0</span>
            </div>
        </header>
  <section class="product_section">
    <div class="container product_container" id="productContainer">
        <!-- Product boxes will be appended here by JavaScript -->
    </div>
        <div class="list"></div>
    </div>
  </section>
  <div class="card">
            <h1>Card</h1>
            <ul class="listCard"></ul>
            <div class="checkOut">
                <div class="total">0</div>
                <div class="closeShopping">Close</div>
            </div>
        </div>
  <!-- cart section end -->

  <!-- Footer File -->
  <?php include '../reusableCodes/footer1in.php' ?>
  <script src="app.js"></script>
</body>

</html>
