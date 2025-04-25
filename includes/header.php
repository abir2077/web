
<?php
if (!isset($BASE_PATH)) {
    $BASE_PATH = '';
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>



<link rel="stylesheet"href="/web/css/header.css">
<link rel="stylesheet"href="/web/css/style.css">

<header>
    
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <a href="#" class="logo">Parfumista<span>.</span></a>

        <nav class="navbar">
            <ul>
                <li><a href="/web/index.php">Home</a></li>
                <li><a href="#About">About</a></li>
                <li><a href="#Perfumes">Perfumes</a></li>
                <li class="dropdown">
                    <a href="#Categories">Categories</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                            <a href="#">By type</a>
                            <ul class="dropdown-menu">
                            <li><a href="<?= $BASE_PATH ?>products/products.php?category=floral">Floral Perfumes</a></li>
                            <li><a href="<?= $BASE_PATH ?>products/products.php?category=fruity">Fruity Perfumes</a></li>
                            <li><a href="<?= $BASE_PATH ?>products/products.php?category=oriental">Oriental Perfumes</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#">The best</a>
                            <ul class="dropdown-menu">
                                <li><a href="best-selling.php">Best-selling</a></li>
                                <li><a href="trending.php">Trending Perfumes</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="cont/concte03.html">Contact</a></li>
            </ul>
        </nav>

        <div class="icons">
          
        <?php
// جلب عدد المنتجات في السلة
    include('db.php'); // تأكد أن الاتصال بقاعدة البيانات تم
    $countResult = $conn->query("SELECT SUM(quantity) AS total FROM cart");
    $countRow = $countResult->fetch_assoc();
    $cartCount = $countRow['total'] ?? 0;
   ?>

 <div class="icons">
 <a href="/web/shooping/cart.php">
    <i class="fa fa-shopping-cart"></i>
    <span id="cart-count"><?=count($_SESSION['cart'])?></span>
</a>

 

      

            <a href="login/signup.html">
                <i class="fas fa-user"></i>
            </a>
            
            <div class="search-container">
              <input type="text" id="mainSearchInput" placeholder="ابحث عن عطر...">
              <div id="searchResults" class="search-results"></div>
          </div>
        </div>
    </header>