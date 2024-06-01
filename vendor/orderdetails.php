<?php

include "authguard.php";

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$invoice_no = $_GET['invoice_no'];
include "../shared/connection.php";

// print_r($invoice_no);

$query = "SELECT *
FROM cart
JOIN `order` on invoice_no=$invoice_no
JOIN products on cart.pid=products.id";

$mysqli_result = mysqli_query($conn, $query);
if ($mysqli_result) {
    while ($dbrow = mysqli_fetch_assoc($mysqli_result)) {
        $query = "insert into order_details(order_id,invoice_no,p_name,p_price,p_detail,owner) 
        values('$dbrow[order_id]',$dbrow[invoice_no],'$dbrow[name]','$dbrow[total_cost]','$dbrow[detail]','$dbrow[owner]')";

        $mysqli_status = mysqli_query($conn, $query);
    }
    $mysqli_status = mysqli_query($conn, "delete from cart");
} else {
    echo mysqli_error($conn);
}
$query = "SELECT * FROM order_details WHERE invoice_no = '$invoice_no'";
$mysqli_result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Order Details</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Detail ID</th>
                    <th>Order ID</th>
                    <th>Invoice No</th>
                    <th>Product Info</th>
                    <th>Amount</th>
                    <th>Details</th>
                    <th>Owner</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($mysqli_result) {
                    while ($dbrow = mysqli_fetch_assoc($mysqli_result)) {
                        $detailid = htmlspecialchars($dbrow['detail_id']);
                        $orderid = htmlspecialchars($dbrow['order_id']);
                        $invoice_no = htmlspecialchars($dbrow['invoice_no']);
                        $pdt_info = htmlspecialchars($dbrow['p_name']);
                        $amount = htmlspecialchars($dbrow['p_price']);
                        $details = htmlspecialchars($dbrow['p_details']);
                        $owner = htmlspecialchars($dbrow['owner']);

                        echo "<tr>
                <td>$detailid</td>
                        <td>$orderid</td>
                        <td>$invoice_no</td>
                        <td>$pdt_info</td>
                        <td>$amount</td>
                        <td>$details</td>
                        <td>$owner</td>
                      </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No order details found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYk5ZY2S3uH/Jnk0dSAa2ua6rI6M1oW5Ll7jE6B7nuLMwNLD69Npy4HI+" crossorigin="anonymous"></script>
</body>

</html>