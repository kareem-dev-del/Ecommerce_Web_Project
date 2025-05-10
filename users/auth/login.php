<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <style>
    /* Basic Reset */
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

    .login-container {
      background-color: #fff;
      padding: 40px 30px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .input-group {
      margin-bottom: 20px;
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

    .actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .actions a {
      color: #2575fc;
      text-decoration: none;
    }

    .actions a:hover {
      text-decoration: underline;
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

    .signup-text {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }

    .signup-text a {
      color: #2575fc;
      text-decoration: none;
    }

    .signup-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2>Welcome Back</h2>
    <form method="POST">
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required />
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required />
      </div>

      <div class="actions">
        <label>
          <input type="checkbox" /> Remember me
        </label>
      </div>

      <button type="submit" name="submit">Login</button>

      <p class="signup-text">
        Don’t have an account?
        <a href="register.php">Sign up</a>
      </p>
    </form>


    <?php


    session_start();

    include('../../config/config.php');

    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      if (empty($email) || empty($password)) {
        echo "<p style='color: red;'>من فضلك قم بملء جميع الحقول.</p>";
      } else {
        $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email); // ربط القيم
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          $user = $result->fetch_assoc();
          $_SESSION['email'] = $email;

          if ($password === $user['password']) {
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $user['id']; 

            if ($user['role'] === 'admin') {
              header("Location: ../../admin/index.php");
            } else {
              header("Location: ../../index.php");
            }
            exit();
          } else {
            echo "<p style='color: red;'>كلمة المرور غير صحيحة.</p>";
          }
        } else {
          echo "<p style='color: red;'>البريد الإلكتروني غير موجود.</p>";
        }
      }
    }

    ?>

  </div>
</body>

</html>