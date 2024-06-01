<?php

include "authguard.php";
$id = $_SESSION['userid'];
$productid = $_GET['pid'];
// echo "$productid";

// $img_name = $_FILES['pdtimg']['name'];
// $img_path = $_FILES['pdtimg']['tmp_name'];

// $target = "../shared/images/$img_name";

// move_uploaded_file($img_path, $target);

include "../shared/connection.php";

$sql_status = mysqli_query($conn, "UPDATE products SET 
    name='$_POST[name]', 
    price='$_POST[price]', 
    detail='$_POST[detail]',
    owner='$id' 
    WHERE id='$productid'");

if ($sql_status) {
    echo "Product Updated Successfully";
    header("location:view.php");
} else {
    echo mysqli_error($conn);
}
