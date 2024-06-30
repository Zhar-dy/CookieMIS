<!DOCTYPE html>
<html lang="en">
<head>
  <title>Confirmation</title>
  
  <!-- Header Meta File -->
  <?php include './reusableCodes/headerMeta.php' ?>
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:login/login.php');
}


// $receivedData = json_decode(file_get_contents('php://input'), true);
// $phpVariable = $receivedData['data']; // Your PHP variable
// Use $phpVariable as needed
// echo 'Data received successfully!';
// echo "Data Received: ".$phpVariable." Only";
// $data = $_GET['data'];
// $receivedData = json_decode($data,true);
// print_r($receivedData)."<br><br>";
// print_r($receivedData[0])."<br><br>";
// echo $receivedData[0]['name'];
?>
<script>
    // On page 2
    const savedValue = sessionStorage.getItem('cartList');
    console.log(savedValue);
    
  </script>
  <!-- Header File -->
  <?php include 'reusableCodes/header.php' ?>

  <div class="order_container">
    <div class="headers">
      <h1>Order Confirmation</h1>
      <?php echo "This is Cart Data".$_SESSION['cartData']; ?>
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
      <div id="TestingText"></div>
      <script>
        const paragraph = document.getElementById('TestingText');
        const myArray = JSON.parse(savedValue);
        // Put values in the P and append it in the div
        
        for (let j = 0; j < myArray.length; j++) {
          const cell = document.createElement('p');
          cell.textContent = myArray[j]+" "+j;
          paragraph.appendChild(cell);
          console.log(myArray[j]);
          const splittedArray = myArray[j];
          const size = Object.entries(splittedArray).length;
          // From here on, it's an object with it's respective properties
          for (const key in splittedArray) {
            const cell2 = document.createElement('p');
            cell2.textContent = splittedArray[key];
            paragraph.appendChild(cell2);
            console.log(splittedArray[key]);
          }    
        }
        
      </script>
      <table class="item-list" id="daTable">
        <tr>
          <th>Item</th>
          <th>Retailer</th>
          <th>Attributes</th>
          <th>Quantity</th>
          <th>Shipping</th>
          <th>Price</th>
        </tr>
        <script>
          // Put the data in here through javascript
          const numRows = 5; // Number of rows
          const numCols = 6; // Number of columns

          const tableBody = document.getElementById('daTable');

          for (let i = 0; i < numRows; i++) {
              const row = document.createElement('tr');
              for (let j = 0; j < numCols; j++) {
                  const cell = document.createElement('td');
                  cell.textContent = `Row ${i + 1}, Column ${j + 1}`;
                  row.appendChild(cell);
              }
              tableBody.appendChild(row);
          }
        </script>
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
  <!-- <script src="js/app.js"></script> -->
</body>

</html>