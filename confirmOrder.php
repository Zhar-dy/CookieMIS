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
  // if (isset($_POST['data'])) {
  //   $phpVariable = $_POST['data']; // Retrieve data from JavaScript
  //   // Use $phpVariable as needed
  //   echo 'Data received successfully!';
  // }

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

  <form action="test.php">
    <div class="order_container">
      <div class="headers">
        <h1>Order Confirmation</h1>
          <div class="order-details">
          <div class="order-total" id="totalOrder">Order Total: $3137.85</div>
          <button class="place-order-btn" type="send">Place Order</button>
        </div>
      </div>
      <div class="order_section info-box">
        <h2>Your Information</h2>
        <?php
        echo '<h2>' . $_SESSION['username'] . '</h2>';
        ?>
        <input type="hidden" name="name" value="<?php echo $_SESSION['username'] ?>">
      </div>
      <div class="order_section info-box">
        <h2>Delivery Options:</h2>
        <select class="nice-select status-select" name='DeliOptions' id='DeliOptions'>
          <option value="Pickup" selected>Pickup</option>
          <option value="Delivery">Delivery</option>
        </select>
        <div class="order-details">
          <div class="order-total">Pickup/Delivery Date</div>
          <input type="date" name="datep" size="50" required min="<?= date('Y-m-d', strtotime('+1 day')); ?>" />
        </div>
        <div class="order-details">
          <div class="order-total">Pickup/Delivery Time</div>
          <input type="time" name="timep" size="50" required />
        </div>
      </div>
      <div class="order_section shipping-box">
        <h2>Shipping Address</h2>
        <?php
        echo '<h2>' . $_SESSION["address"] . '</h2>';
        ?>
        <input type="hidden" name="name" value="<?php echo $_SESSION["address"] ?>">

      <div class="order_section">
        <h2>Order Items</h2>
        <div id="TestingText"></div>
        <script>
          // const paragraph = document.getElementById('TestingText');
          // const myArray = JSON.parse(savedValue);
          // // Put values in the P and append it in the div
          
          // for (let j = 0; j < myArray.length; j++) {
          //   const cell = document.createElement('p');
          //   cell.textContent = myArray[j]+" "+j;
          //   paragraph.appendChild(cell);
          //   console.log(myArray[j]);
          //   const splittedArray = myArray[j];
          //   const size = Object.entries(splittedArray).length;
          //   // From here on, it's an object with it's respective properties
          //   for (const key in splittedArray) {
          //     const cell2 = document.createElement('p');
          //     cell2.textContent = splittedArray[key];
          //     paragraph.appendChild(cell2);
          //     console.log(splittedArray[key]);
          //   }    
          // }
          
        </script>
        <table class="item-list" id="daTable" style="border:1px;border: double;width: -webkit-fill-available;">
          <tr>
            <th style="text-align:center">Cookie Type</th>
            <th style="text-align:center">Price per Cookie</th>
            <th style="text-align:center">Quantity</th>
            <th style="text-align:center">Shipping Fee</th>
            <th style="text-align:center">Total Price</th>
          </tr>
          <script>
            const paragraph = document.getElementById('TestingText');
            const myArray = JSON.parse(savedValue);
            // Put values in the P and append it in the div
                        
            // Put the data in here through javascript

              const tableBody = document.getElementById('daTable');

              for (let j = 0; j < myArray.length; j++) {
                const row = document.createElement('tr');
                const splittedArray = myArray[j];
                console.log(myArray[j]);
                const cell = document.createElement('td');
                const cell2 = document.createElement('td');
                const cell3 = document.createElement('td');
                const cell4 = document.createElement('td');
                const cell5 = document.createElement('td');
                const cell6 = document.createElement('td');
                row.style.margin = '10px';
                cell.style.textAlign = 'center';
                cell2.style.textAlign = 'center';
                cell3.style.textAlign = 'center';
                cell4.style.textAlign = 'center';
                cell5.style.textAlign = 'center';
                // cell.textContent = `Row ${i + 1}, Column ${j + 1}`;
                cell.textContent = splittedArray['name'] + " " + splittedArray['highlight'];
                cell2.textContent = splittedArray['price'] / splittedArray['quantity']; // Note that price is the final Price
                cell3.textContent = splittedArray['quantity'];
                cell4.textContent = "5MYR";
                cell5.textContent = splittedArray['price'];
                row.appendChild(cell);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                row.appendChild(cell5);
                tableBody.appendChild(row);
              }
              // Backup
              // Put the data in here through javascript
              // const numRows = 5; // Number of rows
              // const numCols = 6; // Number of columns
            const tableBody = document.getElementById('daTable');
            let totalPrice = 0;
            for (let j = 0; j < myArray.length; j++) {
              const row = document.createElement('tr');
              const splittedArray = myArray[j];
              console.log(myArray[j]);
              const cell = document.createElement('td');
              const cell2 = document.createElement('td');
              const cell3 = document.createElement('td');
              const cell4 = document.createElement('td');
              const cell5 = document.createElement('td');
              const cell6 = document.createElement('td');
              row.style.margin = '10px';
              cell.style.textAlign = 'center';
              cell2.style.textAlign = 'center';
              cell3.style.textAlign = 'center';
              cell4.style.textAlign = 'center';
              cell5.style.textAlign = 'center';
              // cell.textContent = `Row ${i + 1}, Column ${j + 1}`;
              cell.textContent = splittedArray['name']+" "+ splittedArray['highlight'];
              cell2.textContent = splittedArray['price']/splittedArray['quantity']; // Note that price is the final Price
              cell3.textContent = splittedArray['quantity'];
              cell4.textContent = "5MYR";
              cell5.textContent = splittedArray['price'];
              totalPrice = totalPrice + splittedArray['price'] + 5;
              row.appendChild(cell);
              row.appendChild(cell2);
              row.appendChild(cell3);
              row.appendChild(cell4);
              row.appendChild(cell5);
              tableBody.appendChild(row);
            }
            const OrderTotal = document.getElementById('totalOrder');
            OrderTotal.textContent = "Order Total: $" + totalPrice; 
            // Backup
            // Put the data in here through javascript
            // const numRows = 5; // Number of rows
            // const numCols = 6; // Number of columns

              // const tableBody = document.getElementById('daTable');

              // for (let i = 0; i < numRows; i++) {
              //     const row = document.createElement('tr');
              //     for (let j = 0; j < numCols; j++) {
              //         const cell = document.createElement('td');
              //         cell.textContent = `Row ${i + 1}, Column ${j + 1}`;
              //         row.appendChild(cell);
              //     }
              //     tableBody.appendChild(row);
              // }
            </script>
          </table>
        </div>
      </div>
    </div>

  </form>
  <!-- Footer File -->
  <?php include 'reusableCodes/footer.php' ?>
  <!-- <script src="js/app.js"></script> -->
</body>

</html>