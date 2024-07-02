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
        <div class="order-section">
            <h2>01-07-2024</h2> <!-- print the order date -->
            <div class="order">
                <div class="order-header">
                    <div>
                        <a class="bigTxt">Order ID: 19539905517300</a>
                    </div>
                </div>
                <div class="order-details">
                    <div>
                        <h5>Order Status: </h5>
                        <div class="status"><span class="delivered">Delivered</span></div>
                    </div>
                    <div>
                        <h5>Total cost: </h5>
                        <div class="h5"> RM 78.00</div>
                    </div>
                    <div>
                        <h5>Pickup Date: </h5>
                        <div class="h5"> 2024-blahblah</div>
                    </div>
                    <div>
                        <h5>Details: </h5>
                        <div class="smallTXT"> woww this website really cool, can I hire you work with google.com?</div>
                    </div>
                </div>
                <div class="order-items">
                    <div class="item">
                        <img src="images/cookies/chewy.png" alt="chewy cookie">
                        <div>Cookie of Chewy<br>RM 8</div>
                        <div>Quantity: <br>3</div>
                    </div>
                    <div class="item">
                        <img src="images/cookies/peanut.png" alt="peanut cookie">
                        <div>Cookie of Peanut<br>RM 1</div>
                        <div>Quantity: <br>10</div>
                    </div>
                    <div class="item">
                        <img src="images/cookies/jumbo.png" alt="Cookie of Creativity">
                        <div>Cookie of Creativity<br>RM 5</div>
                        <div>Quantity: <br>5</div>
                    </div>
                </div>
            </div>
        </div>





        <div class="order-section">
            <h2>21-04-2024</h2> <!-- print the order date -->
            <div class="order">
                <div class="order-header">
                    <div>
                        <a class="bigTxt">Order ID: 19539905517300</a>
                    </div>
                </div>
                <div class="order-details">
                    <div>
                        <h5>Order Status: </h5>
                        <div class="status"><span class="pending">Pending</span></div>
                    </div>
                    <div>
                        <h5>Total cost: </h5>
                        <div class="h5"> RM 78.00</div>
                    </div>
                    <div>
                        <h5>Pickup Date: </h5>
                        <div class="h5"> 2024-blahblah</div>
                    </div>
                    <div>
                        <h5>Details: </h5>
                        <div class="smallTXT"> woww this website really cool, can I hire you work with google.com?</div>
                    </div>
                </div>
                <div class="order-items">
                    <div class="item">
                        <img src="images/cookies/chewy.png" alt="chewy cookie">
                        <div>Cookie of Chewy<br>RM 8</div>
                        <div>Quantity: <br>7</div>
                    </div>
                    <div class="item">
                        <img src="images/cookies/jumbo.png" alt="Cookie of Creativity">
                        <div>Cookie of Creativity<br>RM 5</div>
                        <div>Quantity: <br>2</div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Footer File -->
    <?php include 'reusableCodes/footer.php' ?>
</body>

</html>