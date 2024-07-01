<?php
session_start();
$_SESSION["attempt"] = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <!-- Header Meta File -->
  <?php include 'reusableCodes/headerMeta.php' ?>
</head>

<body>
  <script>
    alert("Order Placed successfully");
  </script>
  <!-- Header File -->
  <?php include 'reusableCodes/header.php' ?>

  <div id="back-to-top"><img src="images/arrow_upward.svg"></div>
  <!-- banner section start -->
  <div class="banner_section layout_padding">
    <div class="container" style="margin-top: 90px">
      <div id="my_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-6">
                <h1 class="video_text">Cookies</h1>
                <h1 class="controller_text">Chocolate</h1>
                <p class="banner_text">With extra chocolate for cookie to satisfy the customers!</p>
                <div class="shop_bt"><a href="product.php">Shop Now</a></div>
              </div>
              <div class="col-md-6">
                <div class="image_1"><img src="images/cookie.png"></div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-6">
                <h1 class="video_text">Cookies</h1>
                <h1 class="controller_text">Creativity</h1>
                <p class="banner_text">Unique that will catch your eyes!</p>
                <div class="shop_bt"><a href="product.php">Shop Now</a></div>
              </div>
              <div class="col-md-6">
                <div class="image_1"><img src="images/cookies/jumbo.png"></div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- banner section end -->
  <!-- about section start -->
  <div class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="image_2"><img src="images/cookiebg.jpeg"></div>
        </div>
        <div class="col-md-6">
          <h1 class="about_text">ABOUT</h1>
          <p class="lorem_text">Every cookies that we made are about our passions and customers needs</p>
          <div class="shop_bt_2"><a href="product.php">Shop Now</a></div>
        </div>
      </div>
    </div>
  </div>
  <!-- about section end -->
  <!-- product section start -->
  <div class="product_section layout_padding">
    <div class="container">
      <div class="product_text">Our <span style="color: #5ca0e9;">products</span></div>
      <p class="long_text">Cookie that will satisfy your desire</p>
      <div class="container product_container">
        <div class="box">
          <div class="img-box">
            <img src="images/cookies/jumbo.png" alt="Jumbo Cookie">
          </div>
          <div class="detail-box">
            <h6>Cookie of <span>Creativity</span></h6>
            <p class="long_text">Only cookie created with passions</p>
            <h5>RM5.0</h5>
          </div>
        </div>
      </div>
      <div class="see_main">
        <div class="see_bt"><a href="product.php">See More</a></div>
      </div>
    </div>
    <!-- product section end -->
    <!-- video section start -->
    <div class="video_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class="video_text_2">Cookies</h1>
            <h1 class="controller_text_2">are not just a snack</h1>
            <p class="banner_text_2">They are also a joy, fostering cherished moments of connection and celebration. </p>
            <div class="shop_bt"><a href="product.php">Shop Now</a></div>
          </div>
          <div class="col-md-6">
            <div class="image_4"><img src="images/family.jpg"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- video section end -->

    <!-- Footer File -->
    <?php include 'reusableCodes/footer.php' ?>
</body>

</html>