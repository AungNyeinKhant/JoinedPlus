<?php
include("include/config.php");

$bye = $_GET["pass"];
// echo "$bye";
// die();

$delete_querry = "UPDATE customer SET status='0' WHERE user_id='$bye'";
mysqli_multi_query($db, $delete_querry);


header('location:customerTable.php');
?>
<!--- --->