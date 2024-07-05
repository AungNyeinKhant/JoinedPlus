<?php


$db = mysqli_connect("localhost", "root", "", "joishop");






if (isset($_POST['addmore1'])) {
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
                      <button type="submit" class="btn btn-success text-white mt-2" name="addmore1"><i class="fas fa-cart-plus"></i></button>
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




  <!--------------------------------------- Main of this page start here ----------------------->
  <div class="container-fluid">
    <h1 style="text-align: center;color: #7c0a02; ">Shopping Cart List</h1>
    <div class="row" style="padding: 13px;">

      <?php

      if (isset($_POST['addmore'])) {
        $order_id = $_POST['order_id'];
        // echo $order_id;

        $query = "SELECT * FROM order66 WHERE status=1 AND order_id=$order_id";
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
      };

      $totalprice = 0;
      $products = "";

      $sql = "SELECT * FROM order66 WHERE status=1";
      $oresult = mysqli_query($db, $sql);

      while ($oanswer = mysqli_fetch_array($oresult)) {


      ?>


        <form action="" method="post" class="cart-items col-md-6">
          <div class="pt-3 pb-3 mt-1 mb-1 border rounded">
            <div class="row bg-white">
              <div class="col-md-5 pl-0">
                <img src="admin/newimgs/<?php echo $oanswer["imgfile"]   ?>" alt="Image1" style="width: 100%;height: 330px; ">
              </div>
              <div class="col-md-5">
                <h5 class="pt-2">
                  <?php echo $oanswer["name"];  ?>
                </h5>

                <small class="text-secondary">Payment Status: <?php echo $oanswer["paymentStatus"]; ?></small>
                <br /><br />
                <h5 class="pt-2">$<?php echo $oanswer["price"];  ?></h5>

                <input type="hidden" value="<?php echo $oanswer['order_id']; ?>" name="order_id">
                <button type="submit" class="btn btn-warning" name="addmore">Add more</button>
                <a href="cartDel.php?pass=<?php echo $oanswer['order_id']; ?>" class="btn btn-danger mx-2" name="remove">Remove</a>
              </div>
              <div class="col-md-2 gone">
                <small class="text-secondary"><?php echo $oanswer["createdate"];  ?></small>
                <br /><br /><br /><br />
                <small class="text-secondary">Seller :<br /><?php echo $oanswer["sellername"];  ?></small>
              </div>

              <?php
              $totalprice += $oanswer["price"];
              $products = $products . $oanswer["name"] . ",";

              ?>

            </div>
          </div>
        </form>

      <?php

      };
      //echo $totalprice;
      //echo $products;

      ?>




    </div>


    <div class="row" style="margin-bottom: 50px;">
      <div class="col">
        <h1 style="text-align: center;">Total Price : $<?php echo $totalprice;  ?> </h1>
      </div>
      <div class="col">

        <a style="height: 70%;width: 100%; " href="#" class="btn btn-warning" data-bs-target="#buyall_box" data-bs-toggle="modal">Buy All</a>
        <!-- <button type="submit" name="buyall" >Buy All</button> -->


      </div>
    </div>


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
      //echo "Hellloooo";


      // $order_id = $_POST['order_id'];
      // echo $order_id;

      // $query = "SELECT * FROM order66 WHERE status=1 AND order_id=$order_id";
      // $addresult = mysqli_query($db, $query);
      // $add = mysqli_fetch_array($addresult);

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
        echo "<script>
      alert('Ordered Successfully');
      </script>";
      };

      $removequery = "UPDATE order66 SET status='0' ";
      mysqli_multi_query($db, $removequery);
    };

    ?>

  </div>

<?php

};

?>



<?php
include("footer.php");

?>