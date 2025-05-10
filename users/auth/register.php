<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .register-container {
      background-color: #fff;
      padding: 40px 30px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      text-align: center;
    }

    .register-container h2 {
      margin-bottom: 25px;
      color: #333;
    }

    .input-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .input-group label {
      display: block;
      margin-bottom: 6px;
      color: #555;
    }

    .input-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      transition: 0.3s;
    }

    .input-group input:focus {
      border-color: #2575fc;
      outline: none;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #2575fc;
      border: none;
      color: white;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #1a5ed0;
    }

    .login-text {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }

    .login-text a {
      color: #2575fc;
      text-decoration: none;
    }

    .login-text a:hover {
      text-decoration: underline;
    }

    .success-message {
      margin-top: 15px;
      color: green;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Sign Up</h2>
    <form method="POST">
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required />
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required />
      </div>

      <button type="submit" name="register">Register</button>

      <p class="login-text">
        Already have an account?
        <a href="login.php">Login</a>
      </p>
    </form>

    <?php
include ('../../config/config.php');

    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            echo "<p style='color: red;'>يرجى ملء جميع الحقول.</p>";
        } else {
            $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<p style='color: red;'>هذا البريد الإلكتروني مستخدم مسبقًا.</p>";
            } else {
                $role = 'user';
                $stmt = $con->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $email, $password, $role);

                if ($stmt->execute()) {
                    echo "<p class='success-message'>تم إنشاء الحساب بنجاح. سيتم تحويلك إلى صفحة تسجيل الدخول...</p>";
                    echo "<script>setTimeout(function(){ window.location.href = 'login.php'; }, 3000);</script>";
                } else {
                    echo "<p style='color: red;'>حدث خطأ أثناء إنشاء الحساب.</p>";
                }
            }
        }
    }
    ?>

  </div>
</body>
</html>
