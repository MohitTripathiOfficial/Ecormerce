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
    <style>
        .order-details-header,
        .order-details-row {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }

        .order-details-header {
            font-weight: bold;
            background-color: #f8f9fa;
        }

        .order-details-column {
            flex: 1;
            text-align: center;
        }

        .order-details-button {
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYk5ZY2S3uH/Jnk0dSAa2ua6rI6M1oW5Ll7jE6B7nuLMwNLD69Npy4HI+" crossorigin="anonymous"></script>

    <div class="container mt-5">
        <h2 class="mb-4">Order Details</h2>

        <div class="order-details-header">
            <div class="order-details-column">Detail ID</div>
            <div class="order-details-column">Order ID</div>
            <div class="order-details-column">Invoice No</div>
            <div class="order-details-column">Product Info</div>
            <div class="order-details-column">Amount</div>
            <div class="order-details-column">Order Status</div>
            <div class="order-details-column">Update Status</div>
        </div>
        <?php
        $userid = $_SESSION['userid'];
        include "../shared/connection.php";

        $query = "SELECT * 
                  FROM order_details 
                  LEFT JOIN `order` ON order_details.order_id = `order`.order_id
                  WHERE owner = $userid";
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

                echo "<div class='order-details-row'>
                        <div class='order-details-column'>$detailid</div>
                        <div class='order-details-column'>$orderid</div>
                        <div class='order-details-column'>$invoice_no</div>
                        <div class='order-details-column'>$p_name</div>
                        <div class='order-details-column'>$amount</div>
                        <div class='order-details-column'>$order_status</div>
                        <div class='order-details-column'><button class='order-details-button' onclick='toggleStatus($detailid)'>$status</button></div>
                      </div>";
            }
        } else {
            echo "<div class='order-details-row'><div class='order-details-column' colspan='6'>No order details found</div></div>";
        }
        ?>
    </div>
    <?php include "../shared/footer.php"; ?>

    <script>
        function toggleStatus(detailid) {
            fetch('toggle_status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        'detailid': detailid
                    })
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        location.reload();
                    } else {
                        alert('Failed to update status');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>
