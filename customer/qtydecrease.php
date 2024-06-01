<?php

include "authguard.php";

$userid = $_SESSION['userid'];
$pid = $_GET['pid'];
include "../shared/connection.php";

$sql_result = mysqli_query($conn, "select * from products where id = '$pid'");
$dbrow = mysqli_fetch_assoc($sql_result);

$query =  "UPDATE cart SET qty = qty - 1 WHERE pid = '$pid' ";
$mysqli_status = mysqli_query($conn, $query);

$query =  "UPDATE cart SET total_cost = $dbrow[price] * qty WHERE pid = '$pid' ";
$mysqli_status = mysqli_query($conn, $query);

if ($mysqli_status) {
    echo "Successfully decreased";
    header('location:viewcart.php');
} else {
    echo mysqli_error($conn);
}
