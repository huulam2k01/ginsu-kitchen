<?php 

$ma_san_pham = $_GET['ma_san_pham'];

session_start();
unset($_SESSION['basket'][$ma_san_pham]);


header('location:check_basket.php');