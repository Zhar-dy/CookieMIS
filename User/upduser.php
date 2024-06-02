<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update User</title>
  <!-- Header Meta File -->
  <?php include '../reusableCodes/headerMeta1in.php' ?>
</head>

<body>
  <!-- Header File -->
  <?php include '../reusableCodes/headerUser.php' ?>
  <!-- upd profile section start -->
  <div class="update_profile_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="update_text">Update Profile</h1>
          <form>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" placeholder="Enter your password">
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- upd profile section end -->
  <!-- Footer File -->
  <?php include '../reusableCodes/footer1in.php' ?>
</body>

</html>