<?php

$upass = $_POST['password1'];

$cipher = md5($upass);

// $conn = new mysqli("localhost", "root", "", "ecommerce", 3307);
include "connection.php";


$query = "insert into users(username,password,email,role) 
          values('$_POST[username]','$cipher','$_POST[email]','$_POST[role]')";
// echo $query;

$mysqli_status = mysqli_query($conn, $query);
if ($mysqli_status) {
    header("location:../shared/login.html");
} else {
    echo mysqli_error($conn);
}
