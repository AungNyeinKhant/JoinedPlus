<!DOCTYPE html>
<html lang="en">

<head>
  <title>Joined+ eCommerce</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="apple-touch-icon" href="assets/img/apple-icon.png" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/templatemo.css" />
  <link rel="stylesheet" href="assets/css/custom.css" />

  <!-- Load fonts style after rendering the layout styles -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap" />
  <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
  <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
  <!-- Start Top Nav -->
  <!-- <nav
      class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block"
      id="templatemo_nav_top"
    >
      <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
          <div>
            <i class="fa fa-envelope mx-2"></i>
            <a
              class="navbar-sm-brand text-light text-decoration-none"
              href="mailto:info@company.com"
              >info@company.com</a
            >
            <i class="fa fa-phone mx-2"></i>
            <a
              class="navbar-sm-brand text-light text-decoration-none"
              href="tel:010-020-0340"
              >010-020-0340</a
            >
          </div>
          <div>
            <a
              class="text-light"
              href="https://fb.com/templatemo"
              target="_blank"
              rel="sponsored"
              ><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i
            ></a>
            <a
              class="text-light"
              href="https://www.instagram.com/"
              target="_blank"
              ><i class="fab fa-instagram fa-sm fa-fw me-2"></i
            ></a>
            <a class="text-light" href="https://twitter.com/" target="_blank"
              ><i class="fab fa-twitter fa-sm fa-fw me-2"></i
            ></a>
            <a
              class="text-light"
              href="https://www.linkedin.com/"
              target="_blank"
              ><i class="fab fa-linkedin fa-sm fa-fw"></i
            ></a>
          </div>
        </div>
      </div>
    </nav> -->
  <!-- Close Top Nav -->

  <?php
  $db = mysqli_connect("localhost", "root", "", "joishop");

  $count = 0;
  $countquery = "SELECT * FROM order66 WHERE status=1";
  $countR = mysqli_query($db, $countquery);
  while ($go = mysqli_fetch_array($countR)) {
    $count++;
  }



  ?>

  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-light shadow headChange ">
    <div class="container d-flex justify-content-between align-items-center">
      <a class="navbar-brand text-success logo h1 align-self-center logoSize" href="index.php">
        <img src="assets/img/headIcon.png" alt="Logo" />
      </a>

      <button class="navbar-toggler border-0 " type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
        <div class="flex-fill">
          <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
            <li class="nav-item">
              <a class="nav-link  <?php if ($id == "home") {
                                    echo 'activePg';
                                  };   ?>" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($id == "about") {
                                    echo 'activePg';
                                  };   ?>" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($id == "shop") {
                                    echo 'activePg';
                                  };   ?>" href="shop.php">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($id == "contact") {
                                    echo 'activePg';
                                  };   ?>" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($id == "reg") {
                                    echo 'activePg';
                                  };   ?>" href="register.php">Register</a>
            </li>
          </ul>
        </div>
        <div class="navbar align-self-center d-flex">
          <!-- <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
            <div class="input-group">
              <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ..." />
              <div class="input-group-text">
                <i class="fa fa-fw fa-search"></i>
              </div>
            </div>
          </div> -->
          <!--  -->
          <a class="nav-icon d-none d-lg-inline" href="#" data-bs-target="#templatemo_search" data-bs-toggle="modal">
            <i class="fa fa-fw fa-search text-dark mr-2"></i>
          </a>
          <a class="nav-icon position-relative text-decoration-none" href="cart.php">
            <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light " style="color: black;"> <?php echo $count; ?> </span>
          </a>
          <!-- <a class="nav-icon position-relative text-decoration-none" href="#">
            <i class="fa fa-fw fa-user text-dark mr-3"></i>
            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
          </a> -->
        </div>
      </div>
    </div>
  </nav>
  <!-- Close Header -->


  <!-- sank -->