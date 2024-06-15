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

      <!--                 table start here            -->
      <h1 class="label" style="color:lightcoral">Staff: </h1>
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
            Password
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
        
          <?php printStaff() ?>
      </div>




      <!-- NEW TABLE -->
      <h1 class="label" style="color:blueviolet">User: </h1>
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
            Password
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
          <div class="cell" align="center" >
            Action
          </div>
        </div>

        <!--REPEAT THIS BELOW FOR customer with php magic-->
        <?php printUsers() ?>
      </div>
    
    </div>
    <!-- Footer File -->
    <?php include '../reusableCodes/footer1in.php' ?>
</body>

</html>