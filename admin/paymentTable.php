<?php
include("header.php");
//config w database
include("include/config.php");



?>


<!-- Blank Start -->
<!-- <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0"> -->
<div class="container-fluid pt-4 px-4">
    <h1 style="text-align: center;color:  #5b7c99;">Payment Control Table</h1>


    <table class="table tableone">
        <thead class="thead-dark" style="background-color: black; color: white; text-align: center;">
            <tr>
                <!-- <th scope="col">user_id</th> -->

                <th scope="col">Full name</th>
                <th scope="col">Type of User</th>
                <th scope="col">Phone no</th>
                <th scope="col">Email</th>
                <th scope="col">Bank name</th>
                <th scope="col">Bank no</th>
                <th scope="col">Gender</th>
                <th scope="col">Image</th>
                <th scope="col">Register Date</th>
                <th scope="col">Update</th>

            </tr>

        </thead>

        <!-- Looping to draw data and show -->




        <tbody>

            <?php

            $query = "SELECT * FROM customer WHERE status='1'";
            $n = mysqli_query($db, $query);

            while ($normal = mysqli_fetch_array($n)) {

            ?>
                <tr>
                    <!-- <th scope="row"></th> -->

                    <td><?php echo $normal["name"]   ?></td>
                    <td>Customer</td>
                    <td><?php echo $normal["phone"]   ?></td>
                    <td><?php echo $normal["gmail"]   ?></td>
                    <td><?php echo $normal["bankname"]   ?></td>
                    <td><?php echo $normal["bankno"]   ?></td>

                    <td><?php echo $normal["gender"]   ?></td>
                    <td>
                        <div>
                            <img width="100%" src="newimgs/<?php echo $normal['imgfile']; ?>" alt="user img">
                        </div>
                    </td>
                    <td><?php echo $normal["createdate"]   ?></td>
                    <!-- <td>14.3.2023</td> -->
                    <td>
                        <a href="payEdit.php?transfer=<?php echo $normal['user_id']; ?>&type=1">Edit</a>
                    </td>

                </tr>

            <?php

            };


            ?>
            <?php

            $squery = "SELECT * FROM seller WHERE status='1'";
            $sel = mysqli_query($db, $squery);

            while ($seller = mysqli_fetch_array($sel)) {

            ?>




                <tr>
                    <!-- <th scope="row"></th> -->

                    <td><?php echo $seller["name"]   ?></td>
                    <td>Seller</td>

                    <td><?php echo $seller["phone"]   ?></td>
                    <td><?php echo $seller["gmail"]   ?></td>
                    <td><?php echo $seller["bankname"]   ?></td>
                    <td><?php echo $seller["bankno"]   ?></td>


                    <td><?php echo $seller["gender"]   ?></td>
                    <td>
                        <div>
                            <img width="100%" src="newimgs/<?php echo $seller['imgfile']; ?>" alt="user img">
                        </div>
                    </td>
                    <td><?php echo $seller["createdate"]   ?></td>
                    <!-- <td>14.3.2023</td> -->
                    <td>
                        <a href="payEdit.php?transfer=<?php echo $seller['seller_id']; ?>&type=2">Edit</a>
                    </td>

                </tr>



            <?php

            };


            ?>

        </tbody>


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
                    User name:
                </div>
                <div class="col">
                    <?php echo $normal["name"]   ?>
                </div>
            </div>
            <div class="row">
                <div style="font-weight:bold;" class="col">
                    Type of user:
                </div>
                <div class="col">
                    <span style="color: #5b7c99; font-weight: bold;">Customer</span>
                </div>
            </div>
            <div class="row">
                <div style="font-weight:bold;" class="col">
                    Bank Name:
                </div>
                <div class="col">
                    <?php echo $normal["bankname"]   ?>
                </div>
            </div>
            <div class="row">
                <div style="font-weight:bold;" class="col">
                    Bank No:
                </div>
                <div class="col">
                    <?php echo $normal["bankno"]   ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="payEdit.php?transfer=<?php echo $normal['user_id']; ?>&type=1">Edit</a>
                </div>

            </div>

            <hr style="opacity: 0.7;">

        <?php

        };

        ?>

        <?php

        $squery = "SELECT * FROM seller WHERE status='1'";
        $sel = mysqli_query($db, $squery);

        while ($seller = mysqli_fetch_array($sel)) {

        ?>

            <div class="col-8" style="margin: 0 auto !important;">
                <img class="img-fluid" src="newimgs/<?php echo $seller['imgfile']; ?>" alt="Customer img">
            </div>
            <div class="row">
                <div style="font-weight:bold;" class="col">
                    User name:
                </div>
                <div class="col">
                    <?php echo $seller["name"]   ?>
                </div>
            </div>
            <div class="row">
                <div style="font-weight:bold;" class="col">
                    Type of user:
                </div>
                <div class="col">
                    <span style="color: #7c0a02; font-weight: bold;">Seller</span>
                </div>
            </div>
            <div class="row">
                <div style="font-weight:bold;" class="col">
                    Bank Name:
                </div>
                <div class="col">
                    <?php echo $seller["bankname"]   ?>
                </div>
            </div>
            <div class="row">
                <div style="font-weight:bold;" class="col">
                    Bank No:
                </div>
                <div class="col">
                    <?php echo $seller["bankno"]   ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="payEdit.php?transfer=<?php echo $seller['seller_id']; ?>&type=2">Edit</a>
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