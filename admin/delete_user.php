<?php
include('../connt.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['user_id'])) {
    $user_id = intval($_POST['user_id']);

    // منع حذف نفسك
    if ($_SESSION['user_id'] == $user_id) {
        echo "❌ لا يمكنك حذف حسابك الخاص.";
        exit();
    }

    // التحقق من أن المستخدم ليس Admin
    $check_sql = "SELECT role FROM users WHERE id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $user_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    $user = $check_result->fetch_assoc();

    if ($user && $user['role'] === 'admin') {
        echo "❌ لا يمكنك حذف حساب مدير (Admin).";
        exit();
    }

    // تنفيذ الحذف
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        header("Location: user_list.php");
        exit();
    } else {
        echo "❌ حدث خطأ أثناء الحذف.";
    }
}
?>