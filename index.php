<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parfumista</title>

    <!-- روابط الخطوط وأيقونات Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">


    <!-- تنسيقات CSS -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@400;700&family=Poppins:wght@300;400;600&display=swap");

        :root {
            --red: #800007;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: '29LT-Zarid-Display', serif;
            outline: none;
            border: none;
            text-decoration: none;
            transition: .2s linear;
        }

        html {
            font-size: 62.5%;
            scroll-behavior: smooth;
            scroll-padding-top: 6rem;
            overflow-x: hidden;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 9%;
            display: flex;
            background: white;
            z-index: 1000;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
        }

        header .logo {
            font-size: 3rem;
            color: var(--red);
            font-family: 'PlayfairDisplay';
            font-weight: bolder;
        }

        header .logo span {
            color: var(--red);
        }

        .navbar a {
            font-size: 2rem;
            padding: 0 1.5rem;
            color: var(--red);
        }

        .navbar a:hover {
            color: #600006;
        }

        section {
            padding: 2rem 9%;
        }

        .heading {
            text-align: center;
            font-size: 4rem;
            color: black;
            padding: 1rem;
            margin: 5rem 0;
            background: rgba(255, 51, 153, 0.05);
        }

        .heading span {
            color: var(--red);
        }

        .btn {
            display: inline-block;
            margin-top: 1rem;
            border-radius: 0px;
            background: var(--red);
            color: white;
            padding: .9rem 3.5rem;
            cursor: pointer;
            font-size: 1.7rem;
        }

        .btn:hover {
            background: #600006;
        }

        .icons-container {
            display: flex;
            justify-content: space-around;
            margin: 2rem 0;
        }

        .icons img {
            width: 50px;
            margin-bottom: 1rem;
        }

        .icons h3 {
            font-size: 2rem;
            margin-bottom: .5rem;
        }

        .icons span {
            font-size: 1.5rem;
            color: gray;
        }

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
</head>
<body>

    <!-- الهيدر مع قائمة التنقل -->
    <header>
        <a class="logo" href="#">Parfumista <span>Store</span></a>
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#Home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#About">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Perfumes">Perfumes</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="products/products.php?category=floral">Floral Perfumes</a></li>
                            <li><a class="dropdown-item" href="products/products.php?category=fruity">Fruity Perfumes</a></li>
                            <li><a class="dropdown-item" href="products/products.php?category=oriental">Oriental Perfumes</a></li>
                            <li><a class="dropdown-item" href="best-selling.php">Best-selling</a></li>
                            <li><a class="dropdown-item" href="trending.php">Trending Perfumes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="cont/concte3.html">Contact</a></li>
                </ul>
            </div>
        </nav>
        <div class="icons d-flex align-items-center gap-3">

        <!-- داخل <header> -->
<div class="icons d-flex align-items-center gap-3">

<style>
  #mainSearchInput:focus {
    border-color: #8B0000 !important; /* أحمر قاتم */
    box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.4); /* إشعاع أحمر */
  }
</style>

<!-- زر البحث -->
<div class="search-container position-relative">
    <input type="text" id="mainSearchInput" class="form-control form-control-sm rounded-pill px-3" placeholder="ابحث عن عطر..." style="width: 180px;">
    <div id="searchResults" class="search-results position-absolute"></div>
</div>

<!-- زر السلة -->
<a href="#" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 34px; height: 34px">
    <i class="fas fa-shopping-cart"></i>
</a>

<!-- زر تسجيل الدخول (أيقونة مستخدم باللون الأحمر القاتم) -->
<a href="تسجيل/signup.html" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center" 
   style="width: 34px; height: 34px; background-color: wh ; color: white;">
    <i class="fas fa-user"></i>
</a>


