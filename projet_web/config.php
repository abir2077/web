<?php
$host = "localhost";
$dbname = "ecommerce";
$username = "root"; // غيّرها إذا كنت تستخدم اسم مستخدم آخر
$password = ""; // ضع كلمة المرور إذا كانت موجودة

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}
?>
