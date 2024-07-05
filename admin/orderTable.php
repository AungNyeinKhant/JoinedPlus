<?php

include("include/config.php");
include("header.php");

?>


<!-- Blank Start -->
<!-- <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0"> -->
<div class="container-fluid pt-4 px-4">
    <h1 style="text-align: center;color:  #5b7c99;">Order Table</h1>


    <table class="table tableone">
        <thead class="thead-dark" style="background-color: black; color: white; text-align: center;">
            <tr>

                <th scope="col">Customer name</th>
                <th scope="col">Product Names</th>


                <th scope="col">Customer Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">Total Price</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Order Date</th>
                <!-- <th scope="col">Edit date</th> -->
                <th scope="col">Change<br />Payment Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $sql = "SELECT * FROM realorder WHERE status='1'";
            $s = mysqli_query($db, $sql);

            while ($show = mysqli_fetch_array($s)) {

            ?>



                <tr>
                    <!-- <th scope="row">1</th> -->
                    <td><?php echo $show["customer"]   ?></td>
                    <td><?php echo $show["products"]   ?></td>



                    <td>$<?php echo $show["phone"]   ?></td>
                    <td><?php echo $show['address']; ?></td>
                    <td><?php echo $show["total"]   ?></td>

                    <td><?php echo $show["payments"]   ?></td>
                    <td><?php echo $show["createdate"]   ?></td>
                    <!-- <td>14.3.2023</td> -->
                    <td>
                        <a href="orderEdit.php?transfer=<?php echo $show['order_id']; ?>&type=<?php echo $show['payments']; ?>">Click Here</a>
                    </td>
                    <td>
                        <a href="orderDel.php?pass=<?php echo $show['order_id']; ?>">Delete</a>
                    </td>
                </tr>




            <?php

            };


            ?>
        </tbody>
    </table>

    <div style="text-align: center;" class="container tabletwo">

        <?php

        $sql = "SELECT * FROM realorder WHERE status='1'";
        $s = mysqli_query($db, $sql);

        while ($show = mysqli_fetch_array($s)) {

        ?>

            <!-- <div class="col-8" style="margin: 0 auto !important;">
                <img class="img-fluid" src="newimgs/<?php echo $show["imgfile"]   ?>" alt="Customer img">
            </div> -->
            <div class="row">
                <div style="font-weight:bold;" class="col">
                    Customer name:
                </div>
                <div class="col">
                    <?php echo $show["customer"]   ?>
                </div>
            </div>
            <div class="row">
                <div style="font-weight:bold;" class="col">
                    Product names:
                </div>
                <div class="col">
                    <?php echo $show["products"]   ?>
                </div>
            </div>
            <div class="row">
                <div style="font-weight:bold;" class="col">
                    Payment Status:
                </div>
                <div class="col">
                    <?php echo $show["payments"]   ?>
                </div>
            </div>
            <div class="row">
                <div style="font-weight:bold;" class="col">
                    Total Price:
                </div>
                <div class="col">
                    $<?php echo $show["total"]   ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="orderEdit.php?transfer=<?php echo $show['order_id']; ?>&type=<?php echo $show['payments']; ?>">Change Payment Status</a>
                </div>
                <div class="col">
                    <a href="orderDel.php?pass=<?php echo $show['order_id']; ?>">Delete</a>
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