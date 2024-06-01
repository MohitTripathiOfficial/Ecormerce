<?php
include "authguard.php";

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$invoice_no = $_GET['invoice_no'];
include "../shared/connection.php";

// Fetch user information
$user_query = "SELECT * FROM users WHERE id='$userid'";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);

$query = "SELECT *
FROM cart
JOIN `order` on invoice_no=$invoice_no
JOIN products on cart.pid=products.id";

$mysqli_result = mysqli_query($conn, $query);
$order_details_q = [];

// $total_amount;
if ($mysqli_result) {
    while ($dbrow = mysqli_fetch_assoc($mysqli_result)) {
        $order_details_q[] = $dbrow;
        $total_amount = $dbrow['t_amount'];
    }

    // Insert order details into order_details table
    foreach ($order_details_q as $detail) {
        $insert_query = "INSERT INTO order_details(order_id, invoice_no, p_name,qty, p_price, p_detail, owner) 
                         VALUES('{$detail['order_id']}', '{$detail['invoice_no']}', '{$detail['name']}', '{$detail['qty']}', '{$detail['total_cost']}', '{$detail['detail']}', '{$detail['owner']}')";
        mysqli_query($conn, $insert_query);
    }
    // Clear the cart
    mysqli_query($conn, "DELETE FROM cart WHERE userid='$userid'");
} else {
    echo mysqli_error($conn);
}

// Fetch inserted order details for display
$query = "SELECT * FROM order_details  WHERE invoice_no = '$invoice_no'";
$mysqli_result_2 = mysqli_query($conn, $query);

$order_details = [];
if ($mysqli_result_2) {
    while ($dbrow = mysqli_fetch_assoc($mysqli_result_2)) {
        $order_details[] = $dbrow;
    }
} else {
    echo mysqli_error($conn);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .receipt-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .receipt-header img {
            height: 50px;
            margin-bottom: 10px;
        }

        .receipt-header h2 {
            margin: 0;
        }

        .receipt-table th,
        .receipt-table td {
            vertical-align: middle;
        }

        .total-amount {
            font-size: 1.5em;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container receipt-container my-5">
        <div class="receipt-header">
            <img src="../shared/public/logo.png" alt="Brand Logo">
            <h2>Order Receipt</h2>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <h5>Billing Information</h5>
                <p>
                    <?php echo htmlspecialchars($user['name']); ?><br>
                    <?php echo htmlspecialchars($user['address']); ?><br>
                    Email: <?php echo htmlspecialchars($user['email']); ?>
                </p>
            </div>
            <div class="col-md-6 text-end">
                <h5>Order Details</h5>
                <p>
                    Invoice Number: #<?php echo htmlspecialchars($invoice_no); ?><br>
                    Order Date: <?php echo date("Y-m-d"); ?><br>
                    Payment Method: Cash On Delivery
                </p>
            </div>
        </div>
        <table class="table receipt-table">
            <thead class="table-dark">
                <tr>
                    <th>Item</th>
                    <th class="text-end">Quantity</th>
                    <th class="text-end">Price</th>
                    <th class="text-end">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($order_details as $detail) {
                    echo "<tr>
                        <td>{$detail['p_name']}</td>
                        <td class='text-end'>{$detail['qty']}</td>
                        <td class='text-end'>Rs {$detail['p_price']}</td>
                        <td class='text-end'>Rs {$detail['p_price']}</td>
                      </tr>";
                }
                ?>
            </tbody>
            <?php
            $mysqli_result = mysqli_query($conn, "select t_amount from `order` where invoice_no='$invoice_no'");
            if ($mysqli_result) {
                while ($dbrow = mysqli_fetch_assoc($mysqli_result)) {

            ?>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Subtotal</th>
                            <td class="text-end">Rs <?php echo $dbrow['t_amount']; ?></td>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-end">Shipping</th>
                            <td class="text-end">Rs 50</td>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-end total-amount">Total Amount</th>
                            <td class="text-end total-amount">Rs <?php echo $dbrow['t_amount'] + 50; ?></td>
                        </tr>
                    </tfoot>
            <?php
                }
            } ?>
        </table>
        <div class="text-center mt-4">
            <a href="home.php" class="btn btn-primary">Continue Shopping</a>
            <a href="allorders.php" class="btn btn-secondary"> All Orders</a>
        </div>
    </div>
    <?php
    include "../shared/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>