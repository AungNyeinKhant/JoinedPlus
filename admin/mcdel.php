<?php
include("include/config.php");

$bye = $_GET["pass"];


$delete_querry = "UPDATE maincate SET status='0' WHERE cate_id='$bye'";
mysqli_multi_query($db, $delete_querry);


header('location:categoTable.php');
?>
<!--- --->