<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <!-- Header Meta File -->
  <?php include '../reusableCodes/headerMeta1in.php' ?>
</head>
<body>
	<!-- Header File -->
  <?php include '../reusableCodes/header1in.php';
  session_start();
    if ($_SESSION["attempt"] > 4){
      header("Location: maxLoginAttempt.php");
    };
  ?>
  <!-- sign in section start -->
<div class="sign_in_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="image_2"><img src="../images/cookiebg.jpeg"></div>
      </div>
      <div class="col-md-6">
        <h1 class="sign_in_text">SIGN IN</h1>
        <form method="POST" action="process.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
          </div>
          <button type="submit" class="btn btn-primary" name="login" style="margin-right: 15px;">SIGN IN</button>
          <a style="color: red;font-size: 20px;">Wrong Username or Password</a>
          <p>Don't have an account? <a href="../register/register.php">Create one</a></p>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- sign in section end -->
  <!-- Footer File -->
<?php include '../reusableCodes/footer1in.php' ?>
</body>
</html>