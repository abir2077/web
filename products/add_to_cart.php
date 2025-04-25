<?php
session_start();

// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "yout");
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التحقق من الطلب
if (isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity'] ?? 1);

    // التحقق إذا المستخدم مسجل الدخول (نفترض أنك تخزني user_id في السيشن بعد تسجيل الدخول)
    $is_logged_in = isset($_SESSION['user_id']);
    $user_identifier = $is_logged_in ? $_SESSION['user_id'] : session_id();

    // ------------------------
    // 1. لو المستخدم مسجل الدخول، خزّن في قاعدة البيانات
    // ------------------------
    if ($is_logged_in) {
        // تحقق إذا المنتج موجود مسبقًا في السلة
        $stmt = $conn->prepare("SELECT id, quantity FROM cart WHERE user_identifier = ? AND product_id = ?");
        $stmt->bind_param("si", $user_identifier, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // تحديث الكمية
            $row = $result->fetch_assoc();
            $new_quantity = $row['quantity'] + $quantity;

            $update = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
            $update->bind_param("ii", $new_quantity, $row['id']);
            $update->execute();
        } else {
            // إدخال منتج جديد
            $insert = $conn->prepare("INSERT INTO cart (user_identifier, product_id, quantity) VALUES (?, ?, ?)");
            $insert->bind_param("sii", $user_identifier, $product_id, $quantity);
            $insert->execute();
        }

    // ------------------------
    // 2. لو المستخدم غير مسجل، خزّن في $_SESSION
    // ------------------------
    } else {
        // إعداد المنتج
        $product = [
            'id' => $product_id,
            'qty' => $quantity
        ];

        // إنشاء السلة إذا غير موجودة
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product_id) {
                $item['qty'] += $quantity;
                $found = true;
                break;
            }
        }
        unset($item); // Good practice

        if (!$found) {
            $_SESSION['cart'][] = $product;
        }
    }

    // الرد المناسب (AJAX أو تحويل)
    if (isset($_POST['ajax'])) {
        echo json_encode(["success" => true, "message" => "تمت إضافة المنتج إلى السلة"]);
    } else {
        header("Location: /web/shooping/cart.php");
        exit();
    }
}
?>
