<?php

$conn = new mysqli("localhost", "root", "", "ecommerce", 3307);


// $sql = "
// -- Table: cart
// CREATE TABLE IF NOT EXISTS `cart` (
//     `cartid` int(11) NOT NULL AUTO_INCREMENT,
//     `userid` int(11) NOT NULL,
//     `pid` int(11) NOT NULL,
//     `qty` int(11) NOT NULL DEFAULT 1,
//     `total_cost` int(11) NOT NULL,
//     `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
//     `status` int(11) NOT NULL DEFAULT 1,
//     PRIMARY KEY (`cartid`)
// );

// -- Table: order
// CREATE TABLE IF NOT EXISTS `orders` (
//     `order_id` int(11) NOT NULL AUTO_INCREMENT,
//     `c_id` int(11) NOT NULL,
//     `t_amount` int(11) NOT NULL,
//     `address` varchar(200) NOT NULL,
//     `invoice_no` int(20) NOT NULL,
//     `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
//     `order_status` text NOT NULL DEFAULT 'pending',
//     PRIMARY KEY (`order_id`)
// );

// -- Table: order_details
// CREATE TABLE IF NOT EXISTS `order_details` (
//     `detail_id` int(11) NOT NULL AUTO_INCREMENT,
//     `order_id` int(11) NOT NULL,
//     `invoice_no` int(20) NOT NULL,
//     `p_name` varchar(20) NOT NULL,
//     `qty` int(11) NOT NULL,
//     `p_price` int(11) NOT NULL,
//     `p_detail` text NOT NULL,
//     `owner` int(11) NOT NULL,
//     PRIMARY KEY (`detail_id`)
// );

// -- Table: products
// CREATE TABLE IF NOT EXISTS `products` (
//     `id` int(20) NOT NULL AUTO_INCREMENT,
//     `name` varchar(200) NOT NULL,
//     `price` float NOT NULL,
//     `stock` int(11) NOT NULL,
//     `detail` text NOT NULL,
//     `imgpath` varchar(200) NOT NULL,
//     `category` text NOT NULL,
//     `owner` int(6) NOT NULL,
//     `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
//     PRIMARY KEY (`id`)
// );

// -- Table: reviews
// CREATE TABLE IF NOT EXISTS `reviews` (
//     `id` int(11) NOT NULL AUTO_INCREMENT,
//     `product_id` int(11) DEFAULT NULL,
//     `user_id` int(11) DEFAULT NULL,
//     `rating` int(11) DEFAULT NULL,
//     `comment` text DEFAULT NULL,
//     `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
//     PRIMARY KEY (`id`),
//     KEY `product_id` (`product_id`),
//     KEY `user_id` (`user_id`)
// );

// -- Table: users
// CREATE TABLE IF NOT EXISTS `users` (
//     `id` int(20) NOT NULL AUTO_INCREMENT,
//     `username` varchar(200) NOT NULL,
//     `name` varchar(200) NOT NULL,
//     `password` varchar(200) NOT NULL,
//     `PhoneNo` varchar(10) NOT NULL,
//     `address` text NOT NULL,
//     `email` varchar(200) NOT NULL,
//     `role` varchar(20) NOT NULL,
//     `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
//     PRIMARY KEY (`id`),
//     UNIQUE KEY `username` (`username`)
// );
// ";

// // Execute the SQL queries
// if ($conn->multi_query($sql) === TRUE) {
//     echo "Tables created successfully";
// } else {
//     echo "Error creating tables: " . $conn->error;
// }
