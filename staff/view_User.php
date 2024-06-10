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
  ?>
  <!--,,-->
  <div class="banner_section layout_padding">
    <div class="container">
    <h1 class="video_text" style="margin-bottom: 20px;">View User Info</h1>

      <!--                 table start here            -->
      <h1 class="label">Staff: </h1>
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
            password
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
        </div>

        <!--REPEAT THIS BELOW with php magic-->
        <div class="trow">
          <div class="cell">
            Batman
          </div>
          <div class="cell">
            Duke Arkham
          </div>
          <div class="cell">
            passIsSecure
          </div>
          <div class="cell">
            if 1 then male
          </div>
          <div class="cell">
            Klang, Selangor(klang need batman)
          </div>
          <div class="cell">
            Justice@gmail.com
          </div>
          <div class="cell">
            991
          </div>
        </div>
      </div>




      <!-- NEW TABLE -->
      <h1 class="label">User: </h1>
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
            password
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
        </div>

        <!--REPEAT THIS BELOW FOR customer with php magic-->
        <div class="trow">
          <div class="cell">
            Batman
          </div>
          <div class="cell">
            Duke Arkham
          </div>
          <div class="cell">
            passIsSecure
          </div>
          <div class="cell">
            if 1 then male
          </div>
          <div class="cell">
            Klang, Selangor(klang need batman)
          </div>
          <div class="cell">
            Justice@gmail.com
          </div>
          <div class="cell">
            991
          </div>
        </div>
      </div>
    
    </div>
    <!-- Footer File -->
    <?php include '../reusableCodes/footer1in.php' ?>
</body>

</html>