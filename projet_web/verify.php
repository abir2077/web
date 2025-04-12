<?php
require 'config.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // البحث عن المستخدم بواسطة التوكن
    $stmt = $conn->prepare("SELECT id_client FROM client WHERE token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // تحديث حالة التحقق ومسح التوكن
        $updateStmt = $conn->prepare("UPDATE client SET is_verified = 1, token = NULL WHERE token = ?");
        $updateStmt->execute([$token]);

        echo "<p style='color: green;'>✅ تم تفعيل حسابك بنجاح! يمكنك الآن <a href='login.php'>تسجيل الدخول</a>.</p>";
    } else {
        echo "<p style='color: red;'>❌ رمز التفعيل غير صالح.</p>";
    }
} else {
    echo "<p style='color: red;'>❌ لم يتم العثور على رمز التفعيل.</p>";
}
?>