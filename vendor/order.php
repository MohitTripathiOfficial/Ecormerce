<?php

include "authguard.php";

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
// $pid = $_GET['pid'];
// $t_amount = $_GET['t_amount'];

include "../shared/connection.php";

$query = "select * from cart where userid=$userid";
// $mysqli_status = mysqli_query($conn, $query);
$sql_result = mysqli_query($conn, $query);

$t_amount = 0;
while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    $t_amount = $t_amount + $dbrow['total_cost'];
    // print_r($dbrow['pid']);
}
print_r($t_amount);


// die;
$invoice_no = mt_rand();

if ($sql_result) {

    $query = "insert into `order`(c_id,invoice_no,address,t_amount) 
        values('$userid',$invoice_no,'',$t_amount)";

    $mysqli_status = mysqli_query($conn, $query);
    echo "Order Placed Successfully";
    header("Location: orderdetails.php?invoice_no=$invoice_no");
} else {
    echo mysqli_error($conn);
}
