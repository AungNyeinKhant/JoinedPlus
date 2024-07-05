<?php

$id = "reg";

include("admin/include/config.php");

if (isset($_POST['addmore'])) {
    $product_id = $_POST['product_id'];
    //echo $order_id;

    $query = "SELECT * FROM product WHERE status=1 AND product_id='$product_id';";
    $addresult = mysqli_query($db, $query);
    $add = mysqli_fetch_array($addresult);

    $name = $add['name'];
    //echo $name;
    $sname = $add['sellername'];
    //echo $sname;
    $imgfile = $add['imgfile'];
    //echo $imgfile;
    $price = $add['price'];
    //echo $price;

    $paystatus = "C.O.D";
    //query here

    $query = "INSERT INTO order66 (name,sellername,imgfile,price,paymentStatus,status) VALUES ('$name','$sname','$imgfile','$price','$paystatus',1);";
    $check = mysqli_multi_query($db, $query);
    if ($check) {
        echo "<script> alert('Added to cart successfully...') ;</script>";
    };
};

if (isset($_POST["cbtn"])) {
    // echo "<script> alert('Hello');</script>";
    // die();
    //$db = mysqli_connect("localhost", "root", "", "joishop");

    $name = $_POST["cname"];
    //echo "$name";
    $phone = $_POST["cphone"];
    //echo "$phone";
    $gender = $_POST["cgender"];
    //echo "$gender";
    $email = $_POST["cemail"];
    //echo "$email";
    $password = $_POST["cpassword"];
    //echo "$password";
    $address = $_POST["caddress"];
    //echo "$address";


    //$image
    $filename = $_FILES["cimage"]["name"];

    $tempname = $_FILES["cimage"]["tmp_name"];

    $folder = "admin/newimgs/" . $filename;


    $bankno = $_POST["cbno"];
    //echo "$bankno";
    $bankname = $_POST["cbname"];
    //echo "$bankname";


    //get all data from form
    //$uploadquery = "INSERT INTO customer (name,imgfile,phone,address,bankname,bankno,gmail,password,gender,status) VALUES ($name,$filename,$phone,$address,$bankname,$bankno,$email,$password,$gender,1) ";
    $sql = "INSERT INTO customer (name,imgfile,phone,address,bankname,bankno,gmail,password,gender,status) VALUES ('$name','$filename','$phone','$address','$bankname','$bankno','$email','$password','$gender',1) ";
    //$sql = "INSERT INTO `customer` ( `name`, `imgfile`, `phone`, `address`, `bankname`, `bankno`, `gmail`, `password`, `gender`, `status`) VALUES ($name,$filename,$phone,$address,$bankname,$bankno,$email,$password,$gender, '1');";


    //$sql = "INSERT INTO user(name,email,address,phone,zip,status) VALUES('$name','$email','$address', '$phone', '$zip',1) ";
    mysqli_multi_query($db, $sql);
    // echo "<p style='color:red;'>Saved</p>";
    // echo "<br />";


    if (move_uploaded_file($tempname, $folder)) {

        echo "<h3> Uploaded successfully!</h3>";
    } else {

        echo "<h3>  Failed to upload!</h3>";
    }

    //echo "<script>alert('Saved');</script>";
}

include("header.php");

?>

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="mdsearch" name="mdsearch" placeholder="Search Product Name..." />
                <button name="searchbtn" type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<?php
