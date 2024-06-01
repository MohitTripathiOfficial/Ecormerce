<?php

include "authguard.php";

$userid = $_SESSION['userid'];
$pid = $_GET['pid'];
include "../shared/connection.php";


$query = "delete from products where id=$pid";

$mysqli_status = mysqli_query($conn, $query);

if ($mysqli_status) {
    echo "Successfully removed from cart";
    header("location:view.php");
} else {
    echo mysqli_error($conn);
}
