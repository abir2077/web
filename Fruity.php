<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruity Perfumes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
         
         body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }
 /* تصميم أفقي للبطاقة */
 .product-card {
      width: 700px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      padding: 30px;
      display: flex;
      gap: 40px;
    }

    /* الصورة على اليسار */
    .product-image {
      width: 300px;
      height: 300px;
      object-fit: cover;
      border-radius: 10px;
    }

    /* محتوى النص على اليمين */
    .product-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    /* الاسم في الأعلى على اليمين (منتصف رأسي) */
    .product-title {
      font-size: 28px;
      font-weight: bold;
      color: #800007;
      margin: 120;
      position: absolute;
      top: 10%;
      right: 20%;
      text-align: right;
      margin-bottom: 40px;
    }

    /* السعر تحت الاسم */
    .product-price {
      font-size: 20px;
      font-weight: bold;
      color: #800007;
      margin: 80px 0 0 0;
      text-align: center;
    }

    /* الوصف تحت السعر */
    .product-description {
      font-size: 16px;
      color: #555;
      line-height: 1.6;
      margin: 20px 0 0 0;
      text-align: left;
    }

    /* زر الشراء */
    .cart-btn {
      background-color: #800007;
      color: white;
      border: none;
      padding: 14px 35px;
      font-size: 18px;
      border-radius: 30px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: bold;
      margin-top: 30px;
      align-self: flex-end;
    }

    .cart-btn:hover {
      background-color: #600006;
      transform: scale(1.02);
    }

    /* الخط الفاصل */
    .divider {
      border: none;
      height: 1px;
      background-color: #eee;
      margin: 20px 0;
    }

    /* خلفية مظللة */
    .preview-overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.6);
      display: none;
      z-index: 99;
    }

    /* نافذة المعاينة */
    .product-preview {
      position: fixed;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      background: #fff;
      padding: 20px;
      width: 400px;
      max-width: 90%;
      border-radius: 10px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.3);
      display: none;
      z-index: 100;
    }

    .product-preview img {
      width: 100%;
      border-radius: 10px;
    }

    .close-btn {
      position: absolute;
      top: 10px; right: 15px;
      font-size: 25px;
      color: #900;
      cursor: pointer;
    }

    .stars i {
      color: gold;
    }
    </style>
</head>
<body>
    
<?php 
    include('home/header.html');
    ?>
    
 

<section class="Perfumes">
    <h1 class="heading home-heading"> Fruity <span>Perfumes</span></h1>
    <div class="Perfumes-container">
        
    <div class="Perfumes-card" data-id="">
        <div class="image-container "> 
        <a href="perfumes_data.php?id=<?php echo $row['id']?>">
        <img src="العطور/فاكهية/1.jpg" alt="" class="Perfumes-image">
        </a>
       <button class="cart-icon">
            <i class="fa fa-shopping-cart"></i> ADD TO CART
       </button>
        </div>
        <div class="Perfumes-details">

            <h2 class="Perfumes-name">Olympea Legend</h2>
            <p class="price">49,731 DZ</p>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i> 
            </div>
        </div>
    
    
    
    </div>
    <div class="Perfumes-card" data-id="<?php echo $row['id']; ?>">
        <div class="image-container ">
 
        <img src="العطور/فاكهية/2.jpg" alt="اميرة العرب" class="Products-image">
       <button class="cart-icon">

            <i class="fa fa-shopping-cart"></i> ADD TO CART

       </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name">أميرة العرب</h2>
            <p class="price">3900.00 DZ</p>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i> 
            </div>
        </div>
        </a>
    </div> <div class="Perfumes-card">
        <div class="image-container "> 
        <img src="العطور/فاكهية/3.jpg" alt="" class="Products-image">
       <button class="cart-icon">
            <i class="fa fa-shopping-cart"></i> ADD TO CART
       </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name">Chloé Eau de Perfumes</h2>
            <p class="price">25,000 DZ</p>
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/4.jpg" alt="Black Opium Exotic Red" class="Products-image">
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/16.jpg" alt="Black Opium Exotic Red" class="Products-image">
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/15.jpg" alt="" class="Products-image">
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/7.jpg" alt="Black Opium Exotic Red" class="Products-image">
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/8.jpg" alt="Black Opium Exotic Red" class="Products-image">
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/9.jpg" alt="Prada Paradoxe" class="Products-image">
       <button class="cart-icon">
            <i class="fa fa-shopping-cart"></i> ADD TO CART
       </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name">Prada Paradoxe</h2>
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/5.jpg" alt="Black Opium Exotic Red" class="Products-image">
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/11.jpg" alt="Black Opium Exotic Red" class="Products-image">
       <button class="cart-icon">
            <i class="fa fa-shopping-cart"></i> ADD TO CART
       </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name">Gucci Bloom</h2>
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/12.jpg" alt="" class="Products-image">
       <button class="cart-icon">
            <i class="fa fa-shopping-cart"></i> ADD TO CART
       </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name">Chance by Chanel</h2>
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/13.jpg" alt="" class="Products-image">
       <button class="cart-icon">
            <i class="fa fa-shopping-cart"></i> ADD TO CART
       </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name">Lancôme La Vie Est Belle</h2>
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/14.jpg" alt="" class="Products-image">
       <button class="cart-icon">
            <i class="fa fa-shopping-cart"></i> ADD TO CART
       </button>
        </div>
        <div class="Perfumes-details">
            <h2 class="Perfumes-name">Carolina Herrera Good Girl Blush</h2>
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
        <div class="image-container "> 
        <img src="العطور/فاكهية/10.jpg" alt="Black Opium Exotic Red" class="Products-image">
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
    document.querySelectorAll('.Perfumes-card').forEach(function(card) {
        card.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            window.location.href = 'perfumes_data.php?id=' + id;
        });
    });
</script>


</body>
</html>