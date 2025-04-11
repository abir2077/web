<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على البيانات من النموذج باستخدام الـ filter_input لحمايتها
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);
    $adresse = filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "❌ البريد الإلكتروني غير صحيح."]);
        exit;
    }

    // تشفير كلمة المرور باستخدام PASSWORD_BCRYPT
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // إنشاء توكن للتحقق من البريد الإلكتروني
    $token = bin2hex(random_bytes(32));
    $is_verified = 0;

    // التحقق من أن البريد الإلكتروني غير مستخدم من قبل
    $checkEmail = $conn->prepare("SELECT * FROM client WHERE email = :email");
    $checkEmail->bindParam(':email', $email, PDO::PARAM_STR);
    $checkEmail->execute();

    if ($checkEmail->rowCount() > 0) {
        echo json_encode(["status" => "error", "message" => "البريد الإلكتروني مستخدم بالفعل."]);
        exit;
    }

    // إدراج المستخدم الجديد في قاعدة البيانات
    $stmt = $conn->prepare("INSERT INTO client (nom, prenom, email, telephone, adresse, password, token, is_verified) 
                            VALUES (:nom, :prenom, :email, :telephone, :adresse, :password, :token, :is_verified)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':is_verified', $is_verified, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode([
            "status" => "success", 
            "message" => "✅ تم التسجيل بنجاح! <br> 
                          <a href='verify.php?token=$token' style='color: blue; text-decoration: underline;'>اضغط هنا لتفعيل حسابك</a>"
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "❌ حدث خطأ أثناء التسجيل."]);
    }
}
?>

