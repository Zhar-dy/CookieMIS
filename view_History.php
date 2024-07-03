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
        <div class="list-group">
  <label class="list-group-item d-flex gap-2 align-items-center custom-checkbox-padding">
    
  </label>
</div>
<?php include 'reusableCodes/Functions.php';
        orderHistory();?>
    </div>

    <!-- Footer File -->
    <?php include 'reusableCodes/footer.php' ?>
</body>

</html>