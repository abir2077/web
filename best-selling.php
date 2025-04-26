<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best_selling</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<style>
 .search-container {
  position: relative;
  width: auto; /* ما يحتاج مساحة كبيرة */
  margin-left: 10px; /* تصغير المسافة بينه وبين الأيقونات */
}

.search-container input {
  width: 140px; /* عرض أصغر */
  padding: 4px 8px; /* حشو أخف */
  font-size: 13px; /* حجم خط أصغر */
  height: 30px; /* تصغير الارتفاع */
  border: 1px solid #e0c9c9;
  border-radius: 4px;
}

  </style>
    <header>
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <a href="#" class="logo">Parfumista<span> Store</span></a><nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#About">About</a></li>
                <li><a href="#Perfumes">Perfumes</a></li>
                <li class="dropdown">
                    <a href="#Categories">Categories</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                            <a href="#">By type</a>
                            <ul class="dropdown-menu">
                                <li><a href="products/products.php?category=floral">Floral Perfumes</a></li>
                                <li><a href="products/products.php?category=fruity">Fruity Perfumes</a></li>
                                <li><a href="products/products.php?category=oriental">Oriental Perfumes</a></li>
                            </ul>
                        </li><li class="dropdown">
                            <a href="#">The best</a>
                            <ul class="dropdown-menu">
                                <li><a href="best-selling.php">Best-selling</a></li>
                                <li><a href="trending.php">Trending Perfumes</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="cont/concte3.html">Contact</a></li>
            </ul>
        </nav>

        <div class="icons">
          
            <a href="#" class="fas fa-shopping-cart "></a>
            <a href="تسجيل/signup.html">
                <i class="fas fa-user"></i>
            </a>
            
            <div class="search-container">
              <input type="text" id="mainSearchInput" class="form-control form-control-sm rounded-pill px-3" placeholder="ابحث عن عطر...">
              <div id="searchResults" class="search-results"></div>
          </div>
        </div>
    </header>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('mainSearchInput');
        
            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    const searchValue = this.value.toLowerCase().trim();
                    const perfumeCards = document.querySelectorAll('.Perfumes-card');
        
                    perfumeCards.forEach(function (card) {
                        const nameElement = card.querySelector('.Perfumes-name');
                        const perfumeName = nameElement ? nameElement.textContent.toLowerCase() : '';
        
        if (perfumeName.includes(searchValue)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
}
});
</script>


    <!-- Header -->
    

    <!-- Content -->
    <section class="Perfumes">
        <h1 class="heading home-heading"> Best <span>selling</span></h1>
        <div class="Perfumes-container">
        <?php $perfumes = $perfumes ?? [
        [ 'name' => 'FLOWER BOMB', 'price' => '23,782 DZ', 'image' => 'parfum/bests/fb.jpg' ],
        [ 'name' => 'Burberry Her', 'price' => '10,379 DZ', 'image' => 'parfum/bests/11.jpg' ],
        [ 'name' => 'Chanel PARIS', 'price' => '12,000 DZ', 'image' => 'parfum/bests/12.jpg' ],
        [ 'name' => 'CHANEL EAU DE PARFUM', 'price' => '11,000 DZ', 'image' => 'parfum/bests/13.jpg' ],
        [ 'name' => 'COCO Chanel', 'price' => '32,000 DZ', 'image' => 'parfum/bests/coc.jpg' ],
        [ 'name' => 'FLOWER BOMB EAU DE PARFUM', 'price' => '23,500 DZ', 'image' => 'parfum/bests/14.jpg' ],
        [ 'name' => 'GOOD GIRL PARFUM', 'price' => '24,500 DZ', 'image' => 'parfum/bests/15.jpg' ],
        [ 'name' => 'JO MALONE LONDON', 'price' => '11,700 DZ', 'image' => 'parfum/bests/16.jpg' ],
        [ 'name' => 'ANGEL DE MUGLER', 'price' => '18,500 DZ', 'image' => 'parfum/bests/17.jpg' ],
        [ 'name' => 'La vie est belle', 'price' => '26,173 DZ', 'image' => 'parfum/bests/18.jpg' ],
        [ 'name' => 'TOM FORD BLACK ORCHID', 'price' => '30,800 DZ', 'image' => 'parfum/bests/19.jpg' ],
        [ 'name' => 'VERSACE Bright Crystal', 'price' => '13,000 DZ', 'image' => 'parfum/bests/20.jpg' ],
        [ 'name' => 'Michael Kors Gorgeous', 'price' => '8000 DZ', 'image' => 'parfum/floral/photo.jpg' ],
        [ 'name' => 'Rose Prick_TOM FORD', 'price' => '51,100 DZ', 'image' => 'parfum/floral/Rose prick.jpg' ],
        [ 'name' => 'Valentino', 'price' => '21,000 DZ', 'image' => 'parfum/floral/Valentino born in Roma.jpg' ],
        [ 'name' => "KAY ALI", "price" => "26,900 DZ", "image" => "parfum/floral/Vanilla 28.jpg"],
        [ 'name' => 'PRADA', 'price' => '15,900 DZ', 'image' => 'parfum/floral/برا.jpg' ],
        [ 'name' => 'اميرة العرب', 'price' => '3800 DZ', 'image' => 'parfum/floral/55.jpg' ],
        ]; ?>
            <?php foreach ($perfumes as $perfume): ?>
                <div class="Perfumes-card">
                    <div class="image-container"> 
                        <img src="<?= $perfume['image']; ?>" alt="<?= $perfume['name']; ?>" class="Products-image">
                        <button class="cart-icon">
                            <i class="fa fa-shopping-cart"></i> ADD TO CART
                        </button>
                    </div>
                    <div class="Perfumes-details">
                        <h2 class="Perfumes-name"><?= $perfume['name']; ?></h2>
                        <p class="price"><?= $perfume['price']; ?></p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i> 
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>
