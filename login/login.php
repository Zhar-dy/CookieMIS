<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <!-- Header Meta File -->
  <?php include '../reusableCodes/headerMeta1in.php' ?>
</head>
<body>
	<!-- Header File -->
  <?php include '../reusableCodes/header1in.php' ?>
  <!-- sign in section start -->
<div class="sign_in_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="image_2"><img src="../images/cookiebg.jpeg"></div>
      </div>
      <div class="col-md-6">
        <h1 class="sign_in_text">SIGN IN</h1>
        <form>
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name="remember"> Remember me</label>
          </div>
          <button type="submit" class="btn btn-primary">SIGN IN</button>
          <p>Don't have an account? <a href="../register/register.html">Create one</a></p>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- sign in section end -->
  <!-- footer section start -->
  <div class="section_footer ">
      <div class="container"> 
          <div class="footer_section_2">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                  <h2 class="account_text">About Us</h2>
                  <p class="ipsum_text_2">Group of computer science students tries to sell a cookie that is baked/cook with shared passion for excellence, our mission is to delight customers with every bite.</p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <h2 class="account_text">Useful Link</h2>
                  <div class="useful_link">
                    <ul>
                      <li><a class="nav-link" href="../product.html">Cookie</a></li>
                      <li><a class="nav-link" href="../remot.html">Remote control</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                <h2 class="account_text">Contact Us</h2>
                <p class="ipsum_text_2">@Razyn </p>
                </div>
        </div>
      </div>
      <div class="social_icon">
        <ul>
          <li><a href="#"><img src="../images/fb-icon.png"></a></li>
          <li><a href="#"><img src="../images/twitter-icon.png"></a></li>
          <li><a href="#"><img src="../images/linkdin-icon.png"></a></li>
          <li><a href="#"><img src="../images/instagram-icon.png"></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Footer File -->
<?php include '../reusableCodes/footer.php' ?>
</body>
</html>