<?php
  session_start();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update User</title>
  <!-- Header Meta File -->
  <?php include '../reusableCodes/headerMeta1in.php' ?>
</head>
<body>
	<!-- Header File -->
  <?php include '../reusableCodes/headerStaff.php';
  if (!isset($_SESSION['name'])) {
    header('Location: index.php');
  }
  ?>

  <!-- upd profile section start -->
  <!-- Note: Might want to fetch user's details and update them here-->
  <div class="update_profile_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="update_text">Update Profile</h1>
          <form method="POST" action="../reusableCodes/updateUser.php">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name = "name" placeholder="<?php echo $_SESSION['name']?>">
            </div>


            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name = "email" placeholder="<?php echo $_SESSION["email"]?>">
            </div>

            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name = "password" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="tel" class="form-control" id="phone" name = "phone" placeholder="<?php echo $_SESSION["phone_Num"]?>">
            </div>

            <p>Note: You will need to log in again after updating your account</p>
            <button type="submit" class="btn btn-primary" name="update">Update Profile</button>
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