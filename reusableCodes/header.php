<!-- header section start -->
<div class="header_section">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="iconLogo"><a href="index.php"><img src="images/logo.png"></a></div>
    <?php
        if (isset($_SESSION['username'])) {
          echo '<div class="caller">Hello ' . $_SESSION['username'] . '</div>';
        } ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link" href="product.php">OUR PRODUCTS</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">CONTACT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><img src="images/search-icon.png"></a>
        </li>
        <?php
        if (isset($_SESSION['username'])) {
          ifLogin();
        } else {
          withoutLogin();
        }
        //echo ("Username Session: `".$_SESSION['username']." `");
        ?>
      </ul>
    </div>
  </nav>
</div>
<!-- header section end -->


<!-- function section start -->
<?php
function ifLogin()
{
  echo '
    <li class="nav-item dropdown active">
    <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACCOUNT</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="view_User.php">View</a>
      <a class="dropdown-item" href="upduser.php">Update</a>
    </div>
    </li>
  <li class="nav-item dropdown active">
    <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ORDER</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="cart.php">Create</a>
      <a class="dropdown-item" href="view_History.php">View</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login/logout.php">LOG OUT</a>
  </li>';
}

function withoutLogin()
{
  echo '
  <li class="nav-item active">
      <a class="nav-link" href="login/login.php">SIGN IN</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="register/register.php">REGISTER</a>
  </li>';
}

?>
<!-- function section end -->