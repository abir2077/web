<?php
session_start();
$user_identifier = session_id();

// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "yout");
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// جلب محتويات السلة الخاصة بالمستخدم
$sql = "SELECT c.id, c.quantity, p.name, p.price, p.image , p.stock
        FROM cart c
        JOIN products p ON c.product_id = p.id
        WHERE c.user_identifier = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("فشل في تحضير الاستعلام: " . $conn->error);
}

$stmt->bind_param("s", $user_identifier);
$stmt->execute();
$result = $stmt->get_result();

// حساب الإجمالي
$total = 0;
$items = [];
while ($row = $result->fetch_assoc()) {
    $total += $row['price'] * $row['quantity'];
    $items[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سلة التسوق</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

<div class="cart-container">
    <h1 class="cart-title"><i class="fas fa-shopping-cart"></i> سلة التسوق</h1>
    
    <?php if (count($items) > 0): ?>

    <div class="table-responsive">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th>المنتج</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>المجموع</th>
                    <th>إزالة</th>
                </tr>
            </thead>
            <tbody id="cart-table-body">
                <?php foreach($items as $row): ?>

                <tr data-id="<?= $row['id'] ?>">
                    <td>
                        <img src="/perfumes/<?= htmlspecialchars($row['image']) ?>" 
                             alt="<?= htmlspecialchars($row['name']) ?>" 
                             class="product-image">
                    </td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= number_format($row['price'], 2, '.', ',') ?> د.ج</td>
                    <td>
                        <form action="update_cart.php" method="POST" class="quantity-form">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <div class="quantity-control">
                                <button type="button" class="quantity-btn minus" 
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                <input type="number" name="quantity" 
                                       value="<?= $row['quantity'] ?>" 
                                       min="1" max="<?= $row['stock'] ?>" 
                                       class="quantity-input">
                                <button type="button" class="quantity-btn plus" 
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                            </div>
                            <button type="submit" name="update" class="update-btn">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </form>
                    </td>
                    <td><?= number_format($row['price'] * $row['quantity'], 2, '.', ',') ?> د.ج</td>
                    <td>
                        <form action="update_cart.php" method="POST" class="delete-form">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="delete" class="delete-btn" 
                                    onclick="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-end">الإجمالي:</td>
                    <td colspan="2" class="total-price"><?= number_format($total, 2, '.', ',') ?> د.ج</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="cart-actions">
        <a href="/web/products" class="continue-shopping">
            <i class="fas fa-arrow-right"></i> مواصلة التسوق
        </a>
        <a href="../checkout/" class="checkout-btn">
            إتمام الشراء <i class="fas fa-shopping-bag"></i>
        </a>
    </div>
    
    <?php else: ?>
    <div class="empty-cart">
        <i class="fas fa-shopping-cart"></i>
        <p>سلة التسوق فارغة</p>
        <a href="/web/index.php" class="continue-shopping">تصفح المنتجات</a>
    </div>
    <?php endif; ?>
    
    <div class="shipping-info">
        <h3><i class="fas fa-truck"></i> معلومات الشحن</h3>
        <ul>
            <li>التوصيل خلال 2-3 أيام عمل</li>
            <li>شحن مجاني للطلبات فوق 5000 د.ج</li>
            <li>إمكانية الإرجاع خلال 14 يوم</li>
        </ul>
    </div>
</div>

<script> document.querySelectorAll('.quantity-btn').forEach(button => {
    button.addEventListener('click', function () {
        const form = this.closest('form');
        const quantityInput = form.querySelector('.quantity-input');
        let newQuantity = quantityInput.value;

        if (this.classList.contains('plus')) {
            newQuantity++;
        } else if (this.classList.contains('minus') && newQuantity > 1) {
            newQuantity--;
        }

        quantityInput.value = newQuantity;  // تحديث الحقل بشكل مباشر

        const id = form.querySelector('input[name="id"]').value;

        // إرسال الطلب باستخدام AJAX
        fetch('update_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}&quantity=${newQuantity}&update=1`
        })
        .then(response => response.text())
        .then(data => {
            alert("تم التحديث");
            location.reload(); // إعادة تحميل الصفحة لتحديث السلة
        });
    });
});
</script>


</body>
</html>
