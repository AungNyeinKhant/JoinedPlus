<?php

$id = "about";

$db = mysqli_connect("localhost", "root", "", "joishop");

if (isset($_POST['addmore'])) {
  $product_id = $_POST['product_id'];
  //echo $order_id;

  $query = "SELECT * FROM product WHERE status=1 AND product_id='$product_id';";
  $addresult = mysqli_query($db, $query);
  $add = mysqli_fetch_array($addresult);

  $name = $add['name'];
  //echo $name;
  $sname = $add['sellername'];
  //echo $sname;
  $imgfile = $add['imgfile'];
  //echo $imgfile;
  $price = $add['price'];
  //echo $price;

  $paystatus = "C.O.D";
  //query here

  $query = "INSERT INTO order66 (name,sellername,imgfile,price,paymentStatus,status) VALUES ('$name','$sname','$imgfile','$price','$paystatus',1);";
  $check = mysqli_multi_query($db, $query);
  if ($check) {
    echo "<script> alert('Added to cart successfully...') ;</script>";
  };
};

include("header.php");

?>

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="w-100 pt-1 mb-5 text-right">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="" method="POST" class="modal-content modal-body border-0 p-0">
      <div class="input-group mb-2">
        <input type="text" class="form-control" id="mdsearch" name="mdsearch" placeholder="Search Product Name..." />
        <button name="searchbtn" type="submit" class="input-group-text bg-success text-light">
          <i class="fa fa-fw fa-search text-white"></i>
        </button>
      </div>
    </form>
  </div>
</div>

<?php

if (isset($_POST['searchbtn'])) {
  $searchName = $_POST['mdsearch'];
  $searchQuery = "SELECT * FROM product WHERE name LIKE '%$searchName%' AND status='1'";
  $resultSearch = mysqli_query($db, $searchQuery);



?>

  <div class="container py-5">









    <div class="row">

      <?php



      while ($card = mysqli_fetch_array($resultSearch)) {



      ?>



        <div class="col-md-4">
          <div class="card mb-4 product-wap rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0" style="width: 100%;height: 330px; " src="admin/newimgs/<?php echo $card['imgfile'];  ?>" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">

                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php?move=<?php echo $card['product_id'];  ?>"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <form action="" method="POST">
                      <input type="hidden" name="product_id" value="<?php echo $card['product_id'];  ?>">
                      <button type="submit" class="btn btn-success text-white mt-2" name="addmore"><i class="fas fa-cart-plus"></i></button>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php?move=<?php echo $card['product_id'];  ?>" class="h3 text-decoration-none"><?php echo $card['name'];  ?></a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>
                  <span style="font-size: small; color: #5B7C99;">
                    <?php echo $card['category'];  ?>>><?php echo $card['subcategory'];  ?>
                  </span>
                </li>
                <li class="pt-2">
                  <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                  <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                  <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                  <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                  <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                </li>
              </ul>
              <ul class="list-unstyled d-flex justify-content-center mb-1">
                <li>
                  <i class="text-warning fa fa-star"></i>
                  <i class="text-warning fa fa-star"></i>
                  <i class="text-warning fa fa-star"></i>
                  <i class="text-muted fa fa-star"></i>
                  <i class="text-muted fa fa-star"></i>
                </li>
              </ul>
              <p class="text-center mb-0">$<?php echo $card['price'];  ?></p>
            </div>
          </div>
        </div>

      <?php

      };


      ?>





    </div>






  </div>


<?php

} else {

?>

  <section class="bg-success abtColor py-5">
    <div class="container">
      <div class="row align-items-center py-5">
        <!-- text-white -->
        <div class="col-md-8">
          <h1 style="color: #7c0a02;">About Us</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
            enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat.
          </p>
        </div>
        <div class="col-md-4">
          <!-- img/about-hero.svg -->
          <img style="width: 100%;" src="assets/img/newAbout.jpg" alt="About Hero" />
        </div>
      </div>
    </div>
  </section>
  <!-- Close Banner -->

  <!-- Start Section -->
  <section class="container py-5">
    <div class="row text-center pt-5 pb-3">
      <div class="col-lg-6 m-auto">
        <h1 style="color: #7c0a02; ">Our Services</h1>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
          eiusmod Lorem ipsum dolor sit amet.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-3 pb-5">
        <div class="h-100 py-5 services-icon-wap shadow">
          <div class="h1 text-success text-center">
            <i class="fa fa-truck fa-lg"></i>
          </div>
          <h2 class="h5 mt-4 text-center">Delivery Services</h2>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 pb-5">
        <div class="h-100 py-5 services-icon-wap shadow">
          <div class="h1 text-success text-center">
            <i class="fas fa-exchange-alt"></i>
          </div>
          <h2 class="h5 mt-4 text-center">Shipping & Return</h2>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 pb-5">
        <div class="h-100 py-5 services-icon-wap shadow">
          <div class="h1 text-success text-center">
            <i class="fa fa-percent"></i>
          </div>
          <h2 class="h5 mt-4 text-center">Promotion</h2>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 pb-5">
        <div class="h-100 py-5 services-icon-wap shadow">
          <div class="h1 text-success text-center">
            <i class="fa fa-user"></i>
          </div>
          <h2 class="h5 mt-4 text-center">24 Hours Service</h2>
        </div>
      </div>
    </div>
  </section>
  <!-- End Section -->

<?php

};

