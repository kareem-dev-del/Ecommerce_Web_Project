<?php

include ('config.php');
session_start();

if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];

    // إذا لم يتم رفع صورة جديدة، احتفظ بالصورة القديمة
    if (!empty($image_name)) {
        $image_up = "images/" . $image_name;
        move_uploaded_file($image_location, $image_up);
    } else {
        // جلب الصورة القديمة من قاعدة البيانات
        $query = mysqli_query($con, "SELECT image FROM prod WHERE id = $ID");
        $row = mysqli_fetch_assoc($query);
        $image_up = $row['image'];
    }

    // تحديث البيانات في قاعدة البيانات
    $update = "UPDATE prod SET name='$NAME', price='$PRICE', image='$image_up' WHERE id = $ID";
    if (mysqli_query($con, $update)) {
        $_SESSION['message'] = "تم تعديل المنتج بنجاح!";
        $_SESSION['message_type'] = "success"; // نوع الرسالة
    } else {
        $_SESSION['message'] = "فشل في تعديل المنتج.";
        $_SESSION['message_type'] = "error"; // نوع الرسالة
    }

    header('location: products.php'); // لنقل المستخدم إلى صفحة المنتجات
    exit();
}
?>