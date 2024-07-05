<?php
include("include/config.php");

$bye = $_GET["pass"];
// echo "$bye";
// die();

$delete_querry = "UPDATE seller SET status='0' WHERE seller_id='$bye'";
mysqli_multi_query($db, $delete_querry);


header('location:sellerTable.php');
?>
<!--- --->