<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Testimonial</title>
  <!-- Header Meta File -->
  <?php include 'reusableCodes/headerMeta.php' ?>
</head>
<body>
	<!-- Header File -->
  <?php include 'reusableCodes/header.php' ?>
  <!-- testimonial section start -->
   <!--
  <div class="testimonial_section layout_padding">
    <div class="container">
      <h1 class="testimonial_text">Testimonial</h1>
      <p class="ipsum_text">From our loyal customers</p>
      <div class="testimonial_section_2">
        <div class="box_main">
          <div class="quote_icon"><img src="images/quote-icon.png"></div>
          <p class="dolor_text">  I was impressed on their quality, definitely worth it! </p>
          <div class="client_main">
            <div class="client_left">
              <div class="images_5"><img class="imgUser" src="images/razyn.png"></div>
            </div>
            <div class="client_right">
              <h1 class="sandy_text">Razyn Hazman</h1>
              <p class="sandy_text_1">Computer Science Student</p>
            </div>
          </div>
        </div>
        <div class="box_main">
          <div class="quote_icon"><img src="images/quote-icon.png"></div>
          <p class="dolor_text">  I was amazed</p>
          <div class="client_main">
            <div class="client_left">
              <div class="images_5"><img class="imgUser" src="images/zharfan.png"></div>
            </div>
            <div class="client_right">
              <h1 class="sandy_text">Zharfan</h1>
              <p class="sandy_text_1">Computer Science Student</p>
            </div>
          </div>
        </div>
      </div>
      <div class="see_main">
        <div class="see_bt"><a href="#">See More</a></div>
      </div>
    </div>
  </div> -->
  <!-- testimonial section end -->

  <div class="owl-carousel owl-theme">
  <div class="item"><h4>1</h4></div>
  <div class="item"><h4>2</h4></div>
  <div class="item"><h4>3</h4></div>
  <div class="item"><h4>4</h4></div>
  <div class="item"><h4>5</h4></div>
  <div class="item"><h4>6</h4></div>
</div>

<!-- Add navigation buttons -->
<div class="owl-nav">
  <button class="owl-prev"><i class="fa fa-angle-left"></i></button>
  <button class="owl-next"><i class="fa fa-angle-right"></i></button>
</div>

  <!-- Footer File -->
  <?php include 'reusableCodes/footer.php' ?>
</body>
</html>