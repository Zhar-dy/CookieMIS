<!-- header section start -->
<div class="header_section">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo"><a href="../index.php"><img src="../images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="../index.php">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../about.php">ABOUT</a>
                </li>
                <?php
                if (isset($_SESSION['username'])) {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="../cart.php">OUR PRODUCTS</a>
                </li>
                <?php
                } else {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="../product.php">OUR PRODUCTS</a>
                </li>
                <?php
                }
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="https://search.brave.com/search?q=List+out+10+random+delicious+cookies+i+should+try+today&source=llmSuggest&summary=1&summary_og=95a8fc5e1b5ce91f54581a"><img src="../images/search-icon.png"></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="../login/login.php">SIGN IN</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../register/register.php">REGISTER</a>
                </li>
              </ul>
            </div>
        </nav>
	</div>
	<!-- header section end -->