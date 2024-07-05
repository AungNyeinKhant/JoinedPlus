<?php
include("include/config.php");

$bye = $_GET["pass"];
// echo "$bye";
// die();

$delete_querry = "UPDATE realorder SET status='0' WHERE order_id='$bye'";
mysqli_multi_query($db, $delete_querry);


header('location:orderTable.php');
?>
<!--- --->