<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=chevron_right" />
    <title>TrendNest</title>
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

    <section class="returns">
        <div class="container">
            <h2>How to Return or Exchange</h2>
            <dl> <!-- فائمة وصف-->
                <dt>The items must be in their original condition.</dt> <!--المصطلح أو العنوان الرئيسي في القائمة الوصفية-->
                <dd>The items should be in the same condition as received.</dd> <!--description data الوصف نفسه-->
    
                <dt>Shipping Costs for Returns</dt>
                <dd>
                    <ul>
                        <li>The customer bears the shipping costs if there is no defect in the item.</li>
                        <li>The company bears the shipping costs in case of a defect in the item if it is the only item in the order.</li>
                        <li>For returns through the branch, the customer does not bear any shipping costs.</li>
                    </ul>
                </dd>
    
                <dt>Return Process</dt>
                <dd>
                    Returns are made through a representative. Once the item arrives and is inspected, the refund is processed within 5-7 days using the original payment method.
                </dd>
    
                <dt>Premium and Value Returns</dt>
                <dd>
                    <ul>
                        <li>Returns or exchanges cannot be made through branches; they are handled by a representative.</li>
                        <li>No partial returns are allowed; instead, a purchase voucher is issued for the returned amount.</li>
                        <li>The customer bears the shipping costs if there is no defect in the product.</li>
                    </ul>
                </dd>
    
                <dt>Non-Returnable Products</dt>
                <dd>
                    <ul>
                        <li>Products that have been ironed, washed, damaged, or are not in their original condition.</li>
                        <li>Underwear, swimwear, caps, scarves, watches, accessories, wallets, perfumes, and socks.</li>
                    </ul>
                </dd>
    
                <dt>Returns During Offers</dt>
                <dd>
                    Returns during offers must be for the entire order, and the amount paid will be refunded without shipping costs.
                </dd>
            </dl>
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
