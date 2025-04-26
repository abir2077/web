<?php 
$BASE_PATH = '../';
include('../home/header.php'); 
 include('../connt.php'); ?>
 <style>
    .btn-details {
  background-color: #a60000 !important;
  color: white !important;
  padding: 6px 15px !important;
  font-size: 14px !important;
  border: none !important;
  border-radius: 25px !important;
  cursor: pointer;
}
    .modal {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}

.modal-content-small {
  background: #fff;
  padding: 20px;
  border-radius: 15px;
  width: 400px;
  position: relative;
  box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.modal-body {
  display: flex;
  align-items: center;
  gap: 20px;
}

.modal-product-image {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 10px;
}

.modal-text {
  flex: 1;
}

.modal-product-name {
  font-size: 20px;
  color: #8B0000; /* أحمر قاتم */
  margin-bottom: 5px;
}

.modal-product-description {
  font-size: 14px;
  color: #333;
  margin-bottom: 5px;
}

.modal-product-price {
  font-size: 16px;
  color: #8B0000; /* أحمر قاتم */
  font-weight: bold;
  margin-bottom: 10px;
}

.btn-add-cart {
  background-color: #8B0000; /* أحمر قاتم */
  color: white;
  border: none;
  padding: 8px 20px;
  border-radius: 30px;
  font-size: 14px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-add-cart:hover {
  background-color: #a00000;
}

</style>
    <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

  
<main>

  

  <section id="products">
  <?php
  if (isset($_GET['category'])) {
    $categoryName = ucfirst($_GET['category']);
    echo "<h2 class='sub-heading'>$categoryName Perfumes</h2>";
  } else {
    echo "<h2 class='sub-heading'>جميع المنتجات</h2>";
  }
?>

    <div class="Perfumes-container">
  <?php
    $sql = "SELECT * FROM products";
    if (isset($_GET['category'])) {
      $category = $_GET['category'];
      $sql .= " WHERE category = '$category'";
    }
    

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($product = $result->fetch_assoc()) {
            echo '
            <div class="Perfumes-card">
                <span class="discount-badge">'.($product['discount'] ?? '0%').'</span>
                <div class="image-container"> 
                    <img src="/web/'.$product['image'].'" alt="'.$product['name'].'" class="Perfumes-image">
                    <button class="cart-icon">
                        <i class="fa fa-shopping-cart"></i> ADD TO CART
                    </button>
                </div>
                <div class="Perfumes-details">
                    <h2 class="Perfumes-name">'.$product['name'].'</h2>
                    <p class="price">'.$product['price'].' DZ</p>
                   <button class="btn btn-details" 
                      data-id="'.$product['id'].'" 
                       data-name="'.$product['name'].'" 
                        data-price="'.$product['price'].'" 
                       data-description="'.$product['description'].'" 
                        data-image="/web/'.$product['image'].'">
                         Details
                    </button>

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
        echo '<p>لا توجد منتجات في هذا القسم.</p>';
    }
  ?>
</div>
<!-- Modal -->
<div id="productModal" class="modal" style="display: none;">
  <div class="modal-content-small">
    <span id="closeModal" style="position: absolute; top: 10px; right: 15px; font-size: 22px; cursor: pointer;">&times;</span>
    
    <div class="modal-body">
      <img id="modalImage" src="" alt="" class="modal-product-image">
      
      <div class="modal-text">
        <h2 id="modalName" class="modal-product-name"></h2>
        <p id="modalDescription" class="modal-product-description"></p>
        <p id="modalPrice" class="modal-product-price"></p>

        <button id="modalAddToCart" class="btn-add-cart">Add to Cart</button>
      </div>
    </div>
    
  </div>
</div>

  </section>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const detailButtons = document.querySelectorAll('.btn-details');
  const modal = document.getElementById('productModal');
  const closeModal = document.getElementById('closeModal');
  const modalImage = document.getElementById('modalImage');
  const modalName = document.getElementById('modalName');
  const modalDescription = document.getElementById('modalDescription');
  const modalPrice = document.getElementById('modalPrice');

  detailButtons.forEach(button => {
    button.addEventListener('click', function() {
      modalImage.src = this.getAttribute('data-image');
      modalName.textContent = this.getAttribute('data-name');
      modalDescription.textContent = this.getAttribute('data-description');
      modalPrice.textContent = this.getAttribute('data-price') + ' DZ';
      modal.style.display = 'flex';
    });
  });

  closeModal.addEventListener('click', function() {
    modal.style.display = 'none';
  });

  window.addEventListener('click', function(e) {
    if (e.target == modal) {
      modal.style.display = 'none';
    }
  });
});
</script>