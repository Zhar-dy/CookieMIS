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
          <div class="order-total" id="totalOrder">Order Total: $3137.85</div>
          <input type="hidden" id="priceTotal" name="priceTotal">
          <button class="place-order-btn" type="send">Place Order</button>
        </div>
      </div>
      <div class="order_section info-box">
        <h2>Your Information</h2>
        <?php
        echo '<h2>' . $_SESSION['username'] . '</h2>';
        
        echo '<h2>(+60) ' . $_SESSION['phone_Num'] . '</h2>';
        ?>
        <input type="hidden" name="name" value="<?php echo $_SESSION['username'] ?>">
      </div>
      <div class="order_section info-box">
        <h2>Recieve Options:</h2>
        <h2 style="color: gray;">*NOTE: RM 5 will be added in total for delivery option</h2>
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
        <textarea id="moreInstruct" name="moreInstruct" class="form-control" placeholder="Insert Additional Instruction" maxlength="85"></textarea>
        <p id="charCount">0 / 125 characters</p>
      </div>
      <div class="order_section" id="divToAddHiddenData">
        <div id="TestingText"></div>
        <h2>Order Items</h2>
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
            dataArray.type = 'hidden';
            dataArray.name = 'arrayOrder';
            totalPrice += splittedArray['price'] + 5;
            const imgElement = document.createElement('img');
            imgElement.src = 'images/cookies/' + splittedArray['image']; // Set the image source
            // Append the <img> element to the cell
            cell1.appendChild(imgElement);
            cell1.style.width = "5rem";
            cell1.style.height = "5rem";

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
          OrderTotal.textContent = "Order Total: $" + totalPrice;
          OrderTotal.textContent = "Order Total: RM" + totalPrice;
          const priceTotalInput = document.getElementById("priceTotal");
          priceTotalInput.value = totalPrice;
          
          //max character(for additional info) stuff
          const textarea = document.getElementById('moreInstruct');
          const charCount = document.getElementById('charCount');
          const maxChars = 125;

          textarea.addEventListener('input', () => {
            let currentLength = textarea.value.length;
            if (currentLength > maxChars) {
              textarea.value = textarea.value.slice(0, maxChars);
              currentLength = maxChars;
            }
            charCount.textContent = `${currentLength} / ${maxChars} characters`;
          });
        </script>

      </div>
    </div>
    </div>

        </form>
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<!-- javascript -->
<script src="js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>