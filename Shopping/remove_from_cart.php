<?php
session_start();
include('../config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['prod_id']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $prod_id = $_POST['prod_id'];

    $stmt = $con->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $user_id, $prod_id);
    $stmt->execute();
}

header("Location: ShoppingCart.php");
exit();