?>

<!-- Start Brands -->
<!-- <section class="bg-light py-5">
      <div class="container my-4">
        <div class="row text-center py-3">
          <div class="col-lg-6 m-auto">
            <h1 class="h1">Our Brands</h1>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
              eiusmod Lorem ipsum dolor sit amet.
            </p>
          </div>
          <div class="col-lg-9 m-auto tempaltemo-carousel">
            <div class="row d-flex flex-row"> -->
<!--Controls-->
<!-- <div class="col-1 align-self-center">
                <a
                  class="h1"
                  href="#templatemo-slide-brand"
                  role="button"
                  data-bs-slide="prev"
                >
                  <i class="text-light fas fa-chevron-left"></i>
                </a>
              </div> -->
<!--End Controls-->

<!--Carousel Wrapper-->
<!-- <div class="col">
                <div
                  class="carousel slide carousel-multi-item pt-2 pt-md-0"
                  id="templatemo-slide-brand"
                  data-bs-ride="carousel"
                > -->
<!--Slides-->
<!-- <div class="carousel-inner product-links-wap" role="listbox"> -->
<!--First slide-->
<!-- <div class="carousel-item active">
                      <div class="row">
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_01.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_02.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_03.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_04.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                      </div>
                    </div> -->
<!--End First slide-->

<!--Second slide-->
<!-- <div class="carousel-item">
                      <div class="row">
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_01.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_02.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_03.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_04.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                      </div>
                    </div> -->
<!--End Second slide-->

<!--Third slide-->
<!-- <div class="carousel-item">
                      <div class="row">
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_01.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_02.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_03.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                        <div class="col-3 p-md-5">
                          <a href="#"
                            ><img
                              class="img-fluid brand-img"
                              src="assets/img/brand_04.png"
                              alt="Brand Logo"
                          /></a>
                        </div>
                      </div>
                    </div> -->
<!--End Third slide-->
<!-- </div> -->
<!--End Slides-->
<!-- </div>
              </div> -->
<!--End Carousel Wrapper-->

<!--Controls-->
<!-- <div class="col-1 align-self-center">
                <a
                  class="h1"
                  href="#templatemo-slide-brand"
                  role="button"
                  data-bs-slide="next"
                >
                  <i class="text-light fas fa-chevron-right"></i>
                </a>
              </div> -->
<!--End Controls-->
<!-- </div>
          </div>
        </div>
      </div>
    </section> -->
<!--End Brands-->

<!-- Start Footer -->
<?php
include("footer.php");

?>