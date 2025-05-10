<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>تعديل منتج</title>
</head>
<body>
    <?php
    include('../config/config.php');
    $id = $_GET['id'];
    $up = mysqli_query($con, "SELECT * FROM prod WHERE id = $_GET[id]");
    $data = mysqli_fetch_array($up);
    
    ?>
  <div class="dashboard">
    <div class="image">
      <img id="preview" src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="صورة منتج">
    </div>
    <h2>تعديل المنتجات</h2>
    <form action = "up.php" method="POST" enctype="multipart/form-data">
    <label for="name">ايدي المنتج</label>
    <input type="text" name="id" value="<?php echo $data['id']; ?>" readonly style="background-color: #e9ecef; cursor: not-allowed;">      <label for="name">اسم المنتج</label>
      <input type="text" id="name" name="name" value=<?php echo $data['name']?> required>

      <label for="price">السعر</label>
      <input type="text" id="price" name="price" value=<?php echo $data['price']?> required>


      <label for="image">تحديث صورة المنتج</label>
      <img id="current-image" src="<?php echo $data['image']; ?>" alt="صورة المنتج الحالية" style="display: block; width: 100px; height: auto; margin-bottom: 10px;">
      <input type="file" id="image" name="image" onchange="previewImage(event)">

      <div class="button-group">
        <button type="submit" name="update">تعديل المنتج</button>
        <a href="products.php" class="btn-link">صفحة المنتجات</a>
      </div>
    </form>
  </div>


  <?php
  session_start(); // بدء الجلسة

  if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $message_type = $_SESSION['message_type'];

    // عرض التنبيه باستخدام Bootstrap
    echo "<div id='alert-message' class='alert alert-$message_type text-center' role='alert' style='position: fixed; top: 20px; left: 35%; transform: translateX(-50%); z-index: 9999; width: 50%;'>
            $message
          </div>";

  
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
  }
  ?>
  
  <!---  اخفاء الرسالة بعد ظهورها  --->
  <script>
    setTimeout(() => {
        const alertMessage = document.getElementById('alert-message');
        if (alertMessage) {
            alertMessage.style.transition = "opacity 0.5s ease";
            alertMessage.style.opacity = "0";
            setTimeout(() => alertMessage.remove(), 500); // إزالة العنصر بعد اختفائه
        }
    }, 5000); 

    // وظيفة لمعاينة الصورة 
    function previewImage(event) {
        const currentImage = document.getElementById('current-image');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                currentImage.src = e.target.result; // تحديث مصدر الصورة
            };
            reader.readAsDataURL(file); 
        }
    }
</script>


</body>
</html>
