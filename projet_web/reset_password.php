<?php
require 'config.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // التحقق من صحة التوكن
    $stmt = $conn->prepare("SELECT id_client FROM client WHERE token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("<p style='color: red;'>❌ رمز التحقق غير صالح أو انتهت صلاحيته.</p>");
    }
} else {
    die("<p style='color: red;'>❌ لم يتم العثور على رمز التحقق.</p>");
}

// عند إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    // تحديث كلمة المرور وإزالة التوكن بعد الاستخدام
    $updateStmt = $conn->prepare("UPDATE client SET password = ?, token = NULL WHERE token = ?");
    if ($updateStmt->execute([$new_password, $token])) {
        echo "<p style='color: green;'>✅ تم إعادة تعيين كلمة المرور بنجاح! يمكنك الآن تسجيل الدخول.</p>";
    } else {
        echo "<p style='color: red;'>❌ حدث خطأ أثناء إعادة تعيين كلمة المرور.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعادة تعيين كلمة المرور</title>
</head>
<body>
    <h2> إعادة تعيين كلمة المرور</h2>
    <form method="POST">
        <label>كلمة المرور الجديدة:</label><br>
        <input type="password" name="new_password" required><br><br>
        <button type="submit">إعادة تعيين</button>
    </form>
</body>
</html>

