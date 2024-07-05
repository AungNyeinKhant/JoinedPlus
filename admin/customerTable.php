<?php
include("header.php");
//config w database
include("include/config.php");



?>


<!-- Blank Start -->
<!-- <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0"> -->
<div class="container-fluid pt-4 px-4">


  <h1 style="text-align: center;color:  #5b7c99;">Customer Table</h1>
  <table class="table tableone">

    <thead class="thead-dark" style="background-color: black; color: white; text-align: center;">
      <tr>
        <!-- <th scope="col">user_id</th> -->

        <th scope="col">Full name</th>
        <th scope="col">Phone no</th>
        <th scope="col">Email</th>
        <th scope="col">Bank name</th>
        <th scope="col">Bank no</th>
        <th scope="col">Address</th>
        <th scope="col">Password</th>
        <th scope="col">Gender</th>
        <th scope="col">Img</th>
        <th scope="col">Register Date</th>
        <!-- <th scope="col">Edit date</th> -->
        <th scope="col">Update</th>
        <th scope="col">Action</th>
      </tr>

    </thead>

    <!-- Looping to draw data and show -->
    <?php

    $query = "SELECT * FROM customer WHERE status='1'";
    $n = mysqli_query($db, $query);

    while ($normal = mysqli_fetch_array($n)) {

    ?>



      <tbody>
        <tr>
          <!-- <th scope="row"></th> -->

          <td><?php echo $normal["name"]   ?></td>

          <td><?php echo $normal["phone"]   ?></td>
          <td><?php echo $normal["gmail"]   ?></td>
          <td><?php echo $normal["bankname"]   ?></td>
          <td><?php echo $normal["bankno"]   ?></td>
          <td><?php echo $normal["address"]   ?></td>
          <td><?php echo $normal["password"]   ?></td>
          <td><?php echo $normal["gender"]   ?></td>
          <td>
            <div>
              <img width="100%" src="newimgs/<?php echo $normal['imgfile']; ?>" alt="user img">
            </div>
          </td>
          <td><?php echo $normal["createdate"]   ?></td>
          <!-- <td>14.3.2023</td> -->
          <td>
            <a href="customerEdit.php?transfer=<?php echo $normal['user_id']; ?>">Edit</a>
          </td>
          <td>
            <a href="cdelete.php?pass=<?php echo $normal['user_id']; ?>">Delete</a>
          </td>
        </tr>

      </tbody>

    <?php

    };


    ?>
  </table>

  <div style="text-align: center;" class="container tabletwo">

    <?php

    $query = "SELECT * FROM customer WHERE status='1'";
    $n = mysqli_query($db, $query);

    while ($normal = mysqli_fetch_array($n)) {

    ?>

      <div class="col-8" style="margin: 0 auto !important;">
        <img class="img-fluid" src="newimgs/<?php echo $normal["imgfile"]   ?>" alt="Customer img">
      </div>
      <div class="row">
        <div style="font-weight:bold;" class="col">
          Customer name:
        </div>
        <div class="col">
          <?php echo $normal["name"]   ?>
        </div>
      </div>
      <div class="row">
        <div style="font-weight:bold;" class="col">
          Ph no:
        </div>
        <div class="col">
          <?php echo $normal["phone"]   ?>
        </div>
      </div>
      <div class="row">
        <div style="font-weight:bold;" class="col">
          Customer Gmail:
        </div>
        <div class="col">
          <?php echo $normal["gmail"]   ?>
        </div>
      </div>
      <div class="row">
        <div style="font-weight:bold;" class="col">
          Gender:
        </div>
        <div class="col">
          <?php echo $normal["gender"]   ?>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <a href="customerEdit.php?transfer=<?php echo $normal['user_id']; ?>">Edit</a>
        </div>
        <div class="col">
          <a href="cdelete.php?pass=<?php echo $normal['user_id']; ?>">Delete</a>
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