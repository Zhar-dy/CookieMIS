
<!-- header section start -->
<div class="header_section">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="iconLogo"><a href="index.php"><img src="../images/logo.png"></a></div>
    <?php
    echo '<div class="caller">Hello Staff ' . $_SESSION['username'] . '</div>';
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><img src="../images/search-icon.png"></a>
        </li>
        <li class="nav-item dropdown active">
          <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USERS</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../staff/view_User.php">VIEW</a>
            <a class="dropdown-item" href="../staff/upd_User.php">UPDATE</a>
          </div>
        </li>
        <li class="nav-item dropdown active">
          <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">STOCK</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../staff/addProduct.php">CREATE</a>
            <a class="dropdown-item" href="../staff/view_Product.php">VIEW</a>
          </div>
        </li>
        <li class="nav-item dropdown active">
          <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ORDER</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="view_Order.php">Current</a>
            <a class="dropdown-item" href="view_History.php">History</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../login/logout.php">LOG OUT</a>
        </li>
      </ul>
    </div>
  </nav>
</div>
<!-- header section end -->