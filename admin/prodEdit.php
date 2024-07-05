<?php


$db = mysqli_connect("localhost", "root", "", "joishop");

$transfer = $_GET['transfer'];

if (isset($_POST["preg"])) {

    $product_id = $_POST["product_id"];


    $old = $_POST["oldfile"];
    $name = $_POST["pname"];


    $sname = $_POST["psname"];

    $cate_id = $_POST["cate_id"];

    $catequery = "SELECT * FROM category2 WHERE status =1 AND cate_id='$cate_id'";
    $connect = mysqli_query($db, $catequery);


    $sent = mysqli_fetch_array($connect);
    $category = $sent["maincate"];


    $subCate = $sent["subcate"];



    $about = $_POST['about'];



    //$image
    //$file = $_FILES['file']['name'];
    $filename = $_FILES["pimg"]["name"];
    $tempname = $_FILES["pimg"]["tmp_name"];

    $folder = "newimgs/" . $filename;



    if ($filename != "") {

        move_uploaded_file($tempname, $folder);
        //echo "<h3>  Uploaded successfully!</h3>";
    } else {

        $filename =  $old;
        // $oldfile;
        // echo "<h3>  Uploaded Fail!</h3>";
    }

    $pprice = $_POST["pprice"];



    //get all data from form


    $sql = "UPDATE product SET name='$name',sellername='$sname',category='$category',subcategory='$subCate',imgfile='$filename',price='$pprice',about='$about' WHERE product_id='$product_id';";




    $check = mysqli_multi_query($db, $sql);
    if ($check) {
        echo "<script> alert('Prod  Uploaded Successful!');</script>";
    } else {
        echo "<script> alert('Prod  Uploading Fail!');</script>";
    };
    //echo "<p style='color:red;'>Saved</p>";

    header("Location: productTable.php");
};

include("header.php");
?>




<div class="container-fluid pt-4 px-4">
    <h1 style="text-align: center;color:  #5b7c99;">Product Edit Form</h1>

    <?php

    $query = "SELECT * FROM product WHERE product_id='$transfer'";
    $result = mysqli_query($db, $query);
    $edit = mysqli_fetch_array($result);


    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group ">
                <label for="pname">Product Name</label>
                <input id="pname" class="form-control" value="<?php echo $edit["name"]  ?>" type="text" name="pname">
            </div>

        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="psname">Seller name</label>
                <input id="psname" class="form-control" value="<?php echo $edit["sellername"]  ?>" type="text" name="psname">
            </div>

            <!-- <div class="form-group col-6">
            <label for="phone">Seller Phone no</label>
            <input id="phone" class="form-control" type="text" name="phone">
            </div> -->

            <div class="form-group col-6">
                <Label for="cate_id">Choose Category</Label>
                <select name="cate_id" class="form-control">
                    <option disabled>CLick here</option>
                    <?php
                    $caSql = "SELECT * FROM category2 WHERE status =1";
                    $c = mysqli_query($db, $caSql);


                    while ($cate = mysqli_fetch_array($c)) {

                    ?>

                        <option value="<?php echo $cate['cate_id'] ?>" <?php if ($edit["category"] == $cate['maincate'] && $edit["subcategory"] == $cate['subcate']) echo "selected"; ?>><?php echo $cate['maincate'] ?> >> <?php echo $cate['subcate'] ?></option>
                    <?php

                    };

                    ?>
                </select>
            </div>


        </div>

        <!-- <div class="form-group">
            <label for="pcate">Categories</label>
            <input id="pcate" class="form-control" value="" type="text" name="pcate">
        </div>

        <div class="form-group">
            <label for="psub">Sub-Categories</label>
            <input id="psub" class="form-control" value="" type="text" name="psub">
        </div> -->

        <!-- <input type="hidden" name="" id="" value="today's date"> -->

        <!-- <input type="hidden" name="" id="" value="Edited date"> -->

        <div class="row">
            <div class="form-group  col-6">
                <label for="pimg">Product image</label>
                <input id="pimg" class="form-control" type="file" name="pimg">
                <?php
                $oldfile =  $edit["imgfile"];
                ?>
                <input type="hidden" name="oldfile" id="oldfile" value="<?php echo $oldfile ?>">
            </div>

            <div class="form-group col-6">
                <label for="pprice">Price</label>
                <input id="pprice" class="form-control" value="<?php echo $edit["price"]  ?>" type="text" name="pprice">
            </div>
        </div>

        <div class="form-group">
            <label for="about">About Product</label>
            <textarea class="form-control" name="about" id="about" cols="30" rows="10">
            <?php echo $edit["about"]  ?>
            </textarea>

        </div>

        <input type="hidden" name="product_id" id="product_id" value="<?php echo $transfer; ?>" />
        <br />

        <div style="margin: 15px auto ;">
            <button class="btn btn-primary" type="submit" name="preg" id="preg">Update</button>
        </div>





    </form>

</div>




<?php
include("footer.php");


?>