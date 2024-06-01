<?php
include "authguard.php";
$id = $_SESSION['userid'];
// echo "$productid";

// $img_name = $_FILES['pdtimg']['name'];
// $img_path = $_FILES['pdtimg']['tmp_name'];

// $target = "../shared/images/$img_name";

// move_uploaded_file($img_path, $target);

include "../shared/connection.php";

$sql_status = mysqli_query($conn, "UPDATE users SET 
    name='$_POST[name]', 
    PhoneNo='$_POST[phoneno]', 
    email='$_POST[email]' ,
    address='$_POST[address]' 
    WHERE id='$id'");

if ($sql_status) {
    echo "User Updated Successfully";
    header("location:home.php");
} else {
    echo mysqli_error($conn);
}
