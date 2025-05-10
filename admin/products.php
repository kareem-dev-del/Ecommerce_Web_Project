<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ادارة المنتجات</title>
  <style>
    body {
      background-color: #f8f9fa;
    }

    h3 {
      font-family: 'Cairo', sans-serif;
      font-weight: bold;
      margin-top: 30px;
      margin-bottom: 30px;
    }

    .products-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 20px;
    }

    .card {
      width: 16rem;
      border: none;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-body {
      text-align: center;
    }

    .card-title {
      font-family: 'Cairo', sans-serif;
      font-weight: bold;
      font-size: 18px;
      margin-bottom: 15px;
    }

    .card-category {
      font-size: 14px;
      color: #6c757d;
      margin-bottom: 10px;
    }

    .buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    #alert-message {
      width: 90%;
      margin: 20px auto;
    }

    .top-right-button {
      position: absolute;
      top: 20px;
      right: 20px;
      z-index: 999;
    }

  </style>
</head>
<body>

  <center>
    <h3>ادارة جميع المنتجات</h3>
  </center>

  <div class="top-right-button">
    <a href="index.php" class="btn btn-success rounded-pill">رجوع للرئيسية</a>
  </div>

  <?php
  session_start(); 

  if (isset($_SESSION['message'])) {
      $message = $_SESSION['message'];
      $message_type = $_SESSION['message_type'];

      echo "<div id='alert-message' class='alert alert-$message_type text-center' role='alert'>
              $message
            </div>";

      unset($_SESSION['message']);
      unset($_SESSION['message_type']);
  }

  include('../config/config.php');

  // تعديل الاستعلام 
  $query = "SELECT prod.*, categories.name AS category_name
            FROM prod
            LEFT JOIN categories ON prod.category_id = categories.id";

  $result = mysqli_query($con, $query);         

  echo "<div class='products-container'>";

  while ($row = mysqli_fetch_assoc($result)) {
      echo "
          <div class='card'>
            <img src='{$row['image']}' alt='صورة المنتج'>
            <div class='card-body'>
              <h5 class='card-title'>{$row['name']}</h5>
              <div class='card-category'>التصنيف: {$row['category_name']}</div>
              <p class='card-text'>{$row['price']}</p>
              <div class='buttons'>
                <a href='update.php?id={$row['id']}' class='btn btn-primary btn-sm'>تعديل</a>
                <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>حذف</a>
              </div>
            </div>
          </div>
      ";
  }

  echo "</div>";
  ?>

  <!-- اخفاء رسالة التنبيه بعد مدة -->
  <script>
    setTimeout(() => {
      const alertMessage = document.getElementById('alert-message');
      if (alertMessage) {
        alertMessage.style.transition = "opacity 0.5s ease";
        alertMessage.style.opacity = "0";
        setTimeout(() => alertMessage.remove(), 500);
      }
    }, 5000);
  </script>

</body>
</html>
