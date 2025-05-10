<?php
include '../config/config.php'; // عدّل المسار إذا لزم

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = trim($_POST["name"] ?? '');
    $email   = trim($_POST["mail"] ?? '');
    $message = trim($_POST["message"] ?? '');

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Save to database using prepared statement
    if (isset($con)) {
        $stmt = $con->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $message);
            if ($stmt->execute()) {
                header('Location: admin_messages.php');
                exit();
                
            } else {
                echo "Error saving message: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Failed to prepare SQL statement.";
        }

        $con->close();
    } else {
        echo "Database connection not established.";
    }
} else {
    echo "Invalid request.";
}
