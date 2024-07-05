<?php


include("include/config.php");

$transfer = $_GET['transfer'];
//echo "$transfer";




if (isset($_POST["cedit"])) {

    $user_id = $_POST["user_id"];
    $name = $_POST["cname"];
    $phone = $_POST["cphone"];
    $gender = $_POST["cgender"];
    $email = $_POST["cemail"];
    $password = $_POST["cpassword"];
    $address = $_POST["caddress"];
    $old = $_POST["oldfile"];


    //$image
    //$file = $_FILES['file']['name'];
    $filename = $_FILES["cimage"]["name"];
    $tempname = $_FILES["cimage"]["tmp_name"];

    $folder = "newimgs/" . $filename;

    if ($filename != "") {

        move_uploaded_file($tempname, $folder);
    } else {

        $filename =  $old;
        // $oldfile;

    }







    $bankno = $_POST["cbno"];
    $bankname = $_POST["cbname"];


    //get all data from form

    $sql = "UPDATE customer SET name='$name',imgfile='$filename',phone='$phone',address='$address',bankname='$bankname',bankno='$bankno',gmail='$email',password='$password',gender='$gender' WHERE user_id='$user_id'";




    mysqli_multi_query($db, $sql);
    //echo "<p style='color:red;'>Saved</p>";
    echo "<h3>  Uploaded successfully!</h3>";
    //header("Location: ");
    $redirect_url = "customerTable.php";
    header('Location: ' . $redirect_url);



    // if (move_uploaded_file($tempname, $folder)) {

    //     echo "<h3>  Uploaded successfully!</h3>";
    // }
    // header('location:customerTable.php');
}

include("header.php");
?>


<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <!-- <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        
    </div> -->
    <h1 style="text-align: center;color:  #5b7c99; ">Customer Update Form</h1>

    <?php

    $query = "SELECT * FROM customer WHERE user_id='$transfer'";
    $result = mysqli_query($db, $query);
    $edit = mysqli_fetch_array($result);


    ?>


    <form action="customerEdit.php" enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="form-group ">
                <label for="firstName">FUll Name</label>
                <input id="firstName" class="form-control" value="<?php echo $edit["name"]  ?>" type="text" name="cname" required>
            </div>

        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="cphone">Phone no</label>
                <input id="cphone" class="form-control" value="<?php echo $edit["phone"]  ?>" type="text" name="cphone">
            </div>
            <div class="form-group col-6">
                <label for="gender">Gender(male/female)</label>
                <select class="form-control" name="cgender" id="cgender">
                    <option value="">Select</option>
                    <option value="male" <?php if ($edit["gender"] == 'male') echo "selected"; ?>>Male</option>
                    <option value="female" <?php if ($edit["gender"] == 'female') echo "selected"; ?>>Female</option>
                </select>
                <!-- <input id="gender" class="form-control" type="text" name="cgender"> -->
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="cemail" class="form-control" value="<?php echo $edit["gmail"]  ?>" type="email" required name="cemail" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="cpassword" class="form-control" value="<?php echo $edit["password"]  ?>" type="text" required name="cpassword" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input id="caddress" class="form-control" value="<?php echo $edit["address"]  ?>" type="text" name="caddress">
        </div>

        <!-- <input type="hidden" name="" id="" value="today's date"> -->

        <!-- <input type="hidden" name="" id="" value="Edited date"> -->


        <div class="form-group">
            <label for="userImg">Your image</label>
            <input id="cimage" class="form-control" type="file" name="cimage">
            <?php
            $oldfile =  $edit["imgfile"];
            ?>
            <input type="hidden" name="oldfile" id="oldfile" value="<?php echo $oldfile ?>">
        </div>

        <div class="form-group">
            <label for="bank">Bank account</label>
            <input id="cbno" class="form-control" type="text" name="cbno" value="<?php echo $edit["bankno"]  ?>" placeholder="FXO-193432">
        </div>
        <input id="kpay" class="form-check-input" <?php if ($edit['bankname'] == "kpay") {
                                                        echo "checked";
                                                    } ?> type="radio" name="cbname" value="kpay">
        <label for="kpay" class="form-check-label">Kbzpay</label>
        <input id="wavepay" class="form-check-input" <?php if ($edit['bankname'] == "wavepay") {
                                                            echo "checked";
                                                        } ?> type="radio" name="cbname" value="wavepay">
        <label for="wavepay" class="form-check-label">Wavepay</label>
        <input id="ayapay" class="form-check-input" <?php if ($edit['bankname'] == "ayapay") {
                                                        echo "checked";
                                                    } ?> type="radio" name="cbname" value="ayapay">
        <label for="ayapay" class="form-check-label">Ayapay</label>
        <br /><br />

        <input type="hidden" name="user_id" id="user_id" value="<?php echo $transfer; ?>" />


        <button name="cedit" id="cedit" onClick="myFunction()" class="btn btn-primary" style="margin-left: 15px;" type="submit">Update</button>
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