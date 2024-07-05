<?php
include("header.php");

$db = mysqli_connect("localhost", "root", "", "joishop");

if (isset($_POST["cabtn"])) {
    // echo "<script> alert('Hello');</script>";
    // die();
    //$db = mysqli_connect("localhost", "root", "", "joishop");


    $category = $_POST["camain"];
    //echo "$category";
    $subCate = $_POST["casub"];
    //echo "$subCate";




    //get all data from form

    $sql = "INSERT INTO category2 (maincate,subcate,status) VALUES ('$category','$subCate',1) ";




    $check = mysqli_multi_query($db, $sql);
    if ($check) {
        echo "<h3> Uploaded successfully!</h3>";
    } else {
        echo "<h3> Uploaded Fail!</h3>";
    }
}

if (isset($_POST["mcbtn"])) {
    $maincate = $_POST["mcvalue"];


    $sql = "INSERT INTO maincate (maincate,status) VALUES ('$maincate',1) ";




    $check = mysqli_multi_query($db, $sql);
    if ($check) {
        echo "<h3> Uploaded Main successfully!</h3>";
    } else {
        echo "<h3> Uploaded Main Fail!</h3>";
    }
}


?>




<div class="container-fluid pt-4 px-4">

    <h1 style="text-align: center;color:  #5b7c99;">Main Category Register</h1>

    <form action="" method="POST">


        <div class="form-group">
            <label for="mcvalue">Main Categories</label>
            <input id="mcvalue" class="form-control" type="text" name="mcvalue" required>
        </div>





        <br />

        <div style="margin: 15px auto ;">
            <button class="btn btn-primary" type="submit" name="mcbtn" id="mcbtn">Register</button>
        </div>





    </form>

    <hr style="opacity: 1;" />
    <h1 style="text-align: center;color:  #5b7c99;">Sub Category Register</h1>

    <form action="" method="POST">

        <div class="form-group">
            <Label for="camain">Choose Main Category</Label>
            <select name="camain" class="form-control">
                <option selected disabled>CLick here</option>
                <?php
                $caSql = "SELECT * FROM maincate WHERE status =1";
                $c = mysqli_query($db, $caSql);


                while ($cate = mysqli_fetch_array($c)) {

                ?>

                    <option value="<?php echo $cate['maincate'] ?>"> <?php echo $cate['maincate'] ?> </option>
                <?php

                };

                ?>
            </select>
        </div>


        <!-- <div class="form-group">
            <label for="pcate">Categories</label>
            <input id="pcate" class="form-control" type="text" name="camain" required>
        </div> -->

        <div class="form-group">
            <label for="psub">Sub-Categories</label>
            <input id="psub" class="form-control" type="text" name="casub" required>
        </div>



        <br />

        <div style="margin: 15px auto ;">
            <button class="btn btn-primary" type="submit" name="cabtn" id="cabtn">Register</button>
        </div>





    </form>

</div>




<?php
include("footer.php");


?>