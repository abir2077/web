<?php
session_start();
session_unset(); // إزالة جميع بيانات الجلسة
session_destroy(); // إنهاء الجلسة بالكامل

header("Location: ../index.php"); // إعادة التوجيه للصفحة الرئيسية
exit();
?>