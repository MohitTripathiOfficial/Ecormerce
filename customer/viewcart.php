<?php
include "authguard.php";
include "../shared/connection.php";

$id = $_SESSION['userid'];

// Get user information
$user_result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($user_result);

// Get cart items
$sql_result = mysqli_query($conn, "SELECT * FROM cart JOIN products ON cart.pid = products.id WHERE userid=$_SESSION[userid]");
$totalamount = 0;
$totalCost = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>E_Commerce_Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .product-category {
            font-size: large;
            font-weight: bold;
            margin-left: 10px;
            margin-top: 20px;
        }

        .product-list-container {
            overflow-x: auto;
            padding-bottom: 10px;
            margin-top: 10px;
            white-space: nowrap;
        }

        .product-list-container::-webkit-scrollbar {
            display: none;
        }

        .product-list {
            display: inline-flex;
            gap: 30px;
            margin: 20px;
        }

        .product-card {
            display: flex;
            flex-direction: column;
            gap: 8px;
            width: 200px;
            flex: 0 0 auto;
        }

        .product-image {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
            border-radius: 8px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.5s ease;
        }

        .product-info {
            display: flex;
            justify-content: space-between;
            margin-left: 10px;
        }

        .product-category {
            display: flex;
            margin-left: 10px;
            justify-content: space-around;
        }

        .product-description {
            margin-left: 10px;
        }

        .edit-delete {
            display: flex;
            justify-content: space-around;
        }

        .product-order-button {
            background-color: lightgray;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 16px;
            cursor: pointer;
            text-align: center;
        }

        .product-order-button:hover {
            background-color: darkgray;
        }

        .product-add-to-cart {
            background-color: #f35c7a;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 16px;
            cursor: pointer;
            text-align: center;
        }

        .product-add-to-cart:hover {
            background-color: #d44b67;
        }
    </style>
</head>

<body>
    <div class='product-list-container'>
        <div class='product-list'>
            <?php
            while ($dbrow = mysqli_fetch_assoc($sql_result)) {
                $totalCost = $dbrow['price'] * $dbrow['qty'];
                $totalamount += $totalCost;
            ?>

                <div class='product-card'>
                    <div class='product-image'>
                        <a href='singlepage.php?pid=<?php echo $dbrow['id']; ?>'>
                            <img src='<?php echo $dbrow['imgpath']; ?>' alt=''>
                        </a>
                    </div>
                    <div class='product-info'>
                        <span class='product-name'><?php echo $dbrow['name']; ?></span>
                        <span class='product-price'>Rs <?php echo $dbrow['price']; ?></span>
                    </div>
                    <div class='product-info'>
                        <span class='product-name'><?php echo $dbrow['qty']; ?></span>
                        <span class='product-price'>Rs <?php echo $totalCost; ?></span>
                    </div>

                    <div class="product-category">
                        <?php if ($dbrow['qty'] == 1 || $dbrow['stock'] == 1) { ?>
                            <div class='name'></div>
                        <?php } else { ?>
                            <div class='d-flex justify-content-evenly mt-1'>
                                <a href='qtydecrease.php?pid=<?php echo $dbrow['pid']; ?>'>
                                    <button class='product-add-to-cart'>-</button>
                                </a>
                            </div>
                        <?php
                        } ?>

                        <?php if ($dbrow['qty'] < $dbrow['stock']) { ?>
                            <div class='d-flex justify-content-evenly mt-1'>
                                <a href='qtyincrease.php?pid=<?php echo $dbrow['pid']; ?>'>
                                    <button class='product-add-to-cart'>+</button>
                                </a>
                            </div>
                        <?php } elseif ($dbrow['qty'] >= $dbrow['stock']) { ?>
                            <div class=''></div>
                        <?php } ?>

                    </div>

                    <div class='d-flex justify-content-evenly mt-1'>
                        <a href='deletecart.php?cartid=<?php echo $dbrow['cartid']; ?>'>
                            <button class='product-add-to-cart'>Remove</button>
                        </a>
                    </div>

                </div>

            <?php
            }
            ?>
        </div>
    </div>

    <?php
    if (empty($user['address'])) {
        echo "<div class='text-center text-danger mt-4'>Please update your address before placing order!!</div>";
    }
    ?>

    <div class='d-flex justify-content-center mt-4'>
        <?php if (!empty($user['address'])) { ?>
            <a href='order.php'>
                <button class='product-order-button'>Place Order</button>
            </a>
        <?php } ?>
    </div>
    <?php
    include "../shared/footer.php";
    ?>
</body>

</html>