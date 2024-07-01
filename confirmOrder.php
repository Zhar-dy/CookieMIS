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

  <form action="addOrder.php" method="POST">
    <div class="order_container">
      <div class="headers">
        <h1>Order Confirmation</h1>
        <div class="order-details">
          <div class="order-total" id="totalOrder">Order Total: RM3137.85</div>
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
        <h2>Delivery Options: (NOTE: RM 5 will be added in total for delivery option)</h2>
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
        <!-- <input type="hidden" name="name" value="<?php //echo $_SESSION["address"] 
                                                      ?>"> -->
      </div>
      <div class="order_section info-box">
        <h2>Additional Instruction</h2>
        <textarea id="moreInstruct" name="moreInstruct" class="form-control" placeholder="Insert Additional Instruction"></textarea>
      </div>
      <div class="order_section" id="divToAddHiddenData">
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
        <table class="table" id="daTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col" style="text-align:center">Image</th>
              <th scope="col" style="text-align:center">Cookie Type</th>
              <th scope="col" style="text-align:center">Price per Cookie</th>
              <th scope="col" style="text-align:center">Quantity</th>
              <th scope="col" style="text-align:center">Total Price</th>
            </tr>
          </thead>
          <tbody id="tableBody">
            <!-- data will be inserted here -->
          </tbody>
        </table>

        <script>
          const tableBody = document.getElementById('tableBody');
          const myArray = JSON.parse(savedValue);
          let totalPrice = 0;
          const CookieData = [];
          const dataArray = document.createElement('input');
          dataArray.type = 'hidden';
          dataArray.name = 'arrayOrder';

          for (let j = 0; j < myArray.length; j++) {
            const row = document.createElement('tr');
            const splittedArray = myArray[j];

            const cell1 = document.createElement('td');
            cell1.textContent = "Image here";
            cell1.className = 'text-center';

            const cell2 = document.createElement('td');
            cell2.textContent = splittedArray['name'] + " " + splittedArray['highlight'];
            cell2.className = 'text-center';

            const cell3 = document.createElement('td');
            cell3.textContent = splittedArray['price'] / splittedArray['quantity'];
            cell3.className = 'text-center';

            const cell4 = document.createElement('td');
            cell4.textContent = splittedArray['quantity'];
            cell4.className = 'text-center';

            const cell5 = document.createElement('td');
            cell5.textContent = splittedArray['price'];
            cell5.className = 'text-center';

            totalPrice += splittedArray['price'] + 5;

            row.appendChild(cell1);
            row.appendChild(cell2);
            row.appendChild(cell3);
            row.appendChild(cell4);
            row.appendChild(cell5);
            tableBody.appendChild(row);

            CookieData.push(splittedArray['cookieID']);
            CookieData.push(splittedArray['quantity']);
          }

          dataArray.value = CookieData;
          const divHidden = document.getElementById('divToAddHiddenData');
          divHidden.appendChild(dataArray);

          console.log("Cookie Array is: ");
          console.log(CookieData);

          const OrderTotal = document.getElementById('totalOrder');
          OrderTotal.textContent = "Order Total: RM" + totalPrice;
        </script>
      </div>
    </div>
    </div>

  </form>
  <!-- Footer File -->
  <?php include 'reusableCodes/footer.php' ?>
  <!-- <script src="js/app.js"></script> -->
</body>

</html>