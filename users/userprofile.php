<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

include("../config/config.php"); // تأكد من أن ملف config.php موجود في المسار الصحيح
// جلب بيانات المستخدم من قاعدة البيانات
$userId = $_SESSION['user_id'];

$sql = "SELECT email, password FROM users WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("المستخدم غير موجود.");
}

// عند إرسال النموذج لتحديث كلمة السر
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST["password"];
    
    $updateSql = "UPDATE users SET password = ? WHERE id = ?";
    $updateStmt = $con->prepare($updateSql);
    $updateStmt->bind_param("si", $newPassword, $userId);

    if ($updateStmt->execute()) {
        $message = "تم تحديث كلمة السر بنجاح!";
        $user['password'] = $newPassword;
    } else {
        $message = "حدث خطأ أثناء التحديث.";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>ملف المستخدم</title>
  <style>
    body {
      font-family: 'Tahoma', sans-serif;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      direction: rtl;
    }

    .profile-card {
      background-color: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 320px;
      text-align: center;
    }

    .profile-card img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 2px solid #007bff;
    }

    .profile-card h2 {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
      font-weight: bold;
      text-align: right;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    input:disabled:hover {
      border-color: red;
      cursor: not-allowed;
    }

    input:disabled:hover::after {
      content: '✖';
      color: red;
      position: absolute;
    }

    .btn-container {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    button {
      flex: 1;
      background-color: #007bff;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }

    button.back {
      background-color: #6c757d;
    }

    .success {
      color: green;
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="profile-card">
    <!-- صورة المستخدم -->
    <img src="1.jpg" alt="User Avatar">

    <h2>ملف المستخدم</h2>

    <?php if (isset($message)) echo "<p class='success'>$message</p>"; ?>

    <form method="POST" action="">
      <label for="email">الإيميل:</label>
      <input type="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>

      <label for="password">كلمة السر:</label>
      <input type="text" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>

      <div class="btn-container">
        <button type="submit">تحديث</button>
        <button type="button" class="back" onclick="window.location.href='../index.php'">رجوع</button>
      </div>
    </form>
  </div>
</body>
</html>
