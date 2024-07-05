<?php
include("include/config.php");

$bye = $_GET["transfer"];
$type = $_GET["type"];
//echo "$bye";
//echo "$type";
// die();



if ($type === "Paid") {
    $edit_querry = "UPDATE realorder SET payments='C.O.D' WHERE order_id='$bye'";
} else if ($type === "C.O.D") {
    $edit_querry = "UPDATE realorder SET payments='Paid' WHERE order_id='$bye'";
}



mysqli_multi_query($db, $edit_querry);


header('location:orderTable.php');
?>
<!--- --->