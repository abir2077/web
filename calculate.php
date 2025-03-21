<?php
session_start(); 

$products = [
   1 => ["name" => " Bvlgari Splendida Tubereuse Mystique", "price" => 350, "image" => "chanel_no5.jpg"],
    2 => ["name" => " Lancome Tresor Midnight Roseعطر", "price" => 400, "image" => "dior_jadore.jpg"],
    3 => ["name" => " Dolce & Gabbana Pour Femme Intense", "price" => 380, "image" => "gucci_bloom.jpg"],
    4 => ["name" => " Givenchy L'interdit Rouge", "price" => 390, "image" => "chanel_no5.jpg"],
    5 => ["name" => " Doir Addict ", "price" => 500, "image" => "dior_jadore.jpg"],
    6 => ["name" => " Tom Ford Velvet Orchid", "price" => 480, "image" => "gucci_bloom.jpg"],
    7 => ["name" => " Swiss Arabian Layali ", "price" => 650, "image" => "chanel_no5.jpg"],
    8 => ["name" => " Doir Hypnotic Poison", "price" => 460, "image" => "dior_jadore.jpg"],
    9 => ["name" => " Guerlain Shalimar", "price" => 300, "image" => "gucci_bloom.jpg"],
   10 => ["name" => "Mugler Alien Essence Absolue", "price" => 600, "image" => "dior_jadore.jpg"],
   11 => ["name" => " Amouage Honour Woman", "price" => 360, "image" => "gucci_bloom.jpg"],
   12 => ["name" => " Mainson Francis Kurkdijan Oud Satin Mood", "price" => 370, "image" => "chanel_no5.jpg"],
   13 => ["name" => " Guerlain Santal Royal ", "price" => 200, "image" => "dior_jadore.jpg"],

   14 => ["name" => " Valentino Voce Viva Intensa ", "price" => 380, "image" => "gucci_bloom.jpg"],
   15 => ["name" => " Kilian Love Don't Be shy ", "price" => 400, "image" => "dior_jadore.jpg"],
   16 => ["name" => " Gucci Flora Gorgeous Jasmine  ", "price" => 600, "image" => "dior_jadore.jpg"], 
   17 => ["name" => " YSL Libre Intense ", "price" => 500, "image" => "dior_jadore.jpg"],   
   18 => ["name" => " Maison Francis Kurkdijan Baccarat Rouge 540 ", "price" => 450, "image" => "dior_jadore.jpg"],
   19 => ["name" => " Partums de Marly Delina  ", "price" => 250, "image" => "dior_jadore.jpg"],

   20 => ["name" => " Victorias Secret Bombshell", "price" => 290, "image" => "dior_jadore.jpg"],
   21 => ["name" => " Juliette Has a Gun Pear Lnc  ", "price" => 320, "image" => "dior_jadore.jpg"],
   22 => ["name" => " Nina Ricci Nina ", "price" => 340, "image" => "dior_jadore.jpg"],
   23 => ["name" => " Jimmy Choo Illicit ", "price" => 440, "image" => "dior_jadore.jpg"],
   24 => ["name" => " Escada Cherey In Japan ", "price" => 450, "image" => "dior_jadore.jpg"],
   25 => ["name" => " Giorgio Armani My Way ", "price" => 460, "image" => "dior_jadore.jpg"],
   26 => ["name" => " Marc Jacobs Daisy Eau So Fresh  ", "price" => 600, "image" => "dior_jadore.jpg"],
   27 => ["name" => " Dolce &Gabbana Light Blue ", "price" => 500, "image" => "dior_jadore.jpg"],

   28 => ["name" => "Lancome Idole", "price" => 700, "image" => "dior_jadore.jpg"],
   29 => ["name" => "Elie Saab Le Parfum", "price" => 520, "image" => "dior_jadore.jpg"],
   30 => ["name" => "Byredo Blanche ", "price" => 630, "image" => "dior_jadore.jpg"],
   31 => ["name" => "Narciso Rodriguez For Her", "price" => 320, "image" => "dior_jadore.jpg"],
   32 => ["name" => "Michael Kors Gorgeous", "price" => 650, "image" => "dior_jadore.jpg"],
   33 => ["name" => "Diptyque Eau Rose", "price" => 420, "image" => "dior_jadore.jpg"],
   34 => ["name" => "Hermés Jour d'Hermés", "price" => 440, "image" => "dior_jadore.jpg"],
   35 => ["name" => "Bvlgari Rose Goldea", "price" => 430, "image" => "dior_jadore.jpg"],

]; 

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']); 
    if (isset($products[$product_id])) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity']++; 
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $products[$product_id]['name'],
                'price' => $products[$product_id]['price'],
                'image' => $products[$product_id]['image'],
                'quantity' => 1
            ];
        }
    }
}

if (isset($_POST['remove_id'])) {
    $remove_id = intval($_POST['remove_id']);
    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }
}

if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
}
?>
