<?php 
session_start();
$ma_khach_hang = $_SESSION['ma'];
$ma_san_pham = $_POST['ma_san_pham'];
$noi_dung = $_POST['binh_luan'];
$thoi_gian_binh_luan = date("Y-m-d H:i:s");
include'../admin/connect.php';
if (isset($_SESSION['ma'])) {
$sql = "insert into binh_luan(ma_khach_hang, ma_san_pham, noi_dung, thoi_gian) values ('$ma_khach_hang','$ma_san_pham','$noi_dung','$thoi_gian_binh_luan')";
mysqli_query($connect,$sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);
// die($sql);
}
else {
	header('location:user/view_login.php');
}