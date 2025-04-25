
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Touch of Perfume</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="/web/css/header.css">
    <link rel="stylesheet" href="/web/css/style.css">




 </head>
 <body>
 
 <a href="../products/products.php?category=floral">floral</a> 
 <a href="../products/products.php?category=fruity">fruity</a> 
<style>
    

        .Perfumes-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 1rem;
            margin: 1rem 0;
            text-align: center;
        }

        .Perfumes-card img {
            width: 100%;
            height: auto;
        }

        .Perfumes-card .price {
            font-size: 1.8rem;
            color: var(--red);
            margin: .5rem 0;
        }

        .Perfumes-card .rating i {
            color: gold;
        }
    </style>
</style>
    <section class="Home" id="Home">
        <div class="content">
         <h3>Luxury Women's Perfumes </h3>
         <span>Shine with Your Fragrance</span>
          <p>Discover a world of elegance and allure. Our website offers an exquisite collection of luxury perfumes and international brands designed just for you. Explore the latest fragrances that reflect sophistication and beauty, and elevate your style with every scent.  </p>
          <a href="#Perfumes" class="btn">Shop now</a>
        </div>
       </section>
       <?php 
include('includes/header.php');
include('includes/about.php');

?>
       
      
       <section class="icons-container">
      
         <div class="icons">
          <img src="/icon/free-delivery.png" alt="">
          <div class="info">
              <h3> Free Shipping</h3>
              <span>all</span>
           </div>
        </div>
        <div class="icons">
          <img src="/icon/gift-card.png" alt="">
          <div class="info">
              <h3> Offer & Gift</h3>
              <span>On all orders </span>
          </div>
       </div>
       <div class="icons">
          <img src="/icon/pay.png" alt="">
          <div class="info">
              <h3> Secure Payment </h3>
              <span>Cash on Delivery</span>
          </div>
       </div>
       </section>
      
       <section class="Perfumes" id="Perfumes">
          <h1 class="heading"> latest <span>Perfumes</span></h1>

          
          <div class="Perfumes-container">
          
          <?php
include('includes/db.php'); // أو حسب مسار الاتصال بقاعدة البيانات

include('products/products.php');
$sql = "SELECT * FROM products WHERE is_latest = 1 ORDER BY id DESC LIMIT 8";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="Perfumes-card">
        <span class="discount-badge"><?php echo $row['discount']; ?>%</span>
        <div class="image-container">
            <img src="perfumes/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="Products-image">

            <button class="cart-icon"
                    data-id="<?php echo $row['id']; ?>"
                    data-quantity="1">
                <i class="fa fa-shopping-cart"></i> ADD TO CART
            </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name"><?php echo $row['name']; ?></h2>
            <p class="price"><?php echo number_format($row['price'], 2); ?> DZ</p>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </div>
        </div>
    </div>
    <?php
}
?>
       
          <div class="Perfumes-card">
              <span class="discount-badge">9%</span>
              <div class="image-container "> 
              <img src="العطور/تنزيل.jpg" alt="Coco Chanel" class="Products-image">
             <button class="cart-icon" data-id="16">
                  <i class="fa fa-shopping-cart"></i> ADD TO CART
             </button>
              </div>
              <div class="Perfumes-details">
                  <h2 class="Perfumes-name">COCO CHANEL</h2>
                  <p class="price">3000.00 DZ</p>
                  <div class="rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i> 
                  </div>
              </div>
              
          
          </div>
           <div class="Perfumes-card">
              <span class="discount-badge">50%</span>
              <div class="image-container "> 
              <img src="العطور/di.jpg" alt="J'adore Dior" class="Products-image">
             <button class="cart-icon">
                  <i class="fa fa-shopping-cart"></i> ADD TO CART
             </button>
              </div>
              <div class="Perfumes-details">
                  <h2 class="Perfumes-name">J'adore Dior</h2>
                  <p class="price">29,800 DZ</p>
                  <div class="rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i> 
                  </div>
              </div>
          
          </div> 
          <div class="Perfumes-card">
              <span class="discount-badge">6%</span>
              <div class="image-container "> 
              <img src="العطور/bla.jpg" alt="Black Opium Exotic Red" class="Products-image">
             <button class="cart-icon">
                  <i class="fa fa-shopping-cart"></i> ADD TO CART
             </button>
              </div>
              <div class="Perfumes-details">
                  <h2 class="Perfumes-name">Black Opium Exotic Red</h2>
                  <p class="price">20,369 DZ</p>
                  <div class="rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star-half-o"></i> 
                  </div>
              </div>
          
          </div>
        
          
         
       </div>
       </section>
      
          
       <script>
document.querySelectorAll('.cart-icon').forEach(button => {
    button.addEventListener('click', function () {
        const productId = this.dataset.id;
        const quantity = this.dataset.quantity;

        fetch('add_to_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `product_id=${productId}&quantity=${quantity}`
        })
        .then(res => res.text())
        .then(data => {
            alert("✅ تم إضافة المنتج للسلة!");
        });
    });
});
</script>


    
       </body>
       </html> 