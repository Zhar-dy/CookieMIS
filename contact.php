<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact</title>
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

  <!-- contact section start -->
  <div class="contact_section layout_padding padding_top_0">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="email_box">
                    <div class="input_main">
                       <div class="container">
                          <form action="/action_page.php">
                            <div class="form-group">
                              <input type="text" class="email-bt" placeholder="Name" name="Name">
                            </div>
                            <div class="form-group">
                              <input type="text" class="email-bt" placeholder="Email" name="Name">
                            </div>
                            <div class="form-group">
                              <input type="text" class="email-bt" placeholder="Phone Numbar" name="Email">
                            </div>
                            
                            <div class="form-group">
                                <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                            </div>
                          </form>   
                       </div> 
                        <div class="main_bt"><a href="#">SEND</a></div>                  
                    </div>
                 </div>
        </div>
        <div class="col-md-6">
          <div class="image_6"><img src="images/cuteCookie.jpg"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- contact section end -->
  <!-- Footer File -->
<?php include 'reusableCodes/footer.php' ?>
</body>
</html>