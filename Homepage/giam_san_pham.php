<?php
$ma_san_pham = $_GET['ma'];

session_start();


if($_SESSION['basket'][$ma_san_pham]>1){
	$_SESSION['basket'][$ma_san_pham]--;
}
else{
	unset($_SESSION['basket'][$ma_san_pham]);
}

print_r($_SESSION['basket']);
header("location:check_basket.php");