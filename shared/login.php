<?php

session_start();
$_SESSION['login_status'] = false;

$uname = $_POST['username'];
$upass = $_POST['password'];

$cipher = md5($upass);

// $conn = new mysqli("localhost", "root", "", "ecommerce", 3307);
include "connection.php";

$sql_result = mysqli_query($conn, "select * from users where username = '$uname'and password='$cipher'");

if (mysqli_num_rows($sql_result) > 0) {
    echo "login success";
    $dbrow = mysqli_fetch_assoc($sql_result);

    $_SESSION['login_status'] = true;
    $_SESSION['login_role'] = $dbrow['role'];
    $_SESSION['userid'] = $dbrow['id'];
    $_SESSION['username'] = $dbrow['username'];

    echo "<br>";
    print_r($dbrow);
    // print_r($_SESSION);
    // die;

    if ($dbrow['role'] == 'Vendor') {
        header("location:../vendor/home.php");
    } else if ($dbrow['role'] == 'Customer') {
        header("location:../customer/home.php   ");
    }
} else {
    echo "Invalid credentials";
}
