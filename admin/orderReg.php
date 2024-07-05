<?php


$db = mysqli_connect("localhost", "root", "", "joishop");

if (isset($_POST['buybtn'])) {
    $prodid = $_POST['product_id'];
    //echo $product_id . "hi";

    $prodsql = "SELECT * FROM product WHERE product_id='$prodid' AND status=1; ";
    $prodresult = mysqli_query($db, $prodsql);
    $answerp = mysqli_fetch_array($prodresult);

    //take data from product
    $name = $answerp['name'];
    //echo $name;
    $sname = $answerp['sellername'];
    //echo $sname;
    $imgfile = $answerp['imgfile'];
    //echo $imgfile;
    $price = $answerp['price'];
    //echo $price;

    $paystatus = "Paid";
    //query here

    $query = "INSERT INTO order66 (name,sellername,imgfile,price,paymentStatus,status) VALUES ('$name','$sname','$imgfile','$price','$paystatus',1);";
    $check = mysqli_multi_query($db, $query);
    if ($check) {
        echo "<script> alert('Ordered successful...'); </script>";
    } else {
        echo "<script> alert('Ordered Fail!'); </script>";
    };
};


if (isset($_POST['addbtn'])) {
    $prodid = $_POST['product_id'];
    //echo $product_id . "World";

    $prodsql = "SELECT * FROM product WHERE product_id='$prodid' AND status=1; ";
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
        echo "<script> alert('Ordered successful...'); </script>";
    } else {
        echo "<script> alert('Ordered Fail!'); </script>";
    };
};

include("header.php");


?>




<div class="container-fluid pt-4 px-4">
    <h1 style="text-align: center;color:  #5b7c99;">Order Register</h1>

    <form action="" method="POST">
        <div class="form-group col-6">
            <Label for="product_id">Choose Product || Categories</Label>
            <select name="product_id" class="form-control" required>
                <option selected disabled>CLick here</option>
                <?php
                $caSql = "SELECT * FROM product WHERE status =1";
                $c = mysqli_query($db, $caSql);


                while ($cate = mysqli_fetch_array($c)) {

                ?>

                    <option value="<?php echo $cate['product_id'] ?>">
                        <?php echo $cate['name'] ?> || <?php echo $cate['category'] ?> >> <?php echo $cate['subcategory'] ?>
                    </option>
                <?php

                };

                ?>
            </select>
        </div>




        <br />

        <div class="row pb-3">
            <div class="col d-grid">
                <button class="btn btn-primary" type="submit" name="buybtn" id="buybtn">Buy</button>
            </div>
            <div class="col d-grid">
                <button class="btn btn-primary" type="submit" name="addbtn" id="addbtn">Add To Cart</button>
            </div>
        </div>





    </form>

</div>




<?php
include("footer.php");


?>