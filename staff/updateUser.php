<?php
// Include database connection settings
include('../reusableCodes/connectdb.php');
if(isset($_GET['delete'])){
    $userID = $_GET['delete'];
    ?>
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
  <?php 
  include '../reusableCodes/headerStaff.php'; 
    if (!isset($_SESSION['name'])) {
        header('Location: index.php');
      }
      $sql = "DELETE FROM users WHERE user_ID = $userID";
      $query = mysqli_query($conn, $sql);
      if ($query){
        echo("Successfully deleted User");
        header("location:upd_User.php");
        unset($_GET['delete']);
      }else{
        echo("An error occured!");
      }
    

  // This is for update <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
}else if(isset($_GET['update'])){
    $userID = $_GET['update'];
    ?>
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
    $sql = "SELECT * FROM users WHERE user_ID = $userID";
    $query = mysqli_query($conn, $sql);
    // Get total rows of the data
    $totalRows = mysqli_num_rows($query);
    $arrayOfArrays = array();
    // Store the arrays into an array
    $userData = mysqli_fetch_array($query)
    ?>

    <!-- upd profile section start -->
  <!-- Might want to make the delete function, and make a file to save data from this form -->
  
  <div class="update_profile_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="update_text">Update Profile</h1>
          <form method="GET" action="saveUserStaff.php">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name = "name" placeholder="<?php echo $userData[2]?>">
            </div>


            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name = "email" placeholder="<?php echo $userData[6] ?>">
            </div>

            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name = "password" placeholder="Enter your password">
            </div>

            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="tel" class="form-control" id="phone" name = "phone" placeholder="<?php echo $userData[7]?>">
            </div>

            <p>Note: You will need to log in again after updating your account</p>
            <input type="hidden" name="userID" value="<?php echo $userID ?>">
            <button type="submit" class="btn btn-primary" name="update" value="true">Update Profile</button>
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
    <?php
}else{
    echo "Something is funky with the method, causing us to stop unexpectedly";
}