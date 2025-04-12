<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); // عرض جميع الأخطاء

require 'config.php';
session_start();

// التحقق من إذا كان المستخدم قد سجل دخوله بالفعل
if (isset($_SESSION['user_id'])) {
    header("Location: home.php"); // إذا كان مسجلاً الدخول، إعادة التوجيه إلى الصفحة الرئيسية
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على البريد الإلكتروني وكلمة المرور من النموذج
    $email = $_POST['email'];
    $password = $_POST['password'];

    // التحقق من أن البيانات تم إرسالها
    if (empty($email) || empty($password)) {
        echo "<p style='color: red;'>❌ يجب إدخال البريد الإلكتروني وكلمة المرور.</p>";
        exit;
    }

    // جلب بيانات المستخدم من قاعدة البيانات
    try {
        $stmt = $conn->prepare("SELECT * FROM client WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // التحقق من حالة التفعيل
            if ($user['is_verified'] == 0) {
                echo "<p style='color: red;'>⚠️ حسابك غير مفعل! يرجى التحقق من بريدك الإلكتروني.</p>";
                exit;
            }

            // التحقق من كلمة المرور
            if (password_verify($password, $user['password'])) {
                // تخزين بيانات الجلسة
                $_SESSION['user_id'] = $user['id_client'];

                // توجيه المستخدم إلى الصفحة الرئيسية أو الـ dashboard
                header("Location: home.php");
                exit;
            } else {
                echo "<p style='color: red;'>❌ كلمة المرور غير صحيحة.</p>";
            }
        } else {
            echo "<p style='color: red;'>❌ البريد الإلكتروني غير مسجل.</p>";
        }
    } catch (PDOException $e) {
        // إذا حدث خطأ في الاتصال بقاعدة البيانات
        echo "<p style='color: red;'>❌ حدث خطأ أثناء تسجيل الدخول: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }
        #message {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>تسجيل الدخول</h2>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="البريد الإلكتروني" required><br>
        <input type="password" name="password" placeholder="كلمة المرور" required><br>
        <button type="submit">تسجيل الدخول</button>
    </form>

    <div id="message">
        <!-- سيتم عرض الرسائل هنا مثل الأخطاء أو النجاح -->
    </div>
</body>
</html>
