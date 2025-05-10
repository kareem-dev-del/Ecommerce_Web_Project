<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>المفضلة</title>
    <link rel="stylesheet" href="../Assets/css/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f4f4f9, #ffffff);
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .favorite-items {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .favorite-item {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }

        .favorite-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .favorite-item h2 {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .favorite-item p {
            margin: 5px 0;
            color: #555;
        }

        .remove-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #f44336;
            cursor: pointer;
        }

        .action-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .action-buttons a {
            text-decoration: none;
            padding: 10px 15px;
            background-color: #212121;
            color: #fff;
            border-radius: 5px;
            margin: 0 10px;
        }

        .empty-favorites {
            text-align: center;
            font-size: 1.2rem;
            color: #777;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>المنتجات المفضلة</h1>
    <div class="favorite-items" id="favoriteItems">
        <!-- المنتجات تضاف هنا تلقائياً -->
    </div>
    <div class="action-buttons">
        <a href="../index.php">تصفح المزيد</a>
    </div>
</div>

<script>
    function loadFavoriteItems() {     
        const favoriteItems = JSON.parse(localStorage.getItem('favorites')) || [];
        const container = document.getElementById('favoriteItems');
        container.innerHTML = '';

        if (favoriteItems.length === 0) {
            container.innerHTML = '<p class="empty-favorites">لا توجد منتجات في المفضلة.</p>';
            return;
        }

        favoriteItems.forEach(item => {
            const html = `
                <div class="favorite-item">
                    <button class="remove-btn" onclick="removeFromFavorites('${item.id}')">×</button>
                    <img src="${item.img}" alt="${item.name}">
                    <h2>${item.name}</h2>
                    <p>السعر: ${item.price} EGP</p>
                </div>
            `;
            container.innerHTML += html;  
        });
    }

    function removeFromFavorites(id) {
        let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        favorites = favorites.filter(item => item.id !== id);
        localStorage.setItem('favorites', JSON.stringify(favorites));
        loadFavoriteItems();
    }

    window.onload = loadFavoriteItems;
</script>

</body>
</html>
