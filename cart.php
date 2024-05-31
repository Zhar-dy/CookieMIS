<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cart</title>
  <!-- Header Meta File -->
  <?php include 'reusableCodes/headerMeta.php' ?>
</head>
<body>

	<!-- Header File -->
  <?php include 'reusableCodes/header.php' ?>
  
  <!-- cart section start -->
  <div class="cart_section layout_padding">
    <div class="container">
      <div class="cart_section_2">
        <h2 class="cart_title">Cart</h2>
        <div class="cart_list">
          <ul id="cart-items">
            <!-- Example item that has been added -->
            <li>
              <div class="cart_img" style="width: 50%; height: auto;">
                  <img src="images/jumbo.jpg" alt="Cookie of Creativity" style="width: 100%; height: auto;">
                  </div>
              <div class="cart_info">
                <h4>Cookie of Creativity</h4>
                <p>PRICE RM 5</p>
                <input type="number" min="1" value="1" onchange="updateQuantity(0, this.value)" />
                <button class="btn btn-danger remove-item" onclick="removeItem(0)">Remove</button>
              </div>
            </li>
          </ul>
        </div>
        <div class="cart_total">
          <h4>Total: RM <span id="total-price">5</span></h4>
          <button class="btn btn-primary checkout">Checkout</button>
        </div>
      </div>
    </div>
  </div>
  <!-- cart section end -->

  <!-- Footer File -->
  <?php include 'reusableCodes/footer.php' ?>
</body>
</html>