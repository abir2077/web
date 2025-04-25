<?php
session_start();
$user_identifier = session_id();

$conn = new mysqli("localhost", "root", "", "yout");
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

if (isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    // التحقق إذا المنتج موجود بالفعل في السلة
    $check = $conn->prepare("SELECT id, quantity FROM cart WHERE user_identifier = ? AND product_id = ?");
    $check->bind_param("si", $user_identifier, $product_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // إذا المنتج موجود، نزيد الكمية
        $row = $result->fetch_assoc();
        $new_qty = $row['quantity'] + $quantity;

        $update = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
        $update->bind_param("ii", $new_qty, $row['id']);
        $update->execute();
    } else {
        // إذا المنتج جديد، نضيفه للسلة
        $insert = $conn->prepare("INSERT INTO cart (user_identifier, product_id, quantity) VALUES (?, ?, ?)");
        $insert->bind_param("sii", $user_identifier, $product_id, $quantity);
        $insert->execute();
    }

    // إعادة التوجيه
    header("Location: cart.php");
    exit();
}
?>
