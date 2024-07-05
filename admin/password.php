<?php
include("include/config.php");

$query = "SELECT * FROM admin ";
$adresult = mysqli_query($db, $query);
$adanswer = mysqli_fetch_array($adresult);

if (isset($_POST['login'])) {
    $uname =    $_POST['uname'];
    $confirmPw = md5($_POST['adname']);
    $oldPassword = md5($_POST['adpassword']);
    $newPassword = md5($_POST['newpassword']);
    //echo $username;
    //echo $password;

    $adminpw = $adanswer['password'];

    if ($oldPassword == $adminpw && $newPassword == $confirmPw) {
        $updateQuery = "UPDATE admin SET password = '$newPassword',username='$uname'; ";
        mysqli_multi_query($db, $updateQuery);

        echo "<script> alert('Password Uploaded')</script>";
    } else {
        echo "<script> alert('Incorrect try again')</script>";
    }
}


include("header.php");

?>

<div class="container-fluid pt-4 px-4">
    <h1 style="text-align: center; color: #7c0a02;">Admin Password Control</h1>
    <form method="POST">

        <div class="form-group">
            <label for="uname">Username</label>
            <input type="text" name="uname" value="<?php echo $adanswer['username']; ?> " class="form-control" id="uname">
        </div>

        <div class="form-group">
            <label for="adpassword">Old Password</label>
            <input type="password" name="adpassword" class="form-control" id="adpassword" required>
        </div>

        <div class="form-group">
            <label for="newpassword">New Password</label>
            <input type="text" name="newpassword" class="form-control" id="newpassword" required>
        </div>

        <div class="form-group">
            <label for="adname">Confirm Password</label>
            <input type="text" class="form-control" name="adname" id="adname" aria-describedby="emailHelp">

        </div>






        <button type="submit" name="login" class="btn btn-primary">Confirm</button>
    </form>
</div>


<?php

include("footer.php");

?>