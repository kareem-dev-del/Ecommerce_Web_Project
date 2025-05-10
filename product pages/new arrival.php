<?php
include('../config/config.php');
$products = mysqli_query($con, "SELECT * FROM prod WHERE category_id = 'new arrival'");
session_start();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>منتجات رجالي</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <style>
        .products-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            padding: 40px;
            max-width: 1200px;
            margin: auto;
        }

        .product {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            background-color: #f9f9f9;
            transition: transform 0.3s ease;
        }

        .product:hover {
            transform: scale(1.03);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product h3 {
            margin: 10px 0 5px;
            font-size: 1.1em;
        }

        .product p {
            color: #555;
            font-weight: bold;
        }

        h2.page-title {
            text-align: center;
            margin-top: 40px;
            font-size: 2em;
            color: #333;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>
<body>

<header>
    <div class="top-bar">
        <p>Free Shipping on orders over 999 EGP</p>
    </div>
    <nav class="navbar">
        <div class="logo"><a href="index.php" id="Style-Aura">TrendNest</a></div>
        <ul class="menu">
            <li><a href="#" class="nav-menu">Men</a></li>
            <li><a href="kids.php" class="nav-menu">Kids</a></li>
            <li><a href="new arrival.php" class="nav-menu">New Arrival</a></li>
        </ul>
        <div class="nav-icons">
            <a href="#"><img src="../Assets/search icon.png" style="width: 25px;"></a>
            <a href="Shopping/favorite.php"><img src="../Assets/heart.png" style="width: 25px;"></a>
            <a href="users/userprofile.php"><img src="../Assets/aazen4lhc.webp" style="width: 25px;"></a>
            <a href="Shopping/ShoppingCart.php"><img src="../Assets/cart.png" style="width: 25px;"></a>

            <?php
            if (isset($_SESSION['email'])) {
                echo '<span style="margin-right: 10px; font-weight: bold; font-size: 16px;">👋 مرحبًا</span>';
                echo '<input type="button" value="Logout" onclick="window.location.href=\'../users/auth/logout.php\';" id="logout">';
            } else {
                echo '<input type="button" value="Login" onclick="window.location.href=\'../users/auth/login.php\';" id="login">';
                echo '<input type="button" value="Register" onclick="window.location.href=\'../users/auth/register.php\';" id="register">';
            }
            ?>
        </div>
    </nav>
</header>

<main>
    <h2 class="page-title">منتجات  حديثا</h2>
    <div class="products-container">
        <?php while ($product = mysqli_fetch_assoc($products)) : ?>
            <div class="product">
                <img src="../admin/<?php echo $product['image']; ?>" alt="صورة المنتج">
                <h3><?php echo $product['name']; ?></h3>
                <p>السعر: <?php echo $product['price']; ?></p>
                <div class="buttons">
                    <a href='../Shopping/add_to_cart.php' class='btn btn-primary btn-sm'>اضافة الى السلة</a>
                    <button class='btn btn-danger btn-sm' onclick="addToFavorites('<?php echo $product['id']; ?>', '<?php echo $product['name']; ?>', '<?php echo $product['price']; ?>', '../admin/<?php echo $product['image']; ?>')">اضافة الى المفضلة</button>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<footer>
    <!-- ... نفس كود الفوتر ... -->
</footer>

<script>
    function addToFavorites(id, name, price, img) {
        let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        if (!favorites.some(item => item.id === id)) {
            favorites.push({ id, name, price, img });
            localStorage.setItem('favorites', JSON.stringify(favorites));
            alert("تمت الإضافة إلى المفضلة!");
        } else {
            alert("المنتج موجود بالفعل في المفضلة.");
        }
    }
</script>

</body>
</html>
