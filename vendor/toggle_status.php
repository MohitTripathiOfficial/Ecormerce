<?php
include "../shared/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $detailid = $_POST['detailid'];

    $sql = "SELECT order_status FROM order_details WHERE detail_id = $detailid";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_status = $row['order_status'];

        $new_status = ($current_status === "delivered") ? "pending" : "delivered";
        $update_sql = "UPDATE order_details SET order_status = '$new_status' WHERE detail_id = $detailid";

        if (mysqli_query($conn, $update_sql)) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
}
