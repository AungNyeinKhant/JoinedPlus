<?php


include("include/config.php");

$transfer = $_GET['transfer'];
//$type = $_GET['type'];
//echo "$transfer";




if (isset($_POST["sedit"])) {

    $seller_id = $_POST["seller_id"];
    $name = $_POST["sname"];
    $phone = $_POST["sphone"];
    $gender = $_POST["sgender"];
    $email = $_POST["semail"];

    $address = $_POST["saddress"];
    $old = $_POST["oldfile"];


    //$image
    //$file = $_FILES['file']['name'];
    $filename = $_FILES["simage"]["name"];
    $tempname = $_FILES["simage"]["tmp_name"];

    $folder = "newimgs/" . $filename;

    if ($filename != "") {

        move_uploaded_file($tempname, $folder);
    } else {

        $filename =  $old;
        // $oldfile;

    }







    $bankno = $_POST["sbno"];
    $bankname = $_POST["sbname"];


    //get all data from form

    $sql = "UPDATE seller SET name='$name',imgfile='$filename',phone='$phone',address='$address',bankname='$bankname',bankno='$bankno',gmail='$email',gender='$gender' WHERE seller_id='$seller_id'";




    mysqli_multi_query($db, $sql);
    //echo "<p style='color:red;'>Saved</p>";
    echo "<h3>  Uploaded successfully!</h3>";
    // header("Location: .php");



    // if (move_uploaded_file($tempname, $folder)) {

    //     echo "<h3>  Uploaded successfully!</h3>";
    // }
    header('location:sellerTable.php');
}

include("header.php");
?>


<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <!-- <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        
    </div> -->
    <h1 style="text-align: center;color:  #5b7c99; ">Seller Update Form</h1>

    <?php

    $query = "SELECT * FROM seller WHERE seller_id='$transfer'";
    $sresult = mysqli_query($db, $query);
    $sedit = mysqli_fetch_array($sresult);


    ?>


    <form action="selEdit.php" enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="form-group ">
                <label for="firstName">FUll Name</label>
                <input id="firstName" class="form-control" value="<?php echo $sedit["name"]  ?>" type="text" name="sname" required>
            </div>

        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="sphone">Phone no</label>
                <input id="sphone" class="form-control" value="<?php echo $sedit["phone"]  ?>" type="text" name="sphone">
            </div>
            <div class="form-group col-6">
                <label for="gender">Gender(male/female)</label>
                <select class="form-control" name="sgender" id="sgender">
                    <option value="">Select</option>
                    <option value="male" <?php if ($sedit["gender"] == 'male') echo "selected"; ?>>Male</option>
                    <option value="female" <?php if ($sedit["gender"] == 'female') echo "selected"; ?>>Female</option>
                </select>
                <!-- <input id="gender" class="form-control" type="text" name="cgender"> -->
            </div>
        </div>
        <div class="form-group">
            <label for="semail">Email</label>
            <input id="semail" class="form-control" value="<?php echo $sedit["gmail"]  ?>" type="email" required name="semail" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input id="saddress" class="form-control" value="<?php echo $sedit["address"]  ?>" type="text" name="saddress">
        </div>

        <!-- <input type="hidden" name="" id="" value="today's date"> -->

        <!-- <input type="hidden" name="" id="" value="Edited date"> -->


        <div class="form-group">
            <label for="simg">Your image</label>
            <input id="simage" class="form-control" type="file" name="simage">
            <?php
            $oldfile =  $sedit["imgfile"];
            ?>
            <input type="hidden" name="oldfile" id="oldfile" value="<?php echo $oldfile ?>">
        </div>

        <div class="form-group">
            <label for="bank">Bank account</label>
            <input id="sbno" class="form-control" type="text" name="sbno" value="<?php echo $sedit["bankno"]  ?>" placeholder="FXO-193432">
        </div>
        <input id="kpay" class="form-check-input" <?php if ($sedit['bankname'] == "kpay") {
                                                        echo "checked";
                                                    } ?> type="radio" name="sbname" value="kpay">
        <label for="kpay" class="form-check-label">Kbzpay</label>
        <input id="wavepay" class="form-check-input" <?php if ($sedit['bankname'] == "wavepay") {
                                                            echo "checked";
                                                        } ?> type="radio" name="sbname" value="wavepay">
        <label for="wavepay" class="form-check-label">Wavepay</label>
        <input id="ayapay" class="form-check-input" <?php if ($sedit['bankname'] == "ayapay") {
                                                        echo "checked";
                                                    } ?> type="radio" name="sbname" value="ayapay">
        <label for="ayapay" class="form-check-label">Ayapay</label>
        <br /><br />

        <input type="hidden" name="seller_id" id="seller_id" value="<?php echo $transfer; ?>" />


        <button name="sedit" id="sedit" class="btn btn-primary" style="margin-left: 15px;" type="submit">Update</button>
        <!-- <script>
            function myFunction() {
                window.location.href = "customerTable.php";
            }
        </script> -->


    </form>
</div>
<!-- Blank End -->


<?php
include("footer.php");

?>