<?php

include('../config/config.php');
session_start();

$ID = $_GET['id'];
$query = "DELETE FROM prod WHERE id = $ID";

if (mysqli_query($con, $query)) {
    $_SESSION['message'] = "تم حذف المنتج بنجاح!";
    $_SESSION['message_type'] = "success"; // نوع الرسالة
} else {
    $_SESSION['message'] = "حدث خطأ أثناء حذف المنتج.";
    $_SESSION['message_type'] = "error"; // نوع الرسالة
}

header("location: products.php");
exit(); // إنهاء السكربت بعد إعادة التوجيه
?>