<?php
$db = mysqli_connect("localhost", "root", "", "joishop");

$bye = $_GET["pass"];
// echo "$bye";
// die();

$delete_querry = "UPDATE order66 SET status='0' WHERE order_id='$bye'";
mysqli_multi_query($db, $delete_querry);


header('location:cart.php');
?>
<!--- --->