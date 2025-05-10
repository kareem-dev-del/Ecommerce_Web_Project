<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TrendNest</title>
    <link rel="stylesheet" href="Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <header>
        <div class="top-bar">
            <p>Free Shipping on orders over 999 EGP</p>
        </div>
        <nav class="navbar">
            <div class="logo"><a href="index.php" id="Style-Aura">TrendNest</a></div>
            <ul class="menu">
                <li><a href="product pages/men.php" class="nav-menu">Men</a></li>
                <li><a href="product pages/kids.php" class="nav-menu">Kids</a></li>
                <li><a href="product pages/new arrival.php" class="nav-menu">New Arrival</a></li>
            </ul>
            <div class="nav-icons">
                <a href="#"><img src="Assets/search icon.png" alt="search" style="width: 25px; height: 25px;"></a>
                <a href="Shopping/favorite.php"><img src="Assets/heart.png" alt="heart" style="width: 25px; height: 25px;"></a>
                <a href="users/userprofile.php"><img src="Assets/aazen4lhc.webp" alt="user" style="width: 25px; height: 25px;"></a>
                <a href="Shopping/ShoppingCart.php"><img src="Assets/cart.png" alt="cart" style="width: 25px; height: 25px;"></a>

                <?php
                if (isset($_SESSION['email'])) {
                    echo '<span style="margin-right: 10px; font-weight: bold; font-size: 16px;">👋 مرحبًا</span>';
                    echo '<input type="button" value="Logout" onclick="window.location.href=\'users/auth/logout.php\';" id="logout">';
                } else {
                    echo '<input type="button" value="Login" onclick="window.location.href=\'users/auth/login.php\';" id="login">';
                    echo '<input type="button" value="Register" onclick="window.location.href=\'users/auth/register.php\';" id="register">';
                }
                ?>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero-image"></div>
        </section>

        <section class="instagram-section">
            <h2>TrendNest CURRENT OFFERS</h2>
            <div class="instagram-gallery">
                <img src="Assets/pic1.png" alt="PIC 1">
                <img src="Assets/pic2.png" alt="PIC 2">
                <img src="Assets/pic3.png" alt="PIC 3">
                <img src="Assets/pic4.png" alt="PIC 4">
                <img src="Assets/pic5.png" alt="PIC 5">
            </div>
        </section>

        <section class="newsletter">
            <h3>Sign-Up for TrendNest Newsletter</h3>
            <p>Be the first to know about our newest arrivals, special offers, and store events near you.</p>
            <form>
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit">Submit</button>
            </form>
        </section>
    </main>

    <footer>
        <div class="footer-sections">
            <div class="section">
                <h4>Customer Service</h4>
                <ul>
                    <li><a href="about home page/Footer/TermsAndConditions.php">Terms and Conditions</a></li>
                    <li><a href="about home page/Footer/PrivacyPolicy.php">Privacy Policy</a></li>
                    <li><a href="about home page/Footer/Delivery and Returns.php">Delivery and Returns</a></li>
                    <li><a href="about home page/Footer/Refund Policy.php">Refund Policy</a></li>
                </ul>
            </div>
            <div class="section">
                <h4>About</h4>
                <ul>
                    <li><a href="about home page/Footer/about.php">About TrendNest</a></li>
                    <li><a href="#">How to Purchase</a></li>
                </ul>
            </div>
            <div class="section">
                <h4>Contact Us</h4>
                <ul>
                    <li><a href="contact us/contactus.php">contact us</a></li>
                </ul>
            </div>
            <div class="section">
                <h4>Keep in Touch</h4>
                <div class="social-links">
                    <div><a href="https://www.facebook.com/"><img class="face" src="Assets/facebook-512.webp" alt="Facebook">Facebook</a></div>
                    <div><a href="https://www.instagram.com/"><img class="insta" src="Assets/insta.png" alt="Instagram">Instagram</a></div>
                    <div><a href="https://www.tiktok.com/"><img class="TikTok" src="Assets/tik tok.24af4abe-62f8-404b-b1a9-ee8fe4d32d94" alt="TikTok">TikTok</a></div>
                    <div><a href="https://www.youtube.com/"><img class="YouTube" src="Assets/youtube.png" alt="YouTube">YouTube</a></div>
                </div>
            </div>
        </div>
        <div class="payment-methods">
            <p>Payment Accepted:</p>
            <img src="Assets/Visa_Inc._logo.svg.png" alt="Visa">
            <img src="Assets/MasterCard_Logo.svg.webp" alt="MasterCard">
            <img src="Assets/What-Is-Cash-on-Delivery.webp" alt="Cash on Delivery">
        </div>
        <p>Copyright © 2024. All Rights Reserved By <a href="index.php" id="end">TrendNest</a></p>
    </footer>

</body>

</html>