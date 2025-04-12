<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'الزائرة';
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

  <style>
    .account-container {
      position: relative;
      display: inline-block;
      margin-left: 15px;
      color: #800000;
      cursor: pointer;
    }

    .account-tooltip {
      display: none;
      position: absolute;
      top: 130%;
      right: 0;
      background-color: white;
      color: #800000;
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      font-size: 14px;
      white-space: nowrap;
      z-index: 10;
    }

    .account-container:hover .account-tooltip {
      display: block;
    }

    .icons {
      display: flex;
      align-items: center;
      gap: 15px;
    }
  </style>
</head>
<body>
  <header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>
    <a href="#" class="logo">Parfumista<span>.</span></a>

    <nav class="navbar">
      <ul>
        <li><a href="#Home">Home</a></li>
        <li><a href="#About">About</a></li>
        <li><a href="#Perfumes">Perfumes</a></li>
        <li class="dropdown">
          <a href="#Categories">Categories</a>
          <ul class="dropdown-menu">
            <li class="dropdown">
              <a href="#">By type</a>
              <ul class="dropdown-menu">
                <li><a href="floral.html">Floral Perfumes</a></li>
                <li><a href="fruity.html">Fruity Perfumes</a></li>
                <li><a href="oriental.html">Oriental Perfumes</a></li>
                <li><a href="gourmand.html">Gourmand Perfumes</a></li> 
              </ul>
            </li>
            <li class="dropdown">
              <a href="#">The best</a>
              <ul class="dropdown-menu">
                <li><a href="best-selling.html">Best-selling</a></li>
                <li><a href="trending.html">Trending Perfumes</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#Contact">Contact</a></li>
      </ul>
    </nav>

    <div class="icons">
      <a href="#" class="fas fa-shopping-cart"></a>

      <div class="account-container">
        <i class="fas fa-user"></i>
        <div class="account-tooltip">
          مرحبا بيك <?php echo htmlspecialchars($username); ?> 🌸<br>
          واش تنديري اليوم؟
        </div>
      </div>

      <a href="#" class="fas fa-search"></a>
    </div>
  </header>

  <!-- باقي الصفحة من بعد -->

</body>
</html>
