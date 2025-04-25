<?php
session_start();
$user_identifier = session_id();

// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "yout");
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التعديل على الكمية
if (isset($_POST['update']) && isset($_POST['id']) && isset($_POST['quantity'])) {
    $id = intval($_POST['id']);
    $quantity = intval($_POST['quantity']);

    if ($quantity > 0) {
        $sql = "UPDATE cart SET quantity = ? WHERE id = ? AND user_identifier = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("iis", $quantity, $id, $user_identifier);
            $stmt->execute();
            echo "تم تحديث الكمية";
        } else {
            echo "فشل في تحضير الاستعلام";
        }
    } else {
        echo "الكمية غير صالحة";
    }
    exit;
}


// حذف منتج من السلة
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = intval($_POST['id']); // هذا هو cart.id
    $sql = "DELETE FROM cart WHERE id = ? AND user_identifier = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("is", $id, $user_identifier);
        $stmt->execute();
        echo "تم الحذف";
    } else {
        echo "خطأ في الاستعلام: " . $conn->error;
    }
    exit;
}



