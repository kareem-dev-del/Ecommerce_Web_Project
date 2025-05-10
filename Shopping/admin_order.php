<?php
include '../config/config.php';
$result = mysqli_query($con, "SELECT * FROM orders ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Orders</title>
    <style>
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: center;
        }
        th {
            background: #222;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">All Orders</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>Postal Code</th>
            <th>Payment Method</th>
            <th>Total</th>
            <th>Order Date</th>
        </tr>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['fullname'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['postalcode'] ?></td>
                    <td><?= $row['payment_method'] ?></td>
                    <td>$<?= $row['total_amount'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="9">No orders yet.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
