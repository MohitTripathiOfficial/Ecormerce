

<?php

include "authguard.php";

$userid = $_SESSION['userid'];
$pid = $_GET['pid'];

include "../shared/connection.php";



// if ($dbrow['stock'] <= 0) {

$sql_result = mysqli_query($conn, "select * from products where id = '$pid'");
$dbrow = mysqli_fetch_assoc($sql_result);
if ($dbrow['stock'] > 0) {

    $mysqli_status = mysqli_query($conn, "select * from cart where pid = '$pid'");

    if (mysqli_fetch_assoc($mysqli_status) > 0) {

        $sql_result_query = mysqli_query($conn, "select * from products join cart where id = '$pid'");
        $dbrow2 = mysqli_fetch_assoc($sql_result_query);
        if ($dbrow2['qty'] < $dbrow2['stock']) {

            $query =  "UPDATE cart SET qty = qty + 1 WHERE pid = '$pid' ";
            $mysqli_status = mysqli_query($conn, $query);
            if ($mysqli_status) {
                echo "Successfully added to cart";
                header('location:viewcart.php');
            }
        } else {
            header('location:viewcart.php');
        }
    } else {

        $query = "insert into cart(userid,pid,total_cost) 
    values('$userid','$pid','$dbrow[price]')";

        $mysqli_status = mysqli_query($conn, $query);

        if ($mysqli_status) {
            echo "Successfully added to cart";
            header('location:viewcart.php');
        } else {
            echo mysqli_error($conn);
        }
    }
} else {
    header('location:viewcart.php');
}
