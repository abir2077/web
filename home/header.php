<?php
  if (!isset($BASE_PATH)) {
    $BASE_PATH = '';
  }

  include('../connt.php');
  $countResult = $conn->query("SELECT SUM(quantity) AS total FROM panier");
  $countRow = $countResult->fetch_assoc();
  $cartCount = $countRow['total'] ?? 0;
?>

<!-- روابط Bootstrap و FontAwesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- CSS مخصص -->
<style>
  .navbar {
    background-color: #fff;
    padding: 10px 30px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  }

  .navbar-brand.logo {
    font-size: 29px;
    font-weight: bold;
    color: #8B0000 !important;
    text-decoration: none ;
    margin-right: 30px;
  }

  .navbar-nav .nav-link {
    color: #8B0000 !important;
    font-weight: bold;
    padding: 8px 15px;
  }

  .navbar-nav .nav-link:hover {
    color: #600006 !important;
  }

  
  .d-flex.gap-3 > * {
  margin-left: 10px;
}

  /* شريط البحث */
  .search-container input {
    border: 1px solid #ccc;
    background-color: #fff;
    color: #333;
    width: 150px;
    height: 25px;
    border-radius: 50px;
    padding: 0 15px;
  }

  .search-container input:focus {
    box-shadow: 0 0 8px 2px #8B0000;
    border-color: #8B0000;
    outline: none;
  }
</style>

<header>
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <a class="navbar-brand logo" href="#">Parfumista</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="/web/index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#About">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#Perfumes">Perfumes</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-toggle="dropdown">Categories</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= $BASE_PATH ?>products/products.php?category=floral">Floral Perfumes</a>
            <a class="dropdown-item" href="<?= $BASE_PATH ?>products/products.php?category=fruity">Fruity Perfumes</a>
            <a class="dropdown-item" href="<?= $BASE_PATH ?>products/products.php?category=oriental">Oriental Perfumes</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../best-selling.php">Best-selling</a>
            <a class="dropdown-item" href="../trending.php">Trending Perfumes</a>
          </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="../cont/concte3.html">Contact</a></li>
      </ul>

      <div class="d-flex align-items-center">
        <!-- شريط البحث -->
        <div class="search-container mr-3">
          <input type="text" id="mainSearchInput" class="form-control form-control-sm" placeholder="ابحث عن عطر...">
        </div>
        

        <div class="d-flex align-items-center gap-3">
        <div id="searchResults" class="row mt-4"></div>
  <!-- زر السلة -->
  <a href="#" class="btn btn-custom-red d-flex align-items-center justify-content-center" style="padding: 6px 14px; border-radius: 30px;">
    <i class="fas fa-shopping-cart" style="color: white; font-size: 16px;"></i>
  </a>

  <!-- زر تسجيل الدخول -->
  <a href="/web/تسجيل/signup.html" class="btn btn-custom-red d-flex align-items-center justify-content-center" style="padding: 6px 14px; border-radius: 30px;">
    <i class="fas fa-user" style="color: white; font-size: 16px;"></i>
  </a>
</div>
      </div>
    </div>
  </nav>
</header>

<!-- سكريبتات Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('mainSearchInput');
  const searchResults = document.getElementById('searchResults');

  searchInput.addEventListener('input', function() {
    const query = searchInput.value.trim();

    if (query.length > 0) {
      fetch('search.php?q=' + encodeURIComponent(query))
        .then(response => response.text())
        .then(data => {
          searchResults.innerHTML = data;
        })
        .catch(error => {
          console.error('حدث خطأ في البحث:', error);
        });
    } else {
      searchResults.innerHTML = '';
    }
  });
});
</script>