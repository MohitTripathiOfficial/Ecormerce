<?php
include "../shared/connection.php";

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $sql = "SELECT * FROM products WHERE name LIKE '%$query%' LIMIT 5";
    $result = mysqli_query($conn, $sql);

    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    echo json_encode($products);
}
