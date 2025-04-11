<?php
session_start();
require_once "config.php"; // تأكد من تضمين الاتصال بقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // التحقق من أن البريد الإلكتروني صالح
    if (empty($email) || empty($password)) {
        $error = "❌ الرجاء إدخال البريد الإلكتروني وكلمة المرور";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "❌ البريد الإلكتروني غير صالح";
    } else {
        // تنفيذ الاستعلام
        $stmt = $conn->prepare("SELECT * FROM admin WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id_admin'];
            $_SESSION['admin_name'] = $admin['nom'] . ' ' . $admin['prenom'];
            $_SESSION['admin_role'] = $admin['role'];
            
            // جلب الصلاحيات للمسؤول
            $stmt = $conn->prepare("SELECT p.permission_name FROM admin_permissions ap JOIN permissions p ON ap.id_permission = p.id_permission WHERE ap.id_admin = :id_admin");
            $stmt->bindParam(":id_admin", $admin['id_admin']);
            $stmt->execute();
            $permissions = $stmt->fetchAll(PDO::FETCH_COLUMN);

            $_SESSION['admin_permissions'] = $permissions ? $permissions : [];

            // تجديد معرف الجلسة لحماية ضد هجمات session fixation
            session_regenerate_id(true);

            // إعادة التوجيه إلى الصفحة الرئيسية
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "❌ فشل تسجيل الدخول. الرجاء المحاولة مرة أخرى.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول المسؤول</title>
</head>
<body>
    <h2>تسجيل دخول المسؤول</h2>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="post" action="">
        <label for="email">البريد الإلكتروني:</label>
        <input type="email" name="email" required><br>

        <label for="password">كلمة المرور:</label>
        <input type="password" name="password" required><br>

        <button type="submit">تسجيل الدخول</button>
    </form>
</body>
</html>

