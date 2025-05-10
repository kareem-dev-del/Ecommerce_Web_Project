<?php
session_start();
include('../config/config.php');

// تحقق من تسجيل الدخول
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// استعلام لعرض محتويات السلة
$query = "SELECT cart.quantity, prod.*
          FROM cart
          INNER JOIN prod ON cart.product_id = prod.id
          WHERE cart.user_id = ?";

$stmt = $con->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cartItems = [];
$total = 0;
while ($row = $result->fetch_assoc()) {
    // تأكيد وجود السعر وتحويله إلى رقم
    $price = isset($row['price']) ? preg_replace('/[^0-9.]/', '', $row['price']) : 0;
    $price = (float)$price;

    // احتساب المجموع
    $subtotal = $price * $row['quantity'];
    $total += $subtotal;

    // إضافة الحقول إذا كانت غير موجودة
    if (!isset($row['description'])) {
        $row['description'] = '';
    }

    if (!isset($row['rating'])) {
        $row['rating'] = 0;
    }

    // تحديث السعر المحسوب النظيف ضمن العنصر
    $row['price'] = $price;

    // دمج البيانات مع المجموع الفرعي
    $cartItems[] = array_merge($row, ['subtotal' => $subtotal]);
}
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>سلة التسوق</title>
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ece9e6, #ffffff);
            color: #333;
            margin: 0;
            padding: 0;
            direction: rtl;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #212121;
            margin-bottom: 30px;
        }

        .cart-items {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 20px;
        }

        .cart-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }

        .cart-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .cart-item h2 {
            font-size: 1.4rem;
            margin: 10px 0;
        }

        .cart-item p {
            color: #555;
        }

        .cart-item .price {
            color: #ff9800;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .ratings i {
            color: #ffd700;
        }

        .remove-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #f44336;
            cursor: pointer;
        }

        .remove-btn:hover {
            color: #ff5722;
        }

        .total {
            text-align: center;
            margin-top: 20px;
            font-size: 1.6rem;
            font-weight: bold;
            padding: 15px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .action-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .action-buttons a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #212121;
            color: #fff;
            border-radius: 5px;
            margin: 0 10px;
            transition: background-color 0.3s ease;
        }

        .action-buttons a:hover {
            background-color: #ff9800;
        }

        .empty-cart {
            text-align: center;
            font-size: 1.2rem;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>سلة التسوق الخاصة بك</h1>
        <div class="cart-items">
            <?php if (empty($cartItems)): ?>
                <p class="empty-cart">سلتك فارغة!</p>
            <?php else: ?>
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item">
                        <form method="POST" action="remove_from_cart.php">
                            <input type="hidden" name="prod_id" value="<?= $item['id'] ?>">
                            <button class="remove-btn" type="submit"><i class="fas fa-times"></i></button>
                        </form>
                        <img src="../admin/<?= $item['image'] ?>" alt="<?= htmlspecialchars($item['name']) ?>">

                        <h2><?= htmlspecialchars($item['name']) ?></h2>
                        <p><?= htmlspecialchars($item['description']) ?></p>
                        <div class="ratings">
                            <?= str_repeat('<i class="fas fa-star"></i>', (int)$item['rating']) ?>
                        </div>
                        <p class="price">$<?= number_format($item['price'], 2) ?></p>
                        <p>الكمية: <?= $item['quantity'] ?></p>
                        <p>المجموع: $<?= number_format($item['subtotal'], 2) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="total">المجموع الكلي: $<?= number_format($total, 2) ?></div>
        <div class="action-buttons">
            <a href="../index.php">متابعة التسوق</a>
            <a href="checkout page.php">الدفع الآن</a>
        </div>
    </div>
</body>

</html>