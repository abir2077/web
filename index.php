<?php include('connt.php'); 
include('home/header.html');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Touch of Perfume</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">

 </head>
 <body>
 <style>
        /* إضافة أنماط البحث */
        .search-section {
            padding: 20px 0;
            background-color: #fff5f5;
            text-align: center;
        }
        
        #searchInput {
            padding: 12px 20px;
            width: 60%;
            margin: 0 auto;
            border-radius: 30px;
            border: 2px solid #8B0000;
            font-size: 16px;
            color: #8B0000;
            background-color: #fff;
            text-align: center;
            direction: rtl;
        }

        .search-result {
            padding: 15px;
            margin: 10px auto;
            width: 60%;
            background-color: #fff;
            border-left: 6px solid #8B0000;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            color: #8B0000;
        }

        .search-result strong {
            font-size: 18px;
            color: #B22222;
        }

        .no-result {
            text-align: center;
            font-size: 16px;
            color: #999;
            margin-top: 20px;
        }
    </style>

    

    
 <section class="Home" id="Home">
  <div class="content">
   <h3>Luxury Women's Perfumes </h3>
   <span>Shine with Your Fragrance</span>
    <p>Discover a world of elegance and allure. Our website offers an exquisite collection of luxury perfumes and international brands designed just for you. Explore the latest fragrances that reflect sophistication and beauty, and elevate your style with every scent.  </p>
    <a href="#" class="btn">Shop now</a>
  </div>
 </section>
 <section class="About" id="About">
    <h1 class="heading"> <span> About</span> us </h1>

    <div class="row"> 

    <div class="video-container">
        <video src="vii.mp4" loop autoplay muted></video>
    </div>
    <div class="content">
    <h3>Why choose us? </h3>
    
    <div class="container">
    </div>

    <P>Experience the elegance of Dior J'adore!  
        a fragrance that embodies sophistication and luxury with its exquisite floral blend. A captivating fusion of jasmine, orange blossom, and ylang-ylang creates a timeless scent that lingers beautifully throughout the day. A unique experience that adds a touch of charm and allure to your presence.  </P>
        <h3>Dior J'adore – Because femininity begins with fragrance!</h3>
    <a href="#" class="btn">learn more</a>
    </div>
  </div>
 </section>

 <section class="icons-container">

 <div class="icons">
    <img src="ايقونات/free-delivery.png" alt="">
    <div class="info">
        <h3> Free Shipping</h3>
        <span>all</span>
    </div>
 </div>
 <div class="icons">
    <img src="ايقونات/gift-card.png" alt="">
    <div class="info">
        <h3> Offer & Gift</h3>
        <span>On all orders </span>
    </div>
 </div>
 <div class="icons">
    <img src="ايقونات/pay.png" alt="">
    <div class="info">
        <h3> Secure Payment </h3>
        <span>Cash on Delivery</span>
    </div>
 </div>

 </section>

    </div>

    </div>

 </section>

 <section class="Perfumes" id="Perfumes">
    <h1 class="heading"> latest <span>Perfumes</span></h1>
    
    <div class="Perfumes-container">
    <?php 
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="Perfumes-card" data-name='p-<?php echo $row["id"]; ?>'>
        <span class="discount-badge">10%</span>
        <div class="image-container"> 
            <img src="العطور/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="Products-image">
            <button class="cart-icon">
                <i class="fa fa-shopping-cart"></i> ADD TO CART
            </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name"><?php echo $row['name']; ?></h2>
            <p class="price"><?php echo $row['price']; ?> DZ</p>
            <div class="rating">
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                <i class="fa fa-star"></i><i class="fa fa-star-half-o"></i> 
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
       <button class="cart-icon">
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
    <div class="Perfumes-card">
        <span class="discount-badge">10%</span>
        <div class="image-container "> 
        <img src="العطور/يارا.jpg" alt="Black Opium Exotic Red" class="Products-image">
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
    <div class="Perfumes-card">
        <span class="discount-badge">9%</span>
        <div class="image-container "> 
        <img src="العطور/44.jpg" alt="" class="Products-image">
       <button class="cart-icon">
            <i class="fa fa-shopping-cart"></i> ADD TO CART
       </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name">Hermès Jour d'Hermès </h2>
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
        <span class="discount-badge">9%</span>
        <div class="image-container "> 
        <img src="العطور/6.jpg" alt="" class="Products-image">
       <button class="cart-icon">
            <i class="fa fa-shopping-cart"></i> ADD TO CART
       </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name">Lancôme Idôle
            </h2>
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
        <span class="discount-badge">9%</span>
        <div class="image-container "> 
        <img src="العطور/5.jpg" alt="" class="Products-image">
       <button class="cart-icon">
            <i class="fa fa-shopping-cart"></i> ADD TO CART
       </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name">Diptyque Eau Rose
                Hermès Jour d'Hermès
                </h2>
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
   
 </div>
 </section>
 <div class="preview-overlay" id="previewOverlay"></div>
    <div class="product-preview" id="productPreview">
        <span class="close-preview" id="closePreview">&times;</span>
        <div class="preview-content">
            <img src="/العطور//زهرية/<?php echo $row['image'];?>"> alt="" class="preview-image" id="previewImage">
            <h3 class="preview-name" id="previewName"></h3>
            <div class="preview-price" id="previewPrice"></div>
            <p class="preview-description" id="previewDescription"></p>
            <div class="preview-buttons">
                <button class="preview-btn add-to-cart">Add to cart</button>
                <button class="preview-btn buy-now">Buy now</button>
            </div>
        </div>
    </div>
    <div id="results" class="search-results"></div>

 
<script>
    
    const cards = document.querySelectorAll('.Perfumes-card');
const preview = document.querySelector('.product-preview');
const overlay = document.querySelector('.preview-overlay');
const closeBtn = document.querySelector('#closePreview'); // كان اسم id غير مطابق

cards.forEach(card => {
  card.addEventListener('click', () => {
    preview.style.display = 'block';
    overlay.style.display = 'block';
  });
});

closeBtn.addEventListener('click', () => {
  preview.style.display = 'none';
  overlay.style.display = 'none';
});

overlay.addEventListener('click', () => {
  preview.style.display = 'none';
  overlay.style.display = 'none';
});

  </script>
  
  

 </body>
 </html>