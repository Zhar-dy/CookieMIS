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
    echo "Session attempt: ".$_SESSION["attempt"];
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
        <h3 class="sign_in_text">Data not found</h3>
        <h3 class="sign_in_text">Wrong Username or Password</h3>
        <form method="POST" action="process.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
          </div>
          <button type="submit" class="btn btn-primary" name="login">SIGN IN</button>
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