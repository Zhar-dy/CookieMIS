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
  include '../reusableCodes/Functions.php';
  ?>
  <!--,,-->
  <div class="product_section layout_padding">
    <div class="container">
      <h1 class="about_text" style="text-align:center">View User Info</h1>


      <!-- What you want to do here is basically save the id of each registered user in an array -->
      <!-- and then you view user base on the selected button. But the question is, -->
      <!-- How do you find the user ID, how to save it an array and fetch it later, and how to select the right thing? -->
      <!-- More importantly, is the viewUser and view_Detailed_User the same thing? if it is, then copy paste...? -->
      <!--                 table start here            -->
      <h1 class="label" style="color:lightcoral">Staff: </h1>
      <form action="view_Detail_User.php" method="POST">
        <input type="Hidden" class="btn btn-secondary" name="type" value="admin">
        <div class="table-container">
          <div class="table">
            <!--no need to chang tbh-->
            <div class="trow header">
              <div class="cell">
                Username
              </div>
              <div class="cell">
                Name
              </div>
              <div class="cell">
                gender
              </div>
              <div class="cell">
                Address
              </div>
              <div class="cell">
                Email
              </div>
              <div class="cell">
                Phone Number
              </div>
              <div class="cell" align="center">
                Action
              </div>
            </div>

            <!--REPEAT THIS BELOW with php magic-->

            <?php $staffArray = printStaff() ?>
          </div>
        </div>
      </form>




      <!-- NEW TABLE -->
      <h1 class="label" style="color:blueviolet">User: </h1>
      <form action="view_Detail_User.php" method="POST">
        <input type="Hidden" class="btn btn-secondary" name="type" value="user">
        <div class="table-container">
          <div class="table">
            <!--no need to chang tbh-->
            <div class="trow blue header">
              <div class="cell">
                Username
              </div>
              <div class="cell">
                Name
              </div>
              <div class="cell">
                gender
              </div>
              <div class="cell">
                Address
              </div>
              <div class="cell">
                Email
              </div>
              <div class="cell">
                Phone Number
              </div>
              <div class="cell" align="center">
                Action
              </div>
            </div>

            <!--REPEAT THIS BELOW FOR customer with php magic-->
            <?php $userArray = printUsers() ?>
          </div>
        </div>
      </form>
    </div>
    <!-- Footer File -->

</body>

</html>