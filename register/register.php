<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <!-- Header Meta File -->
  <?php include '../reusableCodes/headerMeta1in.php' ?>
</head>
<body>
	<!-- Header File -->
  <?php include '../reusableCodes/header1in.php' ?>
  <!-- register section start -->
  <div class="register_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="image_2"><img src="../images/testcook.png"></div>
        </div>
        <div class="col-md-6">
          <h1 class="register_text">REGISTER</h1>
          <form>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
            </div>
        <div class="form-group">
              <label for="Password">Password:</label>
              <input type="Password" id="Password" name="Password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number:</label>
              <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number">
            </div>
            <button type="submit" class="btn btn-primary">REGISTER</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- register section end -->
  <!-- Footer File -->
  <?php include '../reusableCodes/footer.php' ?>
</body>
</html>