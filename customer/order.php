<?php

include "authguard.php";

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

include "../shared/connection.php";

$query = "select * from cart where userid=$userid";
$sql_result = mysqli_query($conn, $query);

$t_amount = 0;
while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    $t_amount = $t_amount + $dbrow['total_cost'];
}
print_r($t_amount);
$invoice_no = mt_rand();

if ($sql_result) {

    $query = "insert into `order`(c_id,invoice_no,address,t_amount) 
        values('$userid',$invoice_no,'',$t_amount)";

    $mysqli_status = mysqli_query($conn, $query);
    if ($mysqli_status) {
        header("Location: orderdetails.php?invoice_no=$invoice_no");
        exit();
    } else {
        echo "Error placing order: " . mysqli_error($conn);
    }
    // echo "Order Placed Successfully";
    // header("Location: orderdetails.php?invoice_no=$invoice_no");
} else {
    echo mysqli_error($conn);
}