</div>

    </header>
    <div class="hero-section d-flex align-items-center justify-content-start text-white" style="background-image: url('parfum/100.png'); background-size: cover; background-position: center; height: 100vh; width: 100%;">
    <div class="container text-start ps-5">
        <h1 style="color: #8B0000; font-size: 4rem; font-weight: 700; font-family: 'Playfair Display', serif;">Luxury Women's Perfumes</h1>
        <h4 style="color: #8B0000; font-weight: 500; font-size: 1.6rem; font-family: 'Poppins', sans-serif;">Shine with Your Fragrance</h4>
        <p style="color: #8B0000; font-size: 1.1rem; max-width: 600px; font-family: 'Poppins', sans-serif;">
            Discover a world of elegance and allure. Our website offers an exquisite collection of luxury perfumes and international brands designed just for you.
        </p>
        <a href="#shop" class="btn btn-danger btn-lg rounded-pill px-5 shadow-sm mt-3">Shop now</a>
    </div>
</div>



    <!-- قسم "من نحن" -->
    <section class="About" id="About">
        <div class="container">
            <h1 class="heading"><span>About</span> us</h1>
            <div class="row">
                <div class="col-md-6">
                    <video src="vii.mp4" loop autoplay muted class="w-100"></video>
                </div>
                <div class="col-md-6">
    <h3 style="font-size: 2.5rem; font-weight: 700; font-family: 'Playfair Display', serif; color: #8B0000;">Why choose us?</h3>
    <p style="font-size: 1.1rem; font-family: 'Poppins', sans-serif; color: #333; max-width: 500px;">
        Experience the elegance of Dior J'adore! A fragrance that embodies sophistication and luxury with its exquisite floral blend.
    </p>
    <a href="#" class="btn btn-danger btn-sm rounded-pill px-4 shadow-sm mt-2">Learn more</a>
</div>

            </div>
        </div>
    </section>

    <!-- قسم العطور -->
    <section class="Perfumes" id="Perfumes">
        <div class="container">
            <h1 class="heading">Latest <span>Perfumes</span></h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/cc.jpg" alt="Perfume">
                        <h2>VALAYA</h2>
                        <p class="price">52,000 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/5.jpg" alt="Perfume">
                        <h2>KAY ALI</h2>
                        <p class="price">20,369 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/6.jpg" alt="Perfume">
                        <h2>Lancome Idole</h2>
                        <p class="price">55,000 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/44.jpg" alt="Perfume">
                        <h2>Jour d Hermes</h2>
                        <p class="price">18,000 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/bla.jpg" alt="Perfume">
                        <h2>BLACK OPIUM</h2>
                        <p class="price">13,500 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/ch.jpg" alt="Perfume">
                        <h2>CHANEL</h2>
                        <p class="price">12,000 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/co.jpg" alt="Perfume">
                        <h2>GUCCI BLOOM</h2>
                        <p class="price">25,000 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/di.jpg" alt="Perfume">
                        <h2>J adore</h2>
                        <p class="price">19,900 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/33.jpg" alt="Perfume">
                        <h2>CHANCE CHANEL</h2>
                        <p class="price">14,000 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/تنزيل.jpg" alt="Perfume">
                        <h2>COCO CHANEL</h2>
                        <p class="price">32,000 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/يارا.jpg" alt="Perfume">
                        <h2>يارا</h2>
                        <p class="price">5900 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Perfumes-card">
                        <img src="parfum/3.jpg" alt="Perfume">
                        <h2>Maison Francis Paris</h2>
                        <p class="price">78,000 DZ</p>
                        <div class="rating">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                        </div>
                        <button class="btn">Add to Cart</button>
                    </div>
                </div>
                <!-- كرر الكود للعطور الأخرى -->
            </div>
        </div>
    </section>

    <!-- روابط JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
    const searchInput = document.getElementById('mainSearchInput');
    const perfumeCards = document.querySelectorAll('.col-md-4');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.toLowerCase();

        perfumeCards.forEach(card => {
            const perfumeName = card.querySelector('h2').textContent.toLowerCase();
            card.style.display = perfumeName.includes(query) ? 'block' : 'none';
        });
    });
</script>

</body>
</html>