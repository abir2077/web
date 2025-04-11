<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على البيانات المدخلة
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password']; // كلمة المرور العادية قبل التشفير
    $role = $_POST['role'];
    $permissions = $_POST['permissions']; // قائمة الصلاحيات المحددة

    // التحقق من البيانات المدخلة
    if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($role) || empty($permissions)) {
        echo "<p style='color: red;'>❌ جميع الحقول مطلوبة.</p>";
        exit;
    }

    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red;'>❌ البريد الإلكتروني غير صالح.</p>";
        exit;
    }

    // تشفير كلمة المرور باستخدام BCRYPT
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        // إدراج المسؤول الجديد
        $stmt = $conn->prepare("INSERT INTO admin (nom, prenom, email, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $hashedPassword, $role]);
        $admin_id = $conn->lastInsertId();

        // ربط المسؤول بالصلاحيات
        foreach ($permissions as $permission_id) {
            $stmt = $conn->prepare("INSERT INTO admin_permissions (id_admin, id_permission) VALUES (?, ?)");
            $stmt->execute([$admin_id, $permission_id]);
        }

        echo "<p style='color: green;'>✅ تم إنشاء المسؤول وربطه بالصلاحيات بنجاح!</p>";

    } catch (PDOException $e) {
        // التعامل مع الأخطاء في الاتصال بقاعدة البيانات
        echo "<p style='color: red;'>❌ حدث خطأ أثناء معالجة البيانات: " . $e->getMessage() . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة مسؤول جديد</title>
</head>
<body>
    <h2>إضافة مسؤول جديد</h2>
    <form action="create_admin.php" method="post">
        <label for="nom">الاسم:</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">اللقب:</label>
        <input type="text" name="prenom" required><br>

        <label for="email">البريد الإلكتروني:</label>
        <input type="email" name="email" required><br>

        <label for="password">كلمة المرور:</label>
        <input type="password" name="password" required><br>

        <label for="role">الدور:</label>
        <select name="role">
            <option value="super_admin">مشرف عام</option>
            <option value="moderateur">مشرف</option>
        </select><br>

        <label>الصلاحيات:</label><br>
        <input type="checkbox" name="permissions[]" value="3"> إدارة المنتجات<br>
        <input type="checkbox" name="permissions[]" value="2"> إدارة الطلبات<br>
        <input type="checkbox" name="permissions[]" value="1">إدارةالمستخدمين<br>
        <input type="checkbox" name="permissions[]" value="4"> إعدادات الموقع<br>

        <button type="submit">إضافة المسؤول</button>
    </form>
</body>
</html>