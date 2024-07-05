<?php

$id = "shop";

include("admin/include/config.php");




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





  <!-- Start Content -->
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-3">
        <h1 class="h2 pb-4">Categories</h1>
        <form action="" method="POST">
          <ul class="list-unstyled templatemo-accordion">
            <li class="pb-3">

              <!-- Gender -->


              <?php
              $caSql = "SELECT * FROM maincate WHERE status =1";
              $c = mysqli_query($db, $caSql);


              while ($cate = mysqli_fetch_array($c)) {

                $catego = $cate['maincate'];

              ?>






                <button type="submit" class="collapsed d-flex justify-content-between h3" style="border: none; " value="<?php echo $cate['maincate'] ?>" name="mvalue"><?php echo $cate['maincate'] ?></button>


                <a class="collapsed d-flex justify-content-between h3 text-decoration-none" data-bs-target="#subc" type="button">


                  <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>


                </a>






                <ul id="subc" class="collapse list-unstyled pl-3">

                  <?php
                  $caSql2 = "SELECT * FROM category2 WHERE status =1 AND maincate = '$catego' ";
                  $c2 = mysqli_query($db, $caSql2);


                  while ($cate2 = mysqli_fetch_array($c2)) {

                  ?>

                    <li> <button type="submit" style="border: none;" name="subvalue" value="<?php echo $cate2['cate_id'] ?>"> <?php echo $cate2['subcate'] ?> </button></li>
                  <?php

                  };

                  ?>


                  <!-- <li><a class="text-decoration-none" href="#">Sport</a></li>
                <li><a class="text-decoration-none" href="#">Luxury</a></li> -->
                </ul>
              <?php

              };




              ?>



              <!-- <ul class="collapse show list-unstyled pl-3">
                
              </ul> -->
            </li>

            <!-- <li class="pb-3">
              <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                Product
                <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
              </a>
              <ul id="collapseThree" class="collapse list-unstyled pl-3">
                <li><a class="text-decoration-none" href="#">Bag</a></li>
                <li><a class="text-decoration-none" href="#">Sweather</a></li>
                <li><a class="text-decoration-none" href="#">Sunglass</a></li>
              </ul>
            </li> -->
          </ul>
        </form>
      </div>

      <?php
      /* =========================== code for main cate search start here =========================== */
      if (isset($_POST["mvalue"])) {
        //echo "Hello...";

        $mainCate = $_POST['mvalue'];
        $search = "SELECT * FROM product WHERE category='$mainCate' AND status=1 ;";
        $resultSearch = mysqli_query($db, $search);



      ?>

        <div class="col-lg-9">

          <div class="row">

            <?php



            while ($mcard = mysqli_fetch_array($resultSearch)) {



            ?>



              <div class="col-md-4">
                <div class="card mb-4 product-wap rounded-0">
                  <div class="card rounded-0">
                    <img class="card-img rounded-0 " style="width: 100%;height: 330px; " src="admin/newimgs/<?php echo $mcard['imgfile'];  ?>" />
                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                      <ul class="list-unstyled">

                        <li>
                          <a class="btn btn-success text-white mt-2" href="shop-single.php?move=<?php echo $mcard['product_id'];  ?>"><i class="far fa-eye"></i></a>
                        </li>
                        <li>
                          <form action="" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $mcard['product_id'];  ?>">
                            <button type="submit" class="btn btn-success text-white mt-2" name="addmore"><i class="fas fa-cart-plus"></i></button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <a href="shop-single.php?move=<?php echo $mcard['product_id'];  ?>" class="h3 text-decoration-none"><?php echo $mcard['name'];  ?></a>
                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                      <li>
                        <span style="font-size: small; color: #5B7C99;">
                          <?php echo $mcard['category'];  ?>>><?php echo $mcard['subcategory'];  ?>
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

                    <p class="text-center mb-0">$<?php echo $mcard['price'];  ?></p>
                  </div>
                </div>
              </div>

            <?php

            };



            ?>





          </div>
        </div>

      <?php


      } else  if (isset($_POST["subvalue"])) {
        $cate_id = $_POST['subvalue'];
        $take = "SELECT * FROM category2 WHERE cate_id='$cate_id' AND status=1 ;";
        $Extract = mysqli_query($db, $take);
        $cateExtract = mysqli_fetch_array($Extract);

        $mainc = $cateExtract['maincate'];
        $subc = $cateExtract['subcate'];



        $search = "SELECT * FROM product WHERE category='$mainc' AND subcategory='$subc'  AND status=1 ;";
        $resultSearch = mysqli_query($db, $search);



      ?>

        <div class="col-lg-9">

          <div class="row">

            <?php



            while ($scard = mysqli_fetch_array($resultSearch)) {



            ?>



              <div class="col-md-4">
                <div class="card mb-4 product-wap rounded-0">
                  <div class="card rounded-0">
                    <img class="card-img rounded-0 " style="width: 100%;height: 330px; " src="admin/newimgs/<?php echo $scard['imgfile'];  ?>" />
                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                      <ul class="list-unstyled">

                        <li>
                          <a class="btn btn-success text-white mt-2" href="shop-single.php?move=<?php echo $scard['product_id'];  ?>"><i class="far fa-eye"></i></a>
                        </li>



                        <li>

                          <form action="" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $scard['product_id'];  ?>">
                            <button type="submit" class="btn btn-success text-white mt-2" name="addmore"><i class="fas fa-cart-plus"></i></button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <a href="shop-single.php?move=<?php echo $scard['product_id'];  ?>" class="h3 text-decoration-none"><?php echo $scard['name'];  ?></a>
                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                      <li>
                        <span style="font-size: small; color: #5B7C99;">
                          <?php echo $scard['category'];  ?>>><?php echo $scard['subcategory'];  ?>
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
                    <p class="text-center mb-0">$<?php echo $scard['price'];  ?></p>
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



        <div class="col-lg-9">
          <!-- <div class="row">
          <div class="col-md-6">
            <ul class="list-inline shop-top-menu pb-3 pt-1">
              <li class="list-inline-item">
                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
              </li>
              <li class="list-inline-item">
                <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
              </li>
              <li class="list-inline-item">
                <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
              </li>
            </ul>
          </div> -->


          <!-- Start of cards -->
          <!-- <div class="col-md-6 pb-4">
            <div class="d-flex">
              <select class="form-control">
                <option>Featured</option>
                <option>A to Z</option>
                <option>Item</option>
              </select>
            </div>
          </div>
        </div> -->
          <div class="row">

            <?php

            $per_page_item = 9;  // Number of entries to show in a page.   
            // Look for a GET variable page if not found default is 1.        
            if (isset($_GET["page"])) {
              $page  = $_GET["page"];
            } else {
              $page = 1;
            }

            $start_from = ($page - 1) * $per_page_item;

            $pgquery = "SELECT * FROM product WHERE status = 1 LIMIT $start_from, $per_page_item  "; //  LIMIT offset, rowcount
            $rs_find = mysqli_query($db, $pgquery);




            $sql = "SELECT * FROM product WHERE status=1 ";
            $rs_original = mysqli_query($db, $sql);


            while ($card = mysqli_fetch_array($rs_find)) {



            ?>



              <div class="col-md-4">
                <div class="card mb-4 product-wap rounded-0">
                  <div class="card rounded-0">
                    <img class="card-img rounded-0 " style="width: 100%;height: 330px; " src="admin/newimgs/<?php echo $card['imgfile'];  ?>" />
                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                      <ul class="list-unstyled">
                        <!-- <li>
                      <a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a>
                    </li> -->
                        <li>
                          <a class="btn btn-success text-white mt-2" href="shop-single.php?move=<?php echo $card['product_id'];  ?>"><i class="far fa-eye"></i></a>
                        </li>

                        <li>
                          <form action="" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $card['product_id'];  ?>">
                            <button type="submit" class="btn btn-success text-white mt-2" name="addmore"><i class="fas fa-cart-plus"></i></button>
                          </form>
                          <!-- <a class="btn btn-success text-white mt-2" href="shop-single.php?move=
                          <?php /* echo $card['product_id'];  */ ?>
                          "><i class="fas fa-cart-plus"></i></a> -->
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




            <!--         
          <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
              <div class="card rounded-0">
                <img class="card-img rounded-0 img-fluid" src="assets/img/shop_02.jpg" />
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
          <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
              <div class="card rounded-0">
                <img class="card-img rounded-0 img-fluid" src="assets/img/shop_03.jpg" />
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
          <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
              <div class="card rounded-0">
                <img class="card-img rounded-0 img-fluid" src="assets/img/shop_04.jpg" />
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
          <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
              <div class="card rounded-0">
                <img class="card-img rounded-0 img-fluid" src="assets/img/shop_05.jpg" />
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
          <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
              <div class="card rounded-0">
                <img class="card-img rounded-0 img-fluid" src="assets/img/shop_06.jpg" />
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
          <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
              <div class="card rounded-0">
                <img class="card-img rounded-0 img-fluid" src="assets/img/shop_07.jpg" />
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
          <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
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
                <p class="text-center mb-0">$250.00</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 product-wap rounded-0">
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
                <p class="text-center mb-0">$250.00</p>
              </div>
            </div>
          </div> -->
          </div>



          <!-- Pagenation -->
          <!-- <div div="row">
            <ul class="pagination pagination-lg justify-content-end">
              <li class="page-item disabled">
                <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
              </li>
              <li class="page-item">
                <a style="color: black;" class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 " href="#">2</a>
              </li>
              <li class="page-item">
                <a style="color: black;" class="page-link rounded-0 shadow-sm border-top-0 border-left-0 " href="#">3</a>
              </li>
            </ul>
          </div> -->

          <div class="pagination">
            <?php
            $pgquery2 = "SELECT COUNT(*) FROM product WHERE status = 1";
            $rs_result = mysqli_query($db, $pgquery2);
            $row = mysqli_fetch_row($rs_result);
            $total_items = $row[0];



            echo "</br>";
            // Number of pages required.   
            $total_pages = ceil($total_items / $per_page_item);
            $pagLink = "";



            ?>
          </div>

          <div div="row">
            <ul class="pagination pagination-lg justify-content-end">
              <li class="page-item">
                <?php
                if ($page >= 2) {
                  echo "<a style='color: black;' class='page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 ' href='shop.php?page=" . ($page - 1) . "'> Prev </a>";
                };
                ?>
              </li>

              <?php
              for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                  $pagLink .= "<li class='page-item'><a style='color: black;' class = 'page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 active' href='shop.php?page="
                    . $i . "'>" . $i . " </a></li>";
                } else {
                  $pagLink .= "<li class='page-item'><a style='color: black;' class = 'page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 ' href='shop.php?page=" . $i . "'>   " . $i . " </a></li>";
                }
              };
              echo  $pagLink;
              ?>
              <!-- <a style="color: black;" class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 " href="#">2</a> -->

              <li class="page-item">
                <?php
                if ($page < $total_pages) {
                  echo "<a style='color: black;' class = 'page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 ' href='shop.php?page=" . ($page + 1) . "'>  Next </a>";
                };
                ?>
              </li>
            </ul>
          </div>



        </div>

      <?php

      };


      ?>
    </div>
  </div>
  <!-- End Content -->

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
                  href="#multi-item-example"
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
                  id="multi-item-example"
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
                      </div> -->
<!-- </div> -->
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
                  href="#multi-item-example"
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