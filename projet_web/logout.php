<?php
session_start();
session_unset();  // إزالة جميع متغيرات الجلسة
session_destroy(); // تدمير الجلسة

// توجيه المستخدم إلى صفحة تسجيل الدخول
header("Location: login.php");
exit;
?>
