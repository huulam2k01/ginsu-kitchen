<?php
$ma_san_pham = $_GET['ma'];
$kieu = $_GET['kieu'];
session_start();

if(isset($_SESSION['basket'][$ma_san_pham])) {
	$_SESSION['basket'][$ma_san_pham]++;
}
else{
	$_SESSION['basket'][$ma_san_pham] = 1;
}
// print_r($_SESSION);
if($kieu =='item'){
	header("location:index.php#sp_$ma_san_pham");
}else if($kieu =='item_view'){
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

	
	
// }
// }