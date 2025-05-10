<?php
session_start();
include('../config/config.php');

// تحقق من تسجيل الدخول
if (!isset($_SESSION['user_id'])) {
    // لو المستخدم مش مسجل، رجّعه لصفحة تسجيل الدخول
    header("Location: ../users/auth/login.php");
    exit();
}

// استقبل بيانات المنتج من الرابط (GET أو POST حسب الاستخدام)
if (isset($_GET['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = intval($_GET['product_id']);

    // هل المنتج موجود بالفعل في السلة؟
    $check_sql = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt = $con->prepare($check_sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // لو موجود، زوّد الكمية بـ +1
        $update_sql = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
        $stmt = $con->prepare($update_sql);
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
    } else {
        // لو مش موجود، أضفه للسلة
        $insert_sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)";
        $stmt = $con->prepare($insert_sql);
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
    }

    // رجّع المستخدم للصفحة الرئيسية أو صفحة المنتجات
    header("Location:ShoppingCart.php");
    exit();
} else {
    echo "رقم المنتج غير موجود.";
}
