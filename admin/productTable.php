<?php
include("header.php");

include("include/config.php");


?>


<!-- Blank Start -->
<!-- <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0"> -->
<div class="container-fluid pt-4 px-4">
  <h1 style="text-align: center;color:  #5b7c99;">Product Table</h1>


  <table class="table tableone">
    <thead class="thead-dark" style="background-color: black; color: white; text-align: center;">
      <tr>
        <!-- <th scope="col">user_id</th> -->
        <th scope="col">Product Name</th>

        <th scope="col">Seller name</th>
        <!-- <th scope="col">Seller Phone no</th> -->
        <th scope="col">Categories</th>
        <th scope="col">Sub-Categories</th>
        <th scope="col">Product image</th>
        <th scope="col">Price</th>
        <th scope="col">Register Date</th>
        <!-- <th scope="col">Edit date</th> -->
        <th scope="col">Update</th>
        <th scope="col">Action</th>
      </tr>
    </thead>


    <?php

    $sql = "SELECT * FROM product WHERE status='1'";
    $s = mysqli_query($db, $sql);

    while ($show = mysqli_fetch_array($s)) {

    ?>


      <tbody>
        <tr>
          <!-- <th scope="row">1</th> -->
          <td><?php echo $show["name"]   ?></td>
          <td><?php echo $show["sellername"]   ?></td>

          <td><?php echo $show["category"]   ?></td>
          <td><?php echo $show["subcategory"]   ?></td>
          <td>
            <div>
              <img width="100%" src="newimgs/<?php echo $show['imgfile']; ?>" alt="Product img">
            </div>
          </td>
          <td>$<?php echo $show["price"]   ?></td>

          <td><?php echo $show["createdate"]   ?></td>
          <!-- <td>14.3.2023</td> -->
          <td>
            <a href="prodEdit.php?transfer=<?php echo $show['product_id']; ?>">Edit</a>
          </td>
          <td>
            <a href="prodele.php?pass=<?php echo $show['product_id']; ?>">Delete</a>
          </td>
        </tr>


      </tbody>

    <?php

    };


    ?>
  </table>



  <div style="text-align: center;" class="container tabletwo">

    <?php

    $sql = "SELECT * FROM product WHERE status='1'";
    $s = mysqli_query($db, $sql);

    while ($show = mysqli_fetch_array($s)) {

    ?>

      <div class="col-8" style="margin: 0 auto !important;">
        <img class="img-fluid" src="newimgs/<?php echo $show['imgfile']; ?>" alt="Customer img">
      </div>
      <div class="row">
        <div style="font-weight:bold;" class="col">
          Product name:
        </div>
        <div class="col">
          <?php echo $show['name']; ?>
        </div>
      </div>
      <div class="row">
        <div style="font-weight:bold;" class="col">
          Seller name:
        </div>
        <div class="col">
          <?php echo $show['sellername']; ?>
        </div>
      </div>
      <div class="row">
        <div style="font-weight:bold;" class="col">
          Category:
        </div>
        <div class="col">
          <?php echo $show['category']; ?> >> <?php echo $show['subcategory']; ?>
        </div>
      </div>
      <div class="row">
        <div style="font-weight:bold;" class="col">
          Price:
        </div>
        <div class="col">
          $<?php echo $show["price"]   ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <a href="prodEdit.php?transfer=<?php echo $show['product_id']; ?>">Edit</a>
        </div>
        <div class="col">
          <a href="prodele.php?pass=<?php echo $show['product_id']; ?>">Delete</a>
        </div>
      </div>

      <hr style="opacity: 0.7;">

    <?php

    };

    ?>


  </div>





</div>
<!-- Blank End -->


<?php
include("footer.php");

?>