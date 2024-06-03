<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product</title>
    <!-- Header Meta File -->
    <?php include 'reusableCodes/headerMeta.php' ?>
</head>

<body>
    <!-- Header File -->
  <?php 
  if (isset($_SESSION)){
    include 'reusableCodes/headerUser.php';
  }else{
    include 'reusableCodes/header.php';
  }
  ?>

    <!-- Product section start -->
    <section class="product_section">
        <div class="container">
            <div class="product_text">Our <span style="color: #5ca0e9;">products</span></div>
            <p class="long_text">Cookie that will satisfy your desire</p>
        </div>
        <div class="container product_container">
            <div class="box">
                <div class="img-box">
                    <img src="images/jumbo.png" alt="Jumbo Cookie">
                </div>
                <div class="detail-box">
                    <h6>Cookie of <span>Creativity</span></h6>
                    <p class="long_text">Only cookie created with passions</p>
                    <h5>RM5.0</h5>
                    <a href="#">BUY NOW</a>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/chewy.png" alt="chewy Cookie">
                </div>
                <div class="detail-box">
                    <h6>Cookie of <span>Chewy</span></h6>
                    <p class="long_text">Only cookie created with passions</p>
                    <h5>RM8.0</h5>
                    <a href="#">BUY NOW</a>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/choccookie.png" alt="Choc Cookie">
                </div>
                <div class="detail-box">
                    <h6>Chocolate Chip <span>Cookie</span></h6>
                    <p class="long_text">Sweetness that is unbeatable</p>
                    <h5>RM7.0</h5>
                    <a href="#">BUY NOW</a>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/peanut.png" alt="Choc Cookie">
                </div>
                <div class="detail-box">
                    <h6>Peanut <span>Cookie</span></h6>
                    <p class="long_text">peanut cookie!</p>
                    <h5>RM3.0</h5>
                    <a href="#">BUY NOW</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Product section end -->

    <!-- Footer File -->
    <?php include 'reusableCodes/footer.php' ?>
</body>

</html>