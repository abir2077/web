

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floral Perfumes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
include('home/header.html'); ?>


    <!-- Header -->
    

    <!-- Content -->
    <section class="Perfumes">
        <h1 class="heading home-heading"> Floral <span>Perfumes</span></h1>
        <div class="Perfumes-container">
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
