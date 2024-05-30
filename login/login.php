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
        <form method="POST" action="processLogin.php">
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
          <p>Don't have an account? <a href="../register/register.php">Create one</a></p>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- sign in section end -->
 
  <!-- Footer File -->
  <?php include '../reusableCodes/footer.php' ?>
</body>
</html>