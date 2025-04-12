<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // التحقق من وجود البريد الإلكتروني في قاعدة البيانات
    $stmt = $conn->prepare("SELECT id_client FROM client WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // إنشاء توكن جديد
        $token = bin2hex(random_bytes(32));

        // تحديث التوكن في قاعدة البيانات
        $updateStmt = $conn->prepare("UPDATE client SET token = ? WHERE email = ?");
        if ($updateStmt->execute([$token, $email])) {
            // رابط إعادة التعيين
            $resetLink = "http://localhost/projet_web/reset_password.php?token=$token";

            // عرض الرابط مباشرةً لأنه لا يوجد بريد إلكتروني
            echo "<p style='color: green;'>✅ تم إرسال رابط إعادة تعيين كلمة المرور!<br>
                  <a href='$resetLink' style='color: blue; font-weight: bold;'>اضغط هنا لإعادة تعيين كلمة المرور</a></p>";
        } else {
            echo "<p style='color: red;'>❌ حدث خطأ أثناء إنشاء رابط إعادة التعيين.</p>";
        }
    } else {
        echo "<p style='color: red;'>❌ البريد الإلكتروني غير مسجل.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نسيت كلمة المرور</title>
</head>
<body>
    <h2> نسيت كلمة المرور؟</h2>
    <form method="POST">
        <label>البريد الإلكتروني:</label><br>
        <input type="email" name="email" required><br><br>
        <button type="submit">إرسال رابط إعادة التعيين</button>
    </form>
</body>
</html>

