<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "my_project";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('❌ البريد الإلكتروني غير صالح'); window.location.href = 'signup.html';</script>";
        exit();
    }

    if (strlen($password) < 8) {
        echo "<script>alert('❌ كلمة المرور يجب أن تكون 8 أحرف على الأقل'); window.location.href = 'signup.html';</script>";
        exit();
    }

    if ($password !== $confirm_password) {
        echo "<script>alert('❌ كلمتا المرور غير متطابقتين'); window.location.href = 'signup.html';</script>";
        exit();
    }

    $check_email_query = "SELECT id FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_email_query);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "<script>alert('❌ البريد الإلكتروني مسجل بالفعل'); window.location.href = 'signup.html';</script>";
        exit();
    }
    $check_stmt->close();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = 'user'; // يمكن ترقيته لاحقًا يدوياً لـ 'admin' من phpMyAdmin

    $sql = "INSERT INTO users (fullname, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "<script>alert('✅ تم التسجيل بنجاح!'); window.location.href = 'signin.html';</script>";
        exit();
    } else {
        echo "<script>alert('❌ حدث خطأ أثناء التسجيل: {$stmt->error}'); window.location.href = 'signup.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>