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
          <div class="image_2"><img src="../images/testcook.png" alt="Register Image"></div>
        </div>
        <div class="col-md-6">

          <h1 class="register_text">REGISTER</h1>
          <form action="process.php" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
            </div>

            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
              <label for="gender">Gender: </label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="1" required>
                <label class="form-check-label" for="male">Male</label>
              </div>
              
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="2" required>
                <label class="form-check-label" for="female">Female</label>
              </div>
            </div>

            <div class="form-group">
              <label for="address">Address:</label>
              <textarea type="text" id="address" name="address" class="form-control" placeholder="Enter your address" required></textarea>
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
              <label for="phone">Phone Number:</label>
              <input type="tel" id="phone" name="phonenum" class="form-control" placeholder="Enter your phone number" required>
            </div>

            <div class="form-group">
              <label for="file">Profile Picture:</label>
              <input type="file" id="file" name="file" class="form-control">
            </div>

            <input type="hidden" name="level" value="2" />
            <button type="submit" class="btn btn-primary" name="signup">REGISTER</button>
          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- register section end -->
  <!-- Footer File -->
  <?php include '../reusableCodes/footer1in.php' ?>
</body>

</html>