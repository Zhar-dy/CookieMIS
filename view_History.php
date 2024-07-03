<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Order History</title>
    <!-- Header Meta File -->
    <?php include './reusableCodes/headerMeta.php' ?>
    <style>
  .custom-checkbox-padding {
    padding-left: 2rem; /* Adjust the value as needed */
  }
</style>
</head>

<body>
    <!-- Header File -->
    <?php include 'reusableCodes/header.php' ?>

    <div class="history_container">
        <h1>Orders</h1>
        <h5>Sort by:</h5>
        <div class="list-group">
  <label class="list-group-item d-flex gap-2 align-items-center custom-checkbox-padding">
    <input class="form-check-input me-2" type="checkbox" value="" checked>
    <div>
      Shipping
      <small class="d-block text-muted">See which of your order that is under shipping!</small>
    </div>
  </label>
</div>
<?php include 'reusableCodes/Functions.php';
        orderHistory();?>
    </div>

    <!-- Footer File -->
    <?php include 'reusableCodes/footer.php' ?>
</body>

</html>