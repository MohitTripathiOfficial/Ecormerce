<?php
include "authguard.php";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYk5ZY2S3uH/Jnk0dSAa2ua6rI6M1oW5Ll7jE6B7nuLMwNLD69Npy4HI+" crossorigin="anonymous"></script>

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
                    <th>Order_Status</th>
                    <th>Update_status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $userid = $_SESSION['userid'];
                include "../shared/connection.php";

                $query = "SELECT * 
                FROM order_details 
                LEFT JOIN `order` ON order_details.order_id = `order`.order_id
                where owner =$userid";
                $mysqli_result = mysqli_query($conn, $query);
                if ($mysqli_result) {
                    while ($dbrow = mysqli_fetch_assoc($mysqli_result)) {
                        $detailid = $dbrow['detail_id'];
                        $orderid = $dbrow['order_id'];
                        $invoice_no = $dbrow['invoice_no'];
                        $p_name = $dbrow['p_name'];
                        $amount = $dbrow['p_price'];
                        $order_status = $dbrow['order_status'];
                        $status = ($order_status == 'delivered') ? 'pending' : 'delivered';

                        echo "<tr>
                            <td>$detailid</td>
                            <td>$orderid</td>
                            <td>$invoice_no</td>
                            <td>$p_name</td>
                            <td>$amount</td>
                            <td>$order_status</td>                        
                            <td><button onclick='toggleStatus($detailid)'>$status</button></td>                        
                          </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No order details found</td></tr>";
                }

                function toggleStatus($detailid)
                {
                    include "../shared/connection.php";
                    $sql = "SELECT order_status FROM order_details WHERE detailid = $detailid ";

                    $mysqli_result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $current_status = $row['order_status'];

                        $new_status = ($current_status === "Delivered") ? "Pending" : "Delivered";
                        $sql = "UPDATE order_details SET order_status = '$new_status' WHERE detailid = $detailid";
                        $mysqli_result = mysqli_query($conn, $sql);
                        header('location:allorders.php');
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    include "../shared/footer.php"; ?>
</body>

</html>