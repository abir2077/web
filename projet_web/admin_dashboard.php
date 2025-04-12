<?php
session_start();

// تحقق من الدخول
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}

$adminName = $_SESSION['admin_name'] ?? 'المسؤول';

// تسجيل الخروج
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة تحكم المسؤول</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            direction: rtl;
            background-color: #f0f0f0;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background-color:#800007;
            position: fixed;
            top: 0;
            right: 0;
            padding-top: 30px;
            color: white;
            text-align: center;
        }

        .sidebar h2 {
            margin-bottom: 20px;
        }

        .sidebar a, .sidebar form button {
            display: block;
            background-color:rgb(175, 109, 109);
            color: white;
            padding: 12px 20px;
            margin: 10px;
            text-decoration: none;
            border-radius: 6px;
            border: none;
            text-align: center;
            font-weight: bold;
        }

        .sidebar a:hover, .sidebar form button:hover {
            background-color:rgb(148, 40, 43);
        }

        .main-content {
            margin-right: 270px;
            padding: 40px;
        }

        .logout-button {
            background-color:rgb(237, 27, 27) !important;
        }

        .home-button {
            background-color:rgb(230, 37, 37) !important;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>مرحباً، <?= htmlspecialchars($adminName) ?></h2>

    <a href="add pro admin/dele_edti.php/insert_pro.php" class="home-button">الصفحة الرئيسية</a>
    
    <a href="manage_users.php">إدارة المستخدمين</a>
    <a href="manage_products.php">إدارة المنتجات</a>
    <a href="manage_orders.php">إدارة الطلبات</a>
    <a href="site_settings.php">إعدادات الموقع</a>

    <form method="POST">
        <button type="submit" name="logout" class="logout-button">تسجيل الخروج</button>
    </form>
</div>

<div class="main-content">
    <h1>لوحة تحكم المسؤول</h1>
    <p>اختر أحد الأقسام من القائمة الجانبية للبدء في الإدارة.</p>
</div>

</body>
</html>


