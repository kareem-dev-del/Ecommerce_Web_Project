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

    <section class="refund-policy">
        <div class="container">
            <h1>Refund Policy</h1>
            <dl>
                <dt>How to make a return or exchange:</dt>
                <dd>
                    <ul>
                        <li>The items must be in their original condition in the same condition as received.</li>
                        <li>The customer bears the shipping costs if the return is made by the representative in the absence of a defect.</li>
                        <li>Town Team Company bears the shipping costs in the event of a defect if it is the only piece in the order. It does not bear the shipping costs if there are other intact pieces in the return.</li>
                        <li>The customer does not bear shipping costs if the return is made through the branch, and the amount is received while in the branch.</li>
                        <li>The return is made by the representative. Upon arrival of the item to us, it is inspected and confirmed that it is in its original condition. The refund is processed within 5-7 days using the same payment method.</li>
                        <li>To make a return, the report is submitted via WhatsApp, and the customer is contacted before sending the representative or going to the branch.</li>
                    </ul>
                </dd>
    
                <dt>Returns in case of payment through installment companies:</dt>
                <dd>
                    <ul>
                        <li>Returns or exchanges cannot be made through branches; they are handled only through the representative.</li>
                        <li>There is no partial return from the original amount paid. A purchase voucher is issued for the value of the return, and the order is placed online only.</li>
                        <li>The customer bears the shipping costs if there is no defect or error in the products.</li>
                        <li>The return is made by sending the representative. After inspection of the items, the value of the order is refunded via a discount code, excluding shipping costs.</li>
                        <li>The return for orders paid through installment companies is processed within 14 days from the date the return is received, in case of non-receipt only.</li>
                        <li>Town Team Company bears the shipping costs in case of a defect or error in the products. A purchase voucher is sent for a new order, or the same item is resent if available.</li>
                    </ul>
                </dd>
    
                <dt>Non-returnable products:</dt>
                <dd>
                    <ul>
                        <li>Products that have been ironed, washed, damaged, or are not in their original condition, including shoes without original packaging.</li>
                        <li>Products from which the price tag or brand has been removed.</li>
                        <li>Underwear, swimwear, caps, scarves, watches, accessories, wallets, perfumes, and socks.</li>
                    </ul>
                </dd>
    
                <dt>Returns exceeding 14 days:</dt>
                <dd>Returns exceeding 14 days from the date of delivery will not be accepted.</dd>
    
                <dt>Returns during offers:</dt>
                <dd>
                    A return is made for the entire order, and the amount paid is refunded without shipping costs. For new purchases, the current offers apply.
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
                    <li><a href="../../contact us/contactus.html">contact us</a></li>
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
