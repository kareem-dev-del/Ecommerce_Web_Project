<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .login-card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-card {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        .login-card-header h1 {
            margin: 0;
            font-size: 26px;
            color: #333;
            text-align: center;
        }

        .login-card-header div {
            text-align: center;
            font-size: 14px;
            margin-top: 8px;
            color: #777;
        }

        .login-card-form {
            margin-top: 20px;
        }

        .form-item {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .small-button {
            background: #fff;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #45a049;
        }

        .total {
            font-weight: bold;
            text-align: center;
            margin: 15px 0;
            font-size: 18px;
        }

        .success-message {
            text-align: center;
            color: green;
            margin-top: 15px;
        }

        @media (max-width: 600px) {
            .login-card {
                padding: 20px;
                width: 90%;
            }

            .btn {
                font-size: 14px;
            }

            .total {
                font-size: 16px;
            }
        }
    </style>
</head>
<body id="body1">
    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-header">
                <h1>Checkout</h1>
                <div>Please fill in your details to complete the purchase</div>
            </div>
            <form class="login-card-form" id="checkoutForm">
                <div class="form-item"><input type="text" placeholder="Enter Full Name" id="fullname" required></div>
                <div class="form-item"><input type="email" placeholder="Enter Email" id="email" required></div>
                <div class="form-item"><input type="text" placeholder="Enter Address" id="address" required></div>
                <div class="form-item"><input type="text" placeholder="Enter City" id="city" required></div>
                <div class="form-item"><input type="text" placeholder="Enter Postal Code" id="postalcode" required></div>
                <div class="form-item">
                    <select id="paymentMethod" class="small-button">
                        <option value="Credit Card">Credit Card</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Cash on Delivery">Cash on Delivery</option>
                    </select>
                </div>
                <div class="total">Total Amount: $0.00</div>
                <button type="button" class="btn" onclick="placeOrder()">Place Order</button>
                <div class="success-message" id="successMessage"></div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const totalAmount = localStorage.getItem('cartTotal') || "0.00";
            document.querySelector('.total').textContent = `Total Amount: $${totalAmount}`;
        });

        function placeOrder() {
            const fullname = document.getElementById('fullname').value;
            const email = document.getElementById('email').value;
            const address = document.getElementById('address').value;
            const city = document.getElementById('city').value;
            const postalcode = document.getElementById('postalcode').value;
            const paymentMethod = document.getElementById('paymentMethod').value;
            const totalAmount = localStorage.getItem('cartTotal') || "0.00";

            fetch('order_place.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    fullname, email, address, city, postalcode, paymentMethod, totalAmount
                })
            })
            .then(res => res.text())
            .then(data => {
                const message = document.getElementById('successMessage');
                if (data.trim() === "success") {
                    message.textContent = "✅ Your order has been placed successfully!";
                    localStorage.removeItem('cartTotal');
                } else {
                    message.textContent = "❌ Error: " + data;
                }
            });
        }
    </script>
</body>
</html>