$db = mysqli_connect("localhost", "root", "", "joishop");
if (isset($_POST['searchbtn'])) {
    $searchName = $_POST['mdsearch'];
    $searchQuery = "SELECT * FROM product WHERE name LIKE '%$searchName%' AND status='1'";
    $resultSearch = mysqli_query($db, $searchQuery);



?>

    <div class="container py-5">









        <div class="row">

            <?php



            while ($card = mysqli_fetch_array($resultSearch)) {



            ?>



                <div class="col-md-4">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 " style="width: 100%;height: 330px; " src="admin/newimgs/<?php echo $card['imgfile'];  ?>" />
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">

                                    <li>
                                        <a class="btn btn-success text-white mt-2" href="shop-single.php?move=<?php echo $card['product_id'];  ?>"><i class="far fa-eye"></i></a>
                                    </li>
                                    <li>
                                        <form action="" method="POST">
                                            <input type="hidden" name="product_id" value="<?php echo $card['product_id'];  ?>">
                                            <button type="submit" class="btn btn-success text-white mt-2" name="addmore"><i class="fas fa-cart-plus"></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="shop-single.php?move=<?php echo $card['product_id'];  ?>" class="h3 text-decoration-none"><?php echo $card['name'];  ?></a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>
                                    <span style="font-size: small; color: #5B7C99;">
                                        <?php echo $card['category'];  ?>>><?php echo $card['subcategory'];  ?>
                                    </span>
                                </li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$<?php echo $card['price'];  ?></p>
                        </div>
                    </div>
                </div>

            <?php

            };


            ?>





        </div>






    </div>


<?php

} else {

?>

    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">


        <!-- Start Contact -->
        <div id="registerForm" class="container py-5">
            <h1 style="
          text-align: center;
          font-weight: bolder;
          font-size: 55px;
          color: #7c0a02;
            ">
                Customer Register Form
            </h1>
            <div class="row py-5">

                <form role="form" action="" enctype="multipart/form-data" method="POST" style="background-color: #e6fc81; padding: 25px; border-radius: 15px" class="col-md-9 m-auto">
                    <div class="row">
                        <div class="form-group " for="vname">
                            <label for="vname">FUll Name</label>
                            <input id="vname" class="form-control " type="text" name="cname" required>
                            <!-- hide and show -->
                            <ul class="input-requirements">

                                <li>Must only contain letters (no special characters and numbers)</li>
                            </ul>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-6" for="vphone">
                            <label for="vphone">Phone no</label>
                            <input id="vphone" class="form-control" type="text" name="cphone">
                            <ul class="input-requirements">
                                <li>Must only contain numbers (no special characters and letters)</li>
                            </ul>
                        </div>
                        <div class="form-group col-6">
                            <label for="gender">Gender(male/female)</label>
                            <select class="form-control" name="cgender" id="cgender">
                                <option value="" disabled selected>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>

                            <!-- <input id="gender" class="form-control" type="text" name="cgender"> -->
                        </div>
                    </div>
                    <div class="form-group" for="vemail">
                        <label for="vemail">Email</label>
                        <input id="vemail" class="form-control" type="email" required name="cemail" required>
                        <ul class="input-requirements">
                            <li>Only letters and numbers are allowed</li>
                            <li>Must only contain '@' in an email </li>
                        </ul>
                    </div>
                    <div class="form-group" for="vpassword">
                        <label for="vpassword">Password</label>
                        <input id="vpassword" class="form-control" minlength="5" type="password" required name="cpassword" required>
                        <ul class="input-requirements">
                            <li>At least 5 characters long (and less than 20 characters)</li>
                            <li>Contains at least 1 number</li>
                            <li>Contains at least 1 lowercase letter</li>
                            <li>Contains at least 1 uppercase letter</li>
                            <li>Contains a special character (e.g. @ !)</li>
                        </ul>
                    </div>
                    <div class="form-group" for="vaddress">
                        <label for="vaddress">Address</label>
                        <input id="vaddress" class="form-control" type="text" name="caddress">
                        <ul class="input-requirements">

                            <li>Must only contain "." letters and numbers (no special characters)</li>
                        </ul>
                    </div>

                    <!-- <input type="hidden" name="" id="" value="today's date"> -->

                    <!-- <input type="hidden" name="" id="" value="Edited date"> -->


                    <div class="form-group">
                        <label for="userImg">Your image</label>
                        <input id="cimage" class="form-control" type="file" name="cimage">
                    </div>

                    <div class="form-group" for="vbno">
                        <label for="vbno">Bank account</label>
                        <input id="vbno" class="form-control" type="text" name="cbno" placeholder="08631193432">
                        <ul class="input-requirements">

                            <li>Must only contain numbers (no special characters and letters)</li>
                        </ul>
                    </div>
                    <input id="kpay" class="form-check-input" type="radio" name="cbname" value="kpay">
                    <label for="kpay" class="form-check-label">Kbzpay</label>
                    <input id="wavepay" class="form-check-input" type="radio" name="cbname" value="wavepay">
                    <label for="wavepay" class="form-check-label">Wavepay</label>
                    <input id="ayapay" class="form-check-input" type="radio" name="cbname" value="kpay">
                    <label for="ayapay" class="form-check-label">Ayapay</label>
                    <br /><br />



                    <div class="row">
                        <div class="col text-end mt-2">
                            <button type="submit" name="cbtn" id="cbtn" type="submit" class="btn btn-success btn-lg px-3">
                                Register
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
        <!-- End Contact -->
    </div>
<?php

};

?>

<!-- Start Footer -->
<?php
include("footer.php");

?>