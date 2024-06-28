<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Confirmation</title>
  <!-- Header Meta File -->
  <?php include './reusableCodes/headerMeta.php' ?>
</head>

<body>
  <!-- Header File -->
  <?php include 'reusableCodes/header.php' ?>

  <div class="order_container">
    <div class="headers">
      <h1>Order Confirmation</h1>
      <div class="order-details">
        <div class="order-total">Order Total: $3137.85</div>
        <button class="place-order-btn">Place Order</button>
      </div>
    </div>
    <div class="order_section info-box">
      <h2>Your Information</h2>
      <?php
      echo '<h2>' . $_SESSION['username'] . '</h2>';
      ?>
    </div>
    <div class="order_section shipping-box">
      <h2>Shipping Address</h2>
      <?php
      echo '<h2>' . $_SESSION["address"] . '</h2>';
      ?>
      <div class="order-details">
      <div class="order-total">Pickup Date</div>
        <input type="date" name="datep" size="50" />
      </div>
      <div class="order-details">
      <div class="order-total">Pickup Time</div>
        <input type="time" name="timep" size="50" />
    </div></div>

    <div class="order_section">
      <h2>Order Items</h2>
      <table class="item-list">
        <tr>
          <th>Item</th>
          <th>Retailer</th>
          <th>Attributes</th>
          <th>Quantity</th>
          <th>Shipping</th>
          <th>Price</th>
        </tr>
        <tr>
          <td>MARNI Blue Trunk Bag In Buffalo</td>
          <td>Marni</td>
          <td>Color: Blue<br>Size: One Size</td>
          <td>1</td>
          <td>$15.00</td>
          <td>$2160.00</td>
        </tr>
      </table>
    </div>
  </div>

  <!-- Footer File -->
  <?php include 'reusableCodes/footer.php' ?>
  <script src="js/app.js"></script>
</body>

</html>