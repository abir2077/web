<?php
session_start();
//حتى هذا

if (isset($_SESSION['cart'])) {
    echo count($_SESSION['cart']);
} else {
    echo 0;
}
