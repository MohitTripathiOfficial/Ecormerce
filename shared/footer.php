<?php
// footer.php
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .footer {
            padding: 24px 16px;
            background-color: #f8f9fa;
            color: #000;
            margin-top: 24px;
            font-size: 14px;
        }

        .footer-top {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .footer-left,
        .footer-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .footer-left a.brand {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #000;
        }

        .footer-left .social-icons img {
            margin-right: 10px;
        }

        .footer-center {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .footer-column {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .footer-links a {
            text-decoration: none;
            color: #000;
            transition: color 0.3s;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .footer-links a:hover {
            color: #007bff;
        }

        .footer-right .subscribe-form {
            display: flex;
            gap: 10px;
        }

        .subscribe-input {
            padding: 8px;
            width: 75%;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .subscribe-button {
            width: 25%;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .subscribe-button:hover {
            background-color: #0056b3;
        }

        .payment-icons img {
            margin-right: 10px;
        }

        .footer-bottom {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 32px;
            align-items: center;
            justify-content: space-between;
        }

        .footer-bottom-right {
            display: flex;
            gap: 24px;
            flex-direction: column;
        }

        .footer-bottom-right>div {
            display: flex;
            gap: 8px;
        }

        .text-gray-500 {
            color: #6c757d;
        }

        .font-medium {
            font-weight: 500;
        }

        .font-semibold {
            font-weight: bold;
        }

        @media (min-width: 768px) {
            .footer-top {
                flex-direction: row;
                justify-content: space-between;
            }

            .footer-center {
                flex-direction: row;
                justify-content: space-between;
                flex: 2;
            }

            .footer-bottom-right {
                flex-direction: row;
            }
        }
    </style>
</head>

<body>
    <div class="footer">
        <!-- TOP -->
        <div class="footer-top">
            <!-- LEFT -->
            <div class="footer-left">
                <a href="/" class="brand">ECOM</a>
                <p>73/554, Central Plaza, Jhalwa, Uttar Pradesh, 211001, India</p>
                <span class="font-semibold">mohittripathiofficial@gmail.com</span>
                <span class="font-semibold">+91 7505277616</span>
                <div class="social-icons">
                    <img src="../shared/public/facebook.png" alt="Facebook" width="16" height="16">
                    <img src="../shared/public/instagram.png" alt="Instagram" width="16" height="16">
                    <img src="../shared/public/youtube.png" alt="YouTube" width="16" height="16">
                    <img src="../shared/public/pinterest.png" alt="Pinterest" width="16" height="16">
                    <img src="../shared/public/x.png" alt="X" width="16" height="16">
                </div>
            </div>
            <!-- CENTER -->
            <div class="footer-center">
                <div class="footer-column">
                    <h4 class="font-medium">COMPANY</h4>
                    <div class="footer-links">
                        <a href="#">About Us</a>
                        <a href="#">Careers</a>
                        <a href="#">Affiliates</a>
                        <a href="#">Blog</a>
                        <a href="#">Contact Us</a>
                    </div>
                </div>
                <div class="footer-column">
                    <h4 class="font-medium">SHOP</h4>
                    <div class="footer-links">
                        <a href="#">New Arrivals</a>
                        <a href="#">Accessories</a>
                        <a href="#">Men</a>
                        <a href="#">Women</a>
                        <a href="#">All Products</a>
                    </div>
                </div>
                <div class="footer-column">
                    <h4 class="font-medium">HELP</h4>
                    <div class="footer-links">
                        <a href="#">Customer Service</a>
                        <a href="#">My Account</a>
                        <a href="#">Find a Store</a>
                        <a href="#">Legal & Privacy</a>
                        <a href="#">Gift Card</a>
                    </div>
                </div>
            </div>
            <!-- RIGHT -->
            <div class="footer-right">
                <h4 class="font-medium">SUBSCRIBE</h4>
                <p>Be the first to get the latest news about trends, promotions, and much more!</p>
                <div class="subscribe-form">
                    <input type="text" placeholder="Email address" class="subscribe-input">
                    <button class="subscribe-button">JOIN</button>
                </div>
                <span class="font-semibold">Secure Payments</span>
                <div class="payment-icons">
                    <img src="../shared/public/discover.png" alt="Discover" width="40" height="20">
                    <img src="../shared/public/skrill.png" alt="Skrill" width="40" height="20">
                    <img src="../shared/public/paypal.png" alt="PayPal" width="40" height="20">
                    <img src="../shared/public/mastercard.png" alt="MasterCard" width="40" height="20">
                    <img src="../shared/public/visa.png" alt="Visa" width="40" height="20">
                </div>
            </div>
        </div>
        <!-- BOTTOM -->
        <div class="footer-bottom">
            <div>© 2024 MOHIT Shop</div>
            <div class="footer-bottom-right">
                <div>
                    <span class="text-gray-500">Language</span>
                    <span class="font-medium">India | English</span>
                </div>
                <div>
                    <span class="text-gray-500">Currency</span>
                    <span class="font-medium">Rs INR</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>