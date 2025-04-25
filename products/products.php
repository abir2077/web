<?php 
$BASE_PATH = '../';
include('./includes/header.php'); 
include('./includes/db.php');
?>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="s.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<main>

  <section id="products">
  <?php
  if (isset($_GET['category'])) {
    $categoryName = ucfirst($_GET['category']);
    echo "<h2 class='heading'><span>$categoryName</span> Perfumes</h2>";
  } else {
    echo "<h2 class='heading'><span>Latest</span> Perfumes</h2>";
  }
  ?>

    <div class="Perfumes-container">
  <?php
    // تعديل الاستعلام ليعرض أحدث المنتجات أو منتجات الفئة حسب الاختيار
    $sql = "SELECT * FROM products";
    
    if (isset($_GET['category'])) {
      $category = $_GET['category'];
      $sql .= " WHERE category = '$category'";
    } else {
      // عرض أحدث المنتجات أولاً
      $sql .= " ORDER BY id DESC LIMIT 6";
    }
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($product = $result->fetch_assoc()) {
            echo '
            <div class="Perfumes-card">
                <span class="discount-badge">'.($product['discount'] ?? '0%').'</span>
                <div class="image-container"> 
                    <img src="/web/'.$product['image'].'" alt="'.$product['name'].'" class="Perfumes-image">
                    <form action="add_to_cart.php" method="POST" class="cart-form">
                        <input type="hidden" name="product_id" value="'.$product['id'].'">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" name="add_to_cart" class="cart-icon">
                            <i class="fa fa-shopping-cart"></i> ADD TO CART
                        </button>
                    </form>
                </div>
                <div class="Perfumes-details">
                    <h2 class="Perfumes-name">'.$product['name'].'</h2>
                    <p class="price">'.$product['price'].' DZ</p>
                    <a href="product.php?id='.$product['id'].'">Details</a>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                </div>
            </div>
            ';
        }
    } else {
        echo '<p>There are no products in this section.</p>';
    }
  ?>
</div>

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

</section>
</main>
