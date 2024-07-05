<?php
include("header.php");

include("include/config.php");
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

	$folder = "newimgs/" . $filename;


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


?>


<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
	<!-- <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        
    </div> -->
	<h1 style="text-align: center;color:  #5b7c99; ">Customer Register Form</h1>
	<form action="customerReg.php" enctype="multipart/form-data" method="POST">
		<div class="row">
			<div class="form-group ">
				<label for="firstName">FUll Name</label>
				<input id="firstName" class="form-control" type="text" name="cname" required>
			</div>

		</div>
		<div class="row">
			<div class="form-group col-6">
				<label for="cphone">Phone no</label>
				<input id="cphone" class="form-control" type="text" name="cphone">
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
		<div class="form-group">
			<label for="email">Email</label>
			<input id="cemail" class="form-control" type="email" required name="cemail" required>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input id="cpassword" class="form-control" type="password" required name="cpassword" required>
		</div>
		<div class="form-group">
			<label for="address">Address</label>
			<input id="caddress" class="form-control" type="text" name="caddress">
		</div>

		<!-- <input type="hidden" name="" id="" value="today's date"> -->

		<!-- <input type="hidden" name="" id="" value="Edited date"> -->


		<div class="form-group">
			<label for="userImg">Your image</label>
			<input id="cimage" class="form-control" type="file" name="cimage">
		</div>

		<div class="form-group">
			<label for="bank">Bank account</label>
			<input id="cbno" class="form-control" type="text" name="cbno" placeholder="FXO-193432">
		</div>
		<input id="kpay" class="form-check-input" type="radio" name="cbname" value="kpay">
		<label for="kpay" class="form-check-label">Kbzpay</label>
		<input id="wavepay" class="form-check-input" type="radio" name="cbname" value="wavepay">
		<label for="wavepay" class="form-check-label">Wavepay</label>
		<input id="ayapay" class="form-check-input" type="radio" name="cbname" value="kpay">
		<label for="ayapay" class="form-check-label">Ayapay</label>
		<br /><br />


		<button name="cbtn" id="cbtn" class="btn btn-primary" style="margin-left: 15px;" type="submit">Register</button>



	</form>
</div>
<!-- Blank End -->


<?php
include("footer.php");

?>