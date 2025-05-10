<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=chevron_right" />
    <title>About Us - TrendNest</title>
    <link rel="stylesheet" href="../../Assets/css/style.css">
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
            <a href="Shopping/favorite.html"><img src="Assets/heart.png" alt="heart" style="width: 25px; height: 25px;"></a>
            <a href="users/userprofile.html"><img src="Assets/aazen4lhc.webp" alt="user" style="width: 25px; height: 25px;"></a>
            <a href="Shopping/ShoppingCart.html"><img src="Assets/cart.png" alt="cart" style="width: 25px; height: 25px;"></a>

            <?php
            if (isset($_SESSION['email'])) {
                echo '<span style="margin-right: 10px; font-weight: bold; font-size: 16px;">👋 مرحبًا</span>';
                echo '<input type="button" value="Logout" onclick="window.location.href=\'../../users/auth/logout.php\';" id="logout">';
            } else {
                echo '<input type="button" value="Login" onclick="window.location.href=\'../../users/auth/login.php\';" id="login">';
                echo '<input type="button" value="Register" onclick="window.location.href=\'../../users/auth/register.php\';" id="register">';
            }
            ?>
        </div>
    </nav>
</header>

    <section class="terms">
        <div class="container">
            <h1><b>Terms and Conditions</b></h1>

            <p>Welcome to Clothing Project! These terms and conditions outline the rules and regulations for the use of our website.</p>

            <h2><b>1. Acceptance of Terms</b></h2>
            <p>By accessing this website, you agree to comply with these terms and conditions. If you disagree with any part, you are prohibited from using this site.</p>

            <h2><b>2. Intellectual Property</b></h2>
            <p>All content, including text, images, and logos, are owned by Clothing Project and are protected by copyright laws.</p>

            <h2><b>3. User Responsibilities</b></h2>
            <p>Users must ensure that their use of the website complies with all applicable laws. Any misuse of the website or its content is strictly prohibited.</p>

            <h2><b>4. Limitation of Liability</b></h2>
            <p>Clothing Project is not liable for any damages that arise from the use or inability to use our website.</p>

            <h2><b>5. Privacy Policy</b></h2>
            <p>We are committed to protecting your privacy. Please review our Privacy Policy to understand our practices.</p>

            <h2><b>6. Amendments</b></h2>
            <p>We reserve the right to amend these terms and conditions at any time. It is your responsibility to review these terms periodically.</p>

            <h2><b>7. Governing Law</b></h2>
            <p>These terms are governed by the laws of Egypt. Any disputes will be resolved in the courts of Egypt.</p>

            <p>For further inquiries, please contact us at <a href="ibrahimrs1234@gmail.com">ibrahimrs1234@gmail.com</a>.</p>
        </div>
    </section>

    <footer>
        <div class="footer-sections">
            <div class="section">
                <h4>Customer Service</h4>
                <ul>
                    <li><a href="../Footer/TermsAndConditions.html">Terms and Conditions</a></li>
                    <li><a href="../Footer/PrivacyPolicy.html">Privacy Policy</a></li>
                    <li><a href="../Footer/Delivery and Returns.html">Delivery and Returns</a></li>
                    <li><a href="../Footer/Refund Policy.html">Refund Policy</a></li>
                </ul>
            </div>
            <div class="section">
                <h4>About</h4>
                <ul>
                    <li><a href="../Footer/about.html">About TrendNest</a></li>
                    <li><a href="#">How to Purchase</a></li>
                </ul>
            </div>
            <div class="section">
                <h4>Contact Us</h4>
                <ul>
                    <li><a href="../contact us/contactus.html">contact us</a></li>
                </ul>
            </div>          
            <div class="section">
                <h4>Keep in Touch</h4>
                <div class="social-links">
                    <div><a href="https://www.facebook.com/"><i class="fa fa-facebook"><img class="face" src="../../Assets/facebook-512.webp" alt="Facebook">Facebook</i></a></div>
                    <div><a href="https://www.instagram.com/"><i class="fa fa-instagram"><img class="insta" src="../../Assets/insta.png" alt="Instagram">Instagram</i></i></a></div>
                    <div><a href="https://www.tiktok.com/"><i class="fa fa-tiktok"><img class="TikTok" src="../../Assets/tik tok.24af4abe-62f8-404b-b1a9-ee8fe4d32d94" alt="TikTok">TikTok</i></i></a></div>
                    <div><a href="https://www.youtube.com/"><i class="fa fa-youtube"><i class="fa fa-youtube"><img class="YouTube" src="../../Assets/youtube.png" alt="YouTube">YouTube</i></i></a></div>
                </div>
            </div>
        </div>
        <div class="payment-methods">
            <p>Payment Accepted:</p>
            <img src="../../Assets/Visa_Inc._logo.svg.png" alt="Visa">
            <img src="../../Assets/MasterCard_Logo.svg.webp" alt="MasterCard">
            <img src="../../Assets/What-Is-Cash-on-Delivery.webp" alt="Cash on Delivery">
        </div>
            <p>Copyright © 2024. All Rights Reserved By <a href="../../index.html" id="end">TrendNest</a></p>

    </footer>
</body>
</html>
