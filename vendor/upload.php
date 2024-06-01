<?php

include "authguard.php";
$id = $_SESSION['userid'];

$img_name = $_FILES['pdtimg']['name'];
$img_path = $_FILES['pdtimg']['tmp_name'];

$target = "../shared/images/$img_name";

move_uploaded_file($img_path, $target);

include "../shared/connection.php";

$sql_status = mysqli_query($conn, "insert into products(name,price,stock,detail,imgpath,category,owner) 
values('$_POST[name]','$_POST[price]','$_POST[stock]','$_POST[detail]','$target','$_POST[category]','$id' )");

if ($sql_status) {
    echo "Product Uploaded Successfully";
    header("location:view.php");
} else {
    echo mysqli_error($conn);
}
