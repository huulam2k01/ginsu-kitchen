<?php
$ma_san_pham = $_GET['ma'];

session_start();

	$_SESSION['basket'][$ma_san_pham]++;
//yêu cầu giới hạn số lượng ở đây
print_r($_SESSION['basket']);
header("location:check_basket.php");