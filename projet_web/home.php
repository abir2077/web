<?php
session_start();

// التحقق من أن المستخدم قد سجل الدخول
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // إذا لم يكن المستخدم مسجل الدخول، توجيهه إلى صفحة تسجيل الدخول
    exit;
}

require 'config.php';

// جلب بيانات المستخدم بناءً على الـ user_id المخزن في الجلسة
$stmt = $conn->prepare("SELECT nom, prenom, email FROM client WHERE id_client = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // تخزين الاسم الكامل للمستخدم
    $fullName = $user['nom'] . " " . $user['prenom'];
    $email = $user['email'];
} else {
    echo "❌ حدث خطأ في استرجاع بيانات المستخدم.";
    exit;
}

// عند تسجيل الخروج، نقوم بتدمير الجلسة
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php"); // إعادة التوجيه إلى صفحة تسجيل الدخول بعد تسجيل الخروج
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>الصفحة الرئيسية</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }
        button {
            padding: 10px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>مرحباً بك في الصفحة الرئيسية!</h1>
        <p>أهلاً بك، <?= htmlspecialchars($fullName); ?>!</p>
        <p>البريد الإلكتروني: <?= htmlspecialchars($email); ?></p>
        
        <!-- نموذج لتسجيل الخروج -->
        <form method="POST">
            <button type="submit" name="logout">تسجيل الخروج</button>
        </form>
    </div>
</body>
</html>

