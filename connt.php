<?php
$servername = "localhost"; // أو 127.0.0.1
$username = "root";        // حسب اسم المستخدم في XAMPP أو WAMP
$password = "";            // عادةً فارغ في XAMPP
$dbname = "yout";    // اسم قاعدة البيانات اللي درتيها

// إنشاء الاتصال
$conn = mysqli_connect($servername, $username, $password, $dbname);

// التحقق من الاتصال
if (!$conn) {
    die("فشل الاتصال: " . mysqli_connect_error());
}
?>
