<?php
include '../config/config.php';

if (
    isset($_POST['fullname'], $_POST['email'], $_POST['address'], $_POST['city'],
          $_POST['postalcode'], $_POST['paymentMethod'], $_POST['totalAmount'])
) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $paymentMethod = $_POST['paymentMethod'];
    $totalAmount = $_POST['totalAmount'];

    $stmt = $con->prepare("INSERT INTO orders (fullname, email, address, city, postalcode, payment_method, total_amount, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssssd", $fullname, $email, $address, $city, $postalcode, $paymentMethod, $totalAmount);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Database Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Missing data!";
}
?>
