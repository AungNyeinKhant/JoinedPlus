<?php
include("admin/include/config.php");

$product_id = $_GET['move'];
//echo $product_id;

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

// if (isset($_POST['buybtn'])) {
//   //$prodid = $_POST['product_id'];
//   //echo $product_id . "hi";

//   $prodsql = "SELECT * FROM product WHERE product_id='$product_id' AND status=1; ";
//   $prodresult = mysqli_query($db, $prodsql);
//   $answerp = mysqli_fetch_array($prodresult);

//   //take data from product
//   $name = $answerp['name'];
//   //echo $name;
//   $sname = $answerp['sellername'];
//   //echo $sname;
//   $imgfile = $answerp['imgfile'];
//   // echo $imgfile;
//   $price = $answerp['price'];
//   //echo $price;

//   $paystatus = "Paid";
//   //query here
//   $query = "INSERT INTO order66 (name,sellername,imgfile,price,paymentStatus,status) VALUES ('$name','$sname','$imgfile','$price','$paystatus',1);";
//   $check = mysqli_multi_query($db, $query);
//   if ($check) {
//     echo "<script> alert('Ordered successful...'); </script>";
//   } else {
//     echo "<script> alert('Ordered Fail!'); </script>";
//   };
// };




if (isset($_POST['addbtn'])) {
  //$prodid = $_POST['product_id'];
  //echo $product_id . "World";

  $prodsql = "SELECT * FROM product WHERE product_id='$product_id' AND status=1; ";
  $prodresult = mysqli_query($db, $prodsql);
  $answerp = mysqli_fetch_array($prodresult);

  //take data from product
  $name = $answerp['name'];
  $sname = $answerp['sellername'];
  $imgfile = $answerp['imgfile'];
  $price = $answerp['price'];

  $paystatus = "C.O.D";

  //query here
  $query = "INSERT INTO order66 (name,sellername,imgfile,price,paymentStatus,status) VALUES ('$name','$sname','$imgfile','$price','$paystatus',1);";
  $check = mysqli_multi_query($db, $query);
  if ($check) {
    echo "<script> alert('Added to cart successful...'); </script>";
  } else {
    echo "<script> alert('Added to cart Fail!'); </script>";
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
$db = mysqli_connect("localhost", "root", "", "joishop");
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


  <!-- Open Content -->

  <?php
  $sql = "SELECT * FROM product WHERE status=1 AND product_id='$product_id';";
  $result = mysqli_query($db, $sql);
  while ($showItem = mysqli_fetch_array($result)) {

  ?>

    <section class="bg-light">
      <div class="container pb-5">
        <div class="row">
          <div class="col-lg-5 mt-5">
            <div class="card mb-3">
              <img class="card-img img-fluid" src="admin/newimgs/<?php echo $showItem['imgfile'];  ?>" alt="Card image cap" id="product-detail" />
            </div>
            <!-- <div class="row"> -->
            <!--Start Controls-->
            <!-- <div class="col-1 align-self-center">
              <a href="#multi-item-example" role="button" data-bs-slide="prev">
                <i class="text-dark fas fa-chevron-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </div> -->
            <!--End Controls-->
            <!--Start Carousel Wrapper-->
            <!-- <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel"> -->
            <!--Start Slides-->
            <!-- <div class="carousel-inner product-links-wap" role="listbox"> -->
            <!--First slide-->
            <!-- <div class="carousel-item active">
                  <div class="row">
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_01.jpg" alt="Product Image 1" />
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_02.jpg" alt="Product Image 2" />
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_03.jpg" alt="Product Image 3" />
                      </a>
                    </div>
                  </div>
                </div> -->
            <!--/.First slide-->

            <!--Second slide-->
            <!-- <div class="carousel-item">
                  <div class="row">
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_04.jpg" alt="Product Image 4" />
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_05.jpg" alt="Product Image 5" />
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_06.jpg" alt="Product Image 6" />
                      </a>
                    </div>
                  </div>
                </div> -->
            <!--/.Second slide-->

            <!--Third slide-->
            <!-- <div class="carousel-item">
                  <div class="row">
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_07.jpg" alt="Product Image 7" />
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_08.jpg" alt="Product Image 8" />
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_09.jpg" alt="Product Image 9" />
                      </a>
                    </div>
                  </div>
                </div> -->
            <!--/.Third slide-->
            <!-- </div> -->
            <!--End Slides-->
            <!-- </div> -->
            <!--End Carousel Wrapper-->
            <!--Start Controls-->
            <!-- <div class="col-1 align-self-center">
          <a href="#multi-item-example" role="button" data-bs-slide="next">
            <i class="text-dark fas fa-chevron-right"></i>
            <span class="sr-only">Next</span>
          </a>
            </div> -->
            <!--End Controls-->
          </div>
          <!-- </div> -->
          <!-- col end -->



          <div class="col-lg-7 mt-5">
            <div class="card">
              <div class="card-body">
                <h1 class="h2"><?php echo $showItem['name'];  ?></h1>
                <?php
                $products = $showItem['name'];
                $totalprice = $showItem['price'];

                ?>
                <p class="h3 py-2">$<?php echo $showItem['price'];  ?></p>
                <p class="py-2">
                  <i class="fa fa-star text-warning"></i>
                  <i class="fa fa-star text-warning"></i>
                  <i class="fa fa-star text-warning"></i>
                  <i class="fa fa-star text-warning"></i>
                  <i class="fa fa-star text-secondary"></i>
                  <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                </p>
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <h6>Category:</h6>
                  </li>
                  <li class="list-inline-item">
                    <p class="text-muted"><strong><?php echo $showItem['category'];  ?> >> <?php echo $showItem['subcategory'];  ?></strong></p>
                  </li>
                </ul>

                <h6>Description:</h6>
                <p>
                  <?php echo $showItem['about'];  ?>
                </p>
                <!-- <ul class="list-inline">
                  <li class="list-inline-item">
                    <h6>Avaliable Color :</h6>
                  </li>
                  <li class="list-inline-item">
                    <p class="text-muted"><strong>White / Black</strong></p>
                  </li>
                </ul> -->

                <!-- <h6>Specification:</h6>
                <ul class="list-unstyled pb-3">
                  <li>Lorem ipsum dolor sit</li>
                  <li>Amet, consectetur</li>
                  <li>Adipiscing elit,set</li>
                  <li>Duis aute irure</li>
                  <li>Ut enim ad minim</li>
                  <li>Dolore magna aliqua</li>
                  <li>Excepteur sint</li>
                </ul> -->

                <form action="" method="POST">
                  <!-- <input type="hidden" name="product-title" value="Activewear" />
                  <div class="row">
                    <div class="col-auto">
                      <ul class="list-inline pb-3">
                        <li class="list-inline-item">
                          Size :
                          <input type="hidden" name="product-size" id="product-size" value="S" />
                        </li>
                        <li class="list-inline-item">
                          <span class="btn btn-success btn-size">S</span>
                        </li>
                        <li class="list-inline-item">
                          <span class="btn btn-success btn-size">M</span>
                        </li>
                        <li class="list-inline-item">
                          <span class="btn btn-success btn-size">L</span>
                        </li>
                        <li class="list-inline-item">
                          <span class="btn btn-success btn-size">XL</span>
                        </li>
                      </ul>
                    </div>
                    <div class="col-auto">
                      <ul class="list-inline pb-3">
                        <li class="list-inline-item text-right">
                          Quantity
                          <input type="hidden" name="product-quanity" id="product-quanity" value="1" />
                        </li>
                        <li class="list-inline-item">
                          <span class="btn btn-success" id="btn-minus">-</span>
                        </li>
                        <li class="list-inline-item">
                          <span class="badge bg-secondary" id="var-value">1</span>
                        </li>
                        <li class="list-inline-item">
                          <span class="btn btn-success" id="btn-plus">+</span>
                        </li>
                      </ul>
                    </div>
                  </div> -->
                  <input type="hidden" name="product_id" value="<?php echo $showItem['product_id'];  ?>">
                  <div class="row pb-3">
                    <div class="col d-grid">
                      <button data-bs-target="#buyall_box" data-bs-toggle="modal" type="button" class="btn btn-success btn-lg" name="buybtn">
                        Buy
                      </button>
                    </div>
                    <div class="col d-grid">
                      <button type="submit" class="btn btn-success btn-lg" name="addbtn">
                        Add To Cart
                      </button>
                    </div>
                  </div>
                </form>



              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Close Content -->

    <div class="modal" tabindex="-1" id="buyall_box" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header" style="background-color: #7c0a02; color: white;">
              <h5 class="modal-title">Please Fill The Following Form</h5>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
            </div>
            <div class="modal-body">
              <!-- <p>Modal body text goes here.</p> -->

              <input type="text" class="form-control" name="bname" placeholder="Name..." />
              <br />
              <input type="text" class="form-control" name="bphone" placeholder="Phone Number..." />
              <br />

              <textarea name="baddress" class="form-control" id="baddress" placeholder="Address..." cols="10" rows="10"></textarea>
              <br />
              <input id="Paid" class="form-check-input" type="radio" name="bpayment" value="Paid">
              <label for="Paid" class="form-check-label">Paid</label>
              <input id="C.O.D" class="form-check-input" type="radio" name="bpayment" value="C.O.D">
              <label for="C.O.D" class="form-check-label">C.O.D</label>
              <br />
              <p>Total Price : $<?php echo $totalprice;  ?> </p>
            </div>
            <div class="modal-footer">
              <a href="cart.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
              <button type="submit" class="btn btn-warning" name="orderConfirm">Confirm Orders</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php

    if (isset($_POST['orderConfirm'])) {


      $name = $_POST['bname'];
      //echo $name;
      $phone = $_POST['bphone'];

      //products = $ product from above

      $address = $_POST['baddress'];

      //echo $imgfile;
      $price = $totalprice;
      //echo $price;

      $paystatus = $_POST['bpayment'];
      //query here

      $query = "INSERT INTO realorder (customer,products,phone,address,total,payments,status) VALUES ('$name','$products','$phone','$address','$price','$paystatus',1);";
      $check = mysqli_multi_query($db, $query);
      if ($check) {
        echo "<script>  alert('Ordered Successfully'); </script>";
      };
    };

    ?>

<?php

  };
};

?>
<!-- Start Article -->
<!-- <section class="py-5">
    <div class="container">
      <div class="row text-left p-2 pb-3">
        <h4>Related Products</h4>
      </div> -->

<!--Start Carousel Wrapper-->
<!-- <div id="carousel-related-product">
        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_08.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">Red Clothing</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
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
                  <i class="text-warning fa fa-star"></i>
                  <i class="text-muted fa fa-star"></i>
                </li>
              </ul>
              <p class="text-center mb-0">$20.00</p>
            </div>
          </div>
        </div>

        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_09.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">White Shirt</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
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
              <p class="text-center mb-0">$25.00</p>
            </div>
          </div>
        </div>

        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_10.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">Oupidatat non</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
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
                  <i class="text-warning fa fa-star"></i>
                  <i class="text-warning fa fa-star"></i>
                </li>
              </ul>
              <p class="text-center mb-0">$45.00</p>
            </div>
          </div>
        </div>

        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_11.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">Black Fashion</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
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
              <p class="text-center mb-0">$60.00</p>
            </div>
          </div>
        </div>

        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_08.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">Oupidatat non</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li class="">M/L/X/XL</li>
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
              <p class="text-center mb-0">$80.00</p>
            </div>
          </div>
        </div>

        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_09.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">Oupidatat non</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
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
              <p class="text-center mb-0">$110.00</p>
            </div>
          </div>
        </div>

        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_10.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">Oupidatat non</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
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
              <p class="text-center mb-0">$125.00</p>
            </div>
          </div>
        </div>

        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_11.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">Oupidatat non</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
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
              <p class="text-center mb-0">$160.00</p>
            </div>
          </div>
        </div>

        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_08.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">Oupidatat non</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
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
              <p class="text-center mb-0">$180.00</p>
            </div>
          </div>
        </div>

        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_09.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">Oupidatat non</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
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
              <p class="text-center mb-0">$220.00</p>
            </div>
          </div>
        </div>

        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_10.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">Oupidatat non</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
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
              <p class="text-center mb-0">$250.00</p>
            </div>
          </div>
        </div>

        <div class="p-2 pb-3">
          <div class="product-wap card rounded-0">
            <div class="card rounded-0">
              <img class="card-img rounded-0 img-fluid" src="assets/img/shop_11.jpg" />
              <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                  <li>
                    <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a>
                  </li>
                  <li>
                    <a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body">
              <a href="shop-single.php" class="h3 text-decoration-none">Oupidatat non</a>
              <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
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
              <p class="text-center mb-0">$300.00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
<!-- End Article -->

<!-- Start Footer -->
<?php
include("footer.php");
?>


<!-- Start Slider Script -->
<!-- <script src="assets/js/slick.min.js"></script>
<script>
  $("#carousel-related-product").slick({
    infinite: true,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 3,
    dots: true,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 3,
        },
      },
    ],
  });
</script> -->