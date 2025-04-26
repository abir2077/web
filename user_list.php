<?php
include('../connt.php'); // الاتصال بقاعدة البيانات
session_start();

// التأكد من أن المستخدم Admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>قائمة المستخدمين</title>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f4f4f4;
            padding: 2rem;
            direction: rtl;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            border-radius: 12px;
            overflow: hidden;
        }
        th, td {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            text-align: center;
        }
        th {
            background-color: #d32f2f;
            color: white;
        }
        .back-btn {
            background-color: #8B0000;
            color: white;
            padding: 6px 16px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            display: inline-block;
        }
        .back-btn:hover {
            background-color: #a10000;
        }
        .delete-btn {
            background-color: #b71c1c;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.85rem;
        }
        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

<a href="dashboard.php" class="back-btn">Back</a>

<h2>قائمة المستخدمين</h2>
<table>
    <thead>
        <tr>
            <th>رقم</th>
            <th>الاسم الكامل</th>
            <th>البريد الإلكتروني</th>
            <th>الدور</th>
            <th>إجراء</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $conn->query("SELECT id, fullname, email, role FROM users");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['fullname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['role']}</td>
                    <td>
                        <form method='POST' action='delete_user.php' onsubmit=\"return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟');\">
                            <input type='hidden' name='user_id' value='{$row['id']}'>
                            <button type='submit' class='delete-btn'>Delete</button>
                        </form>
                    </td>
                  </tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>