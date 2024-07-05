<?php


$db = mysqli_connect("localhost", "root", "", "joishop");

$transfer = $_GET['transfer'];
$type = $_GET['type'];


if ($type == 1) {
    if (isset($_POST["mcbtn"])) {

        $cate_id = $_POST["cate_id"];

        $category = $_POST["mcedit"];



        //get all data from form

        $sql = "UPDATE maincate SET maincate='$category' WHERE cate_id='$cate_id'";


        mysqli_multi_query($db, $sql);
        //echo "<p style='color:red;'>Saved</p>";

        $redirect_url = "categoTable.php";
        header('Location: ' . $redirect_url);

        //header("Location: categoTable.php");
    };

    include("header.php");

?>

    <div class="container-fluid pt-4 px-4">
        <h1 style="text-align: center;color:  #5b7c99;">Main Category Edit Form</h1>

        <?php

        $query1 = "SELECT * FROM maincate WHERE cate_id='$transfer'";
        $result1 = mysqli_query($db, $query1);
        $answer = mysqli_fetch_array($result1);


        ?>

        <form action="" method="POST">




            <div class="form-group">
                <label for="mcedit">Main Categories</label>
                <input id="mcedit" class="form-control" value="<?php echo $answer['maincate'] ?>" type="text" name="mcedit">
            </div>




            <input type="hidden" name="cate_id" id="cate_id" value="<?php echo $transfer; ?>" />
            <br />

            <div style="margin: 15px auto ;">
                <button class="btn btn-primary" type="submit" name="mcbtn" id="mcbtn">Update</button>
            </div>
        </form>
        <!-------------------------- Main category edit end ------------------------------>



    </div>
<?php


} else if ($type == 2) {

    if (isset($_POST["preg"])) {

        $cate_id = $_POST["cate_id"];

        $category = $_POST["camain"];
        $subcate = $_POST['psub'];



        //get all data from form

        $sql = "UPDATE category2 SET maincate='$category',subcate='$subcate' WHERE cate_id='$cate_id'";


        mysqli_multi_query($db, $sql);
        //echo "<p style='color:red;'>Saved</p>";

        $redirect_url = "categoTable.php";
        header('Location: ' . $redirect_url);

        //header("Location: categoTable.php");
    };

    include("header.php");

?>




    <div class="container-fluid pt-4 px-4">




        <!-------------------------- Main category edit end ------------------------------>

        <!-- <hr style="opacity: 1;" /> -->
        <h1 style="text-align: center;color:  #5b7c99;">Sub Category Edit Form</h1>

        <?php

        $query = "SELECT * FROM category2 WHERE cate_id='$transfer'";
        $result = mysqli_query($db, $query);
        $edit = mysqli_fetch_array($result);


        ?>

        <form action="" method="POST">

            <div class="form-group">
                <Label for="camain">Choose Main Category</Label>
                <select name="camain" class="form-control">
                    <option value="">Select</option>
                    <?php
                    $caSql = "SELECT * FROM maincate WHERE status =1";
                    $c = mysqli_query($db, $caSql);


                    while ($cate = mysqli_fetch_array($c)) {

                    ?>

                        <option value="<?php echo $cate['maincate'] ?>" <?php if ($edit["maincate"] == $cate['maincate']) echo "selected"; ?>> <?php echo $cate['maincate'] ?> </option>
                    <?php

                    };

                    ?>
                </select>
            </div>


            <!-- <div class="form-group">
                <label for="pcate">Categories</label>
                <input id="pcate" class="form-control" value="" type="text" name="pcate">
            </div> -->

            <div class="form-group">
                <label for="psub">Sub-Categories</label>
                <input id="psub" class="form-control" value="<?php echo $edit["subcate"]  ?>" type="text" name="psub">
            </div>


            <input type="hidden" name="cate_id" id="cate_id" value="<?php echo $transfer; ?>" />
            <br />

            <div style="margin: 15px auto ;">
                <button class="btn btn-primary" type="submit" name="preg" id="preg">Update</button>
            </div>





        </form>

    </div>
<?php

};

//codes for sub end here
?>










<?php
include("footer.php");


?>