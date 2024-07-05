<?php


$db = mysqli_connect("localhost", "root", "", "joishop");

if (isset($_POST["preg"])) {
  // echo "<script> alert('Hello');</script>";
  // die();
  //$db = mysqli_connect("localhost", "root", "", "joishop");
  $cate_id = $_POST["cate_id"];
  $catequery = "SELECT * FROM category2 WHERE status =1 AND cate_id='$cate_id'";
  $connect = mysqli_query($db, $catequery);


  while ($sent = mysqli_fetch_array($connect)) {
    $category = $sent["maincate"];

    $subCate = $sent["subcate"];
  };
  // echo "$category";
  // echo "<br />";
  // echo "$subCate";


  $name = $_POST["pname"];
  //echo "$name";
  $sname = $_POST["psname"];
  //echo "$sname";

  $about = $_POST["about"];
  //echo "$about";
  //$image
  $pfilename = $_FILES["pimg"]["name"];

  $ptempname = $_FILES["pimg"]["tmp_name"];

  $pfolder = "newimgs/" . $pfilename;

  //echo "$pfilename";
  move_uploaded_file($ptempname, $pfolder);


  $pprice = $_POST["pprice"];
  //echo "$pprice";


  //get all data from form
  $pquery = "INSERT INTO product (name,sellername,category,subcategory,imgfile,price,about,status) VALUES ('$name','$sname','$category','$subCate','$pfilename','$pprice','$about',1) ";




  $check = mysqli_multi_query($db, $pquery);
  if ($check) {
    echo "<script> alert('Uploaded successfully...'); </script>";
  } else {
    echo "<script> alert('Uploading Fail!'); </script>";
  };



  /*

  if (move_uploaded_file($ptempname, $pfolder)) {

    echo "<h3> Uploaded successfully!</h3>";
  } else {

    echo "<h3>  Failed to upload!</h3>";
  }
*/
  //echo "<script>alert('Saved');</script>";
};

include("header.php");


?>




<div class="container-fluid pt-4 px-4">
  <h1 style="text-align: center;color:  #5b7c99;">Product Register</h1>

  <form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="form-group ">
        <label for="pname">Product Name</label>
        <input id="pname" class="form-control" type="text" name="pname">
      </div>

    </div>
    <div class="row">
      <div class="form-group col-6">
        <label for="psname">Seller name</label>
        <input id="psname" class="form-control" type="text" name="psname">
      </div>

      <!-- <div class="form-group col-6">
        <label for="phone">Seller Phone no</label>
        <input id="phone" class="form-control" type="text" name="phone">
      </div> -->

      <div class="form-group col-6">
        <Label for="cate_id">Choose Category</Label>
        <select name="cate_id" class="form-control">
          <option selected disabled>CLick here</option>
          <?php
          $caSql = "SELECT * FROM category2 WHERE status =1";
          $c = mysqli_query($db, $caSql);


          while ($cate = mysqli_fetch_array($c)) {

          ?>

            <option value="<?php echo $cate['cate_id'] ?>"><?php echo $cate['maincate'] ?> >> <?php echo $cate['subcate'] ?></option>
          <?php

          };

          ?>
        </select>
      </div>

    </div>
    <!----------------------- Old Category ------------------------->

    <!-- <div class="form-group">
      <label for="pcate">Categories</label>
      <input id="pcate" class="form-control" type="text" name="pcate">
    </div>

    <div class="form-group">
      <label for="psub">Sub-Categories</label>
      <input id="psub" class="form-control" type="text" name="psub">
    </div> -->

    <!-- <input type="hidden" name="" id="" value="today's date"> -->

    <!-- connect w category table -->
















    <!-- <input type="hidden" name="" id="" value="Edited date"> -->

    <div class="row">
      <div class="form-group  col-6">
        <label for="pimg">Product image</label>
        <input id="pimg" class="form-control" type="file" name="pimg">
      </div>

      <div class="form-group col-6">
        <label for="pprice">Price</label>
        <input id="pprice" class="form-control" type="text" name="pprice">
      </div>
    </div>

    <div class="form-group">
      <label for="about">About Product</label>
      <textarea class="form-control" name="about" id="about" cols="30" rows="10"></textarea>

    </div>



    <br />

    <div style="margin: 15px auto ;">
      <button class="btn btn-primary" type="submit" name="preg" id="preg">Register</button>
    </div>





  </form>

</div>




<?php
include("footer.php");


?>