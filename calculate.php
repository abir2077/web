<?php
session_start(); 

$products = [
    1 => ["name" => "عطر شانيل رقم 5", "price" => 350, "image" => "chanel_no5.jpg"],
    2 => ["name" => "عطر ديور جادور", "price" => 400, "image" => "dior_jadore.jpg"],
    3 => ["name" => "عطر قوتشي بلوم", "price" => 380, "image" => "gucci_bloom.jpg"]
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
