<?php

session_start();


$db = mysqli_connect("localhost", "root", "", "joishop");

if (isset($_POST['login'])) {
  $username = $_POST['adname'];
  $password = md5($_POST['adpassword']);
  //echo $username;
  //echo $password;
  $query = "SELECT * FROM admin ";
  $adresult = mysqli_query($db, $query);
  $adanswer = mysqli_fetch_array($adresult);
  $adminuser = $adanswer['username'];
  $adminpw = $adanswer['password'];

  if ($username == $adminuser && $password == $adminpw) {
    header("location: main.php");
    $_SESSION['adlogin'] = "go";
  } else {
    echo "<script> alert('Incorrect try again')</script>";
  }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Joined+ Jointed Admin Dashboard</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body style="background-image: url('newimgs/formImg.jpg');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;">
  <div class="container">

    <div style="background-color: #e6fc81; color: black; padding: 3%; border-radius: 13px; margin: 100px auto;" class="col-md-6">
      <h1 style="text-align: center; color: #7c0a02;">Admin Dashboard Login</h1>
      <form method="POST">
        <div class="form-group">
          <label for="adname">Username</label>
          <input type="text" class="form-control" name="adname" id="adname" aria-describedby="emailHelp">

        </div>
        <div class="form-group">
          <label for="adpassword">Password</label>
          <input type="password" name="adpassword" class="form-control" id="adpassword">
        </div>
        <small id="emailHelp" class="form-text text-muted">Do not share your password with others.</small>
        <br />

        <button style="background-color: #5B7C99; border-color:#5B7C99; color: white;" type="submit" name="login" class="btn ">Login</button>
        <div style="text-align:right;">
          <a style="color:#3B85F1; text-decoration:underline;" href="../index.php">Go Back to Website</a>
        </div>
      </form>
    </div>

  </div>
</body>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>