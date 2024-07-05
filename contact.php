<?php

$id = "contact";

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
              <img class="card-img rounded-0 " style="width: 100%;height: 330px; " src="admin/newimgs/<?php echo $card['imgfile'];  ?>" />
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

  <!-- Start Content Page -->
  <div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
      <h1 class="h1" style="color: #7c0a02; font-weight: bolder !important">
        Contact Us
      </h1>
      <p>
        Proident, sunt in culpa qui officia deserunt mollit anim id est
        laborum. Lorem ipsum dolor sit amet.
      </p>
    </div>
  </div>

  <!-- Start Map -->
  <!-- <div id="mapid" style="width: 100%; height: 300px"></div>
    <script
      src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
      integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
      crossorigin=""
    ></script>
    <script>
      var mymap = L.map("mapid").setView([-23.013104, -43.394365, 13], 13);

      L.tileLayer(
        "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw",
        {
          maxZoom: 18,
          attribution:
            'Zay Telmplte | Template Design by <a href="https://templatemo.com/">Templatemo</a> | Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          id: "mapbox/streets-v11",
          tileSize: 512,
          zoomOffset: -1,
        }
      ).addTo(mymap);

      L.marker([-23.013104, -43.394365, 13])
        .addTo(mymap)
        .bindPopup("<b>Zay</b> eCommerce Template<br />Location.")
        .openPopup();

      mymap.scrollWheelZoom.disable();
      mymap.touchZoom.disable();
    </script> -->
  <!-- Ena Map -->

  <!-- Start of new map -->
  <div class="container-fluid">
    <div class="col-12">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.651064182146!2d96.17368741429561!3d16.794027124067732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eceaf0f51cc7%3A0xef88d27c500708fa!2sYuzana%20Plaza!5e0!3m2!1sen!2smm!4v1679575820408!5m2!1sen!2smm" width="100%" height="350px" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="row" style="text-align: center; margin-bottom: 50px; background-color: #08415C;color: white;padding: 15px 0">
      <div class="col">
        <i class="fas fa-map-marker-alt fa-fw"></i>
        123 Consectetur at ligula 10660
      </div>
      <div class="col">
        <i class="fa fa-phone fa-fw"></i>
        <span>010-020-0340</span>
      </div>
      <div class="col">
        <i class="fa fa-envelope fa-fw"></i>
        <span>info@company.com</span>
      </div>

      <!-- <ul class="list-unstyled  footer-link-list">
        <li>
          <i class="fas fa-map-marker-alt fa-fw"></i>
          123 Consectetur at ligula 10660
        </li>
        <li>
          <i class="fa fa-phone fa-fw"></i>
          <span>010-020-0340</span>
        </li>
        <li>
          <i class="fa fa-envelope fa-fw"></i>
          <span>info@company.com</span>
        </li>
      </ul> -->
    </div>
  </div>

  <!-- End of new map -->

  <!-- Start Contact -->

  <!-- End Contact -->

<?php

};

?>

<!-- Start Footer -->
<?php
include("footer.php");

?>