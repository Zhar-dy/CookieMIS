<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update User</title>
  <!-- Header Meta File -->
  <?php include 'reusableCodes/headerMeta.php' ?>

  <Style>
    .imageP img {

      border-radius: 50%;
      border: 10px solid;
    }
  </Style>

</head>

<body>
  <!-- Header File -->
  <?php include 'reusableCodes/header.php';
  if (!isset($_SESSION['name'])) {
    header('Location: index.php');
  }
  ?>
  <!--view user-->

  <section class="view_product_section">
    <div class="container">
      <h2 class="section-title">User Profile:</h2>
      <form method="POST" action="#" enctype="multipart/form-data">
        <div class="form-group">
          <label for="Username">Username:</label>
          <div class="infoS">[username here]</div>
        </div>
        <div class="form-group">
          <label for="Name">Name:</label>
          <div class="infoS">[Name here]</div>
        </div>

        <div class="form-group">
          <label for="gender">Gender:</label>
          <div class="infoS">[if gender 1 then male]</div>
        </div>

        <div class="form-group">
          <label for="Address">Address:</label>
          <div class="infoS">[Address here]</div>
        </div>

        <div class="form-group">
          <label for="Address">Address:</label>
          <div class="infoS">[Address here]</div>
        </div>

        <div class="form-group">
          <label for="Email">Email:</label>
          <div class="infoS">[Email here]</div>
        </div>

        <div class="form-group">
          <label for="phone_Num">Phone Number:</label>
          <div class="infoS">[phone_Num here]</div>
        </div>

        <div class="form-group">
          <label for="picture">picture:</label>
          <div>[picture here]</div>

          <img src="images/razyn.webp">
        </div>

      </form>
    </div>
  </section>

  <!--view user-->
  <!-- Footer File -->
  <?php include 'reusableCodes/footer.php' ?>
</body>

</html>