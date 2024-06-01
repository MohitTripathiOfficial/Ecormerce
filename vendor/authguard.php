<?php
session_start();
if ($_SESSION['login_status'] === false) {
    echo "unauthorized access";
    exit();
}
if ($_SESSION['login_role'] != 'Vendor') {
    echo "unauthorized access";
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>E_Commerce_Website</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f8f9fa;
            padding: 10px 20px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 24px;
            text-decoration: none;
            color: black;
        }

        .navbar-brand img {
            width: 24px;
            height: 24px;
        }

        .navbar-menu {
            display: flex;
            gap: 15px;
        }

        .navbar-menu a {
            text-decoration: none;
            color: black;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar-menu a:hover {
            background-color: #e2e6ea;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar-right a {
            text-decoration: none;
            color: black;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .navbar-right img {
            width: 25px;
            height: 25px;
        }

        .navbar-right .logout img {
            width: 45px;
            height: 35px;
        }

        .search-form {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-form input {
            padding: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-right: 10px;
        }

        .search-form button {
            padding: 5px 10px;
            border: 1px solid #ced4da;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a class="navbar-brand" href="view.php">
            <img src="../shared/public/logo.png" alt="Logo">
            <span>Ecommerce</span>
        </a>
        <div class="navbar-menu">
            <a href="view.php">Homepage</a>
            <a href="home.php">Add Products</a>
            <a href="allorders.php">All Orders</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </div>
        <div class="navbar-right">
            <!-- <form class="search-form" role="search">
                <input type="search" placeholder="Search" aria-label="Search">
                <button type="submit">Search</button>
            </form> -->
            <a href="#"><?php echo $_SESSION['userid']; ?></a>
            <a href="#"><?php echo $_SESSION['username']; ?></a>
            <a href=""><?php echo $_SESSION['login_role']; ?></a>
            <a href="profile.php">
                <img src="../shared/public/profile.png" alt="Profile">
            </a>
            <a href="">
                <img src="../shared/public/notification.png" alt="Notifications">
            </a>
            <a class="logout" href="../shared/logout.php">
                <img src="../shared/public/logout.png" alt="Logout">
            </a>
        </div>
    </nav>
</body>

</html>