<?php
include("include/config.php");

$bye = $_GET["pass"];


$delete_querry = "UPDATE product SET status='0' WHERE product_id='$bye'";
mysqli_multi_query($db, $delete_querry);


header('location:productTable.php');
?>
<!--- --->