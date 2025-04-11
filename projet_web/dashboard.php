<?php
session_start();

// التأكد من أن المستخدم قام بتسجيل الدخول
if (!isset($_SESSION['admin_id'])) {
    die("❌ يجب تسجيل الدخول أولاً.");
}

// جلب الصلاحيات المخزنة في الجلسة
$permissions = $_SESSION['admin_permissions'] ?? [];

// التحقق مما إذا كان للمستخدم صلاحية "إدارة المنتجات"
if (in_array('manage_products', $permissions)) {
    echo "✅ لديك صلاحية إدارة المنتجات";
} else 
    if (in_array('site_settings', $permissions)) { 
        echo "✅ لديك صلاحية اعدادات الموقع";
} else
    if (in_array('manage_orders', $permissions)) { 
        echo "✅ لديك صلاحية إدارة الطلبات"; 
} else 
   if (in_array('manage_users', $permissions)) { 
        echo"✅ لديك صلاحية إدارة المستخدمين";
} else 
    if(in_array('manage_users,manage_orders,site_settings,manage_products', $permissions)) {
     echo"✅لديك جميع الصلاحيات";}
else {
    "ليس لديك اي صلاحية";
}

?>

