<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* نفس التنسيقات بدون تغيير */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
            background: url('../contact us/wall-paper.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
            color: #555;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
        }

        .main-heading h2 {
            color: #444;
            text-align: center;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .main-heading p {
            text-align: center;
            color: #666;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .main-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .main-input:focus {
            border-color: #007BFF;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        input[type="submit"] {
            background: black;
            color: white;
            padding: 1rem;
            border-radius: 100px;
            text-align: center;
            font-size: 16px;
            letter-spacing: 2px;
            transition: background 0.5s, color 0.5s;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: transparent;
            color: black;
            border: 1px solid black;
        }

        .info {
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #e1e1e1;
            border-radius: 5px;
        }

        .info h4 {
            margin-bottom: 10px;
            color: black;
        }

        .info .phone,
        .info address {
            margin-bottom: 10px;
            color: #555;
            font-size: 14px;
        }

        address {
            line-height: 1.5;
        }

        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }

            h2 {
                font-size: 20px;
            }

            .main-input {
                font-size: 14px;
            }

            input[type="submit"] {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h2>Contact US</h2>
    <p>THANK YOU FOR YOUR INTEREST</p>
    <div class="content">
        <div class="container">
            <div class="main-heading">
                <h2>Contact Us</h2>
                <p>TO CONTACT OUR TEAM FOLLOW AND FILL THE FORM</p>
            </div>
            <div class="contaent">
                <form action="contact_process.php" method="POST">
                    <input class="main-input" type="text" name="name" placeholder="YOUR NAME" required>
                    <input class="main-input" type="email" name="mail" placeholder="YOUR EMAIL" required>
                    <textarea name="message" class="main-input" placeholder="Your message" required></textarea>
                    <input type="submit" value="Send Message">
                </form>
                <div class="info">
                    <h4>Get In Touch</h4>
                    <div class="phone">+20 1220251927</div>
                    <div class="phone">+20 1550786637</div>
                    <h4>Where We Are</h4>
                    <address>
                        Alexandria - Agamy<br />
                        Hanoviel<br />
                        Betash<br />
                        Abu-Youssef<br />
                    </address>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
