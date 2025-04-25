

<?php
session_start();
//اساسي الكود هاذا
// فرضاً توصلك معلومات المنتج من فورم أو AJAX
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];
$qty = $_POST['qty'] ?? 1;

// إنشاء المنتج كمصفوفة
$product = [
  'id' => $id,
  'name' => $name,
  'price' => $price,
  'image' => $image,
  'qty' => $qty
];

// إنشاء السلة إذا ما كانتش موجودة
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// التحقق إذا المنتج موجود مسبقًا في السلة
$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['id'] == $id) {
        $item['qty'] += $qty; // زيد الكمية
        $found = true;
        break;
    }
}
unset($item); // good practice after foreach by reference

// إذا المنتج جديد، أضف للسلة
if (!$found) {
    $_SESSION['cart'][] = $product;
}

// ممكن ترجعي JSON أو redirect حسب الحاجة
echo 'تمت الإضافة بنجاح';
