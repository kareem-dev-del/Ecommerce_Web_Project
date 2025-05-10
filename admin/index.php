<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>داش بورد إضافة منتج</title>
</head>
<body>
  <div class="dashboard">
    <div class="image">
      <img id="preview" src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="صورة منتج">
    </div>
    <h2>إضافة منتج جديد</h2>
    <?php
include('../config/config.php');
$categories = mysqli_query($con, "SELECT * FROM categories");
?>

<form action="insert.php" method="POST" enctype="multipart/form-data">
  <label for="name">اسم المنتج</label>
  <input type="text" id="name" name="name" required>

  <label for="price">السعر</label>
  <input type="text" id="price" name="price" required>

  <select id="category" name="category_id" required>
    <option value="">-- اختر تصنيف --</option>
    <option value="men">رجالي</option>
    <option value="kids">أطفال</option>
    <option value="new arrival">وصل حديثاً</option>
  </select>

  <label for="image">اضافة صورة المنتج</label>
  <img id="current-image" src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="صورة المنتج" style="display: block; width: 100px; height: auto; margin-bottom: 10px;">
  <input type="file" id="image" name="image" onchange="previewImage(event)" required>

  <div class="button-group">
    <button type="submit" name="upload">إضافة المنتج</button>
    <a href="products.php" class="btn-link">صفحة المنتجات</a>
    <a href="../Shopping/admin_order.php" class="btn-link">صفحة الاوردرات</a>
  </div>
</form>
  </div>


  <?php
  session_start(); // بدء الجلسة

  if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $message_type = $_SESSION['message_type'];

    // عرض التنبيه باستخدام 
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
    }, 5000); // 5000 ميلي ثانية = 5 ثوانٍ

    // وظيفة لمعاينة الصورة المحددة
    function previewImage(event) {
        const previewImage = document.getElementById('current-image');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result; // تحديث مصدر الصورة
            };
            reader.readAsDataURL(file);
        }
    }
</script>


</body>
</html>
