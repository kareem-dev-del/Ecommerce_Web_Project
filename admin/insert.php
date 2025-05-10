<?php
include('../config/config.php');
session_start();

if (isset($_POST['upload'])) {
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $CATEGORY_ID = $_POST['category_id'];
    $IMAGE = $_FILES['image'];

    // التحقق من نوع الملف
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($IMAGE['type'], $allowed_types)) {
        $_SESSION['message'] = "نوع الصورة غير مدعوم. يجب أن تكون JPG أو PNG أو GIF.";
        $_SESSION['message_type'] = "error";
        header('location: index.php');
        exit();
    }

    // تسمية الصورة عشوائيًا لتفادي التكرار
    $ext = pathinfo($IMAGE['name'], PATHINFO_EXTENSION);
    $new_image_name = uniqid('IMG_', true) . '.' . $ext;
    $image_up = "images/" . $new_image_name;

    // رفع الصورة
    if (move_uploaded_file($IMAGE['tmp_name'], $image_up)) {
        $stmt = $con->prepare("INSERT INTO prod (name, price, image, category_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $NAME, $PRICE, $image_up, $CATEGORY_ID); // استخدام اسم التصنيف بدلاً من ID
        $stmt->execute();

        $_SESSION['message'] = "تم إضافة المنتج بنجاح!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "فشل في اضافة المنتج.";
        $_SESSION['message_type'] = "error";
    }

    header('location: index.php');
}
?>
