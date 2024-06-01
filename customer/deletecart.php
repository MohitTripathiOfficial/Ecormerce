<?php

include "authguard.php";

$userid = $_SESSION['userid'];
$cartid = $_GET['cartid'];
include "../shared/connection.php";


$query = "delete from cart where cartid=$cartid";

$mysqli_status = mysqli_query($conn, $query);

if ($mysqli_status) {
    echo "Successfully removed from cart";
    header('location:viewcart.php');
} else {
    echo mysqli_error($conn);
}
