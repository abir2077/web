<?php
$BASE_PATH = '';
include('../includes/header.php');
include('../includes/db.php');

$id = intval($_GET['id']);
$query = $conn->prepare("SELECT * FROM products WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 1) {
  $product = $result->fetch_assoc();
  ?>

  <link rel="stylesheet" href="s.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

  <div class="product-card" >

    <img src="/web/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
    <div class="product-content">
      <h1 class="product-title"><?php echo $product['name']; ?></h1>
      <span class="product-price"><?php echo $product['price']; ?> DZ</span>
      <div class="product-description">
        <?php echo $product['description']; ?>
      </div>
      <hr class="divider">
<button class="cart-btn" data-id="<?php echo $product['id']; ?>">Add To Cart</button>
    </div>
  </div>

  <?php
} else {
  echo '<p>المنتج غير موجود.</p>';
}
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const btn = document.querySelector('.cart-btn');
  const cartCount = document.getElementById('cart-count');

  // تحديث عدد المنتجات في السلة
  function updateCartCount() {
    // إرسال طلب إلى ملف PHP ليجلب عدد المنتجات في السلة
    fetch('/web/cart/count.php')
      .then(response => response.text())
      .then(data => {
        cartCount.textContent = data;  // عرض العدد في الأيقونة
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }

  // تحديث السلة عند تحميل الصفحة
  updateCartCount();

  // عندما يضغط المستخدم على "Add To Cart"
  btn.addEventListener('click', function() {
    const productId = this.getAttribute('data-id');

    // إرسال الطلب إلى ملف PHP لإضافة المنتج إلى السلة
    fetch('/web/cart/add_to_cart.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'id=' + encodeURIComponent(productId)
    })
    .then(response => response.text())
    .then(data => {
      alert("✅ تم إضافة المنتج إلى السلة!");
      updateCartCount();  // تحديث العدد بعد الإضافة
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
});
</script>


