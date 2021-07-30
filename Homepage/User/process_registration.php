<?php 
$ho_ten = $_POST['ho_ten'];
$ngay_sinh = $_POST['ngay_sinh'];
$sdt = $_POST['sdt'];
$dia_chi = $_POST['dia_chi'];
$ten_dang_nhap = $_POST['ten_dang_nhap'];
$mat_khau = $_POST['mat_khau'];

$connect = mysqli_connect('localhost','root','','ginsu_kitchen');
mysqli_set_charset($connect,'utf8');
$sql_check = "SELECT ho_ten FROM user WHERE ten_dang_nhap='$ten_dang_nhap'";
if(mysqli_num_rows(mysqli_query($connect,$sql_check)) > 0){
	mysqli_close($connect);
	header('location:view_registration.php?loi=Tên đăng nhập đã bị trùng');
	exit();
}
else{
	$sql = "insert into user(ho_ten,ngay_sinh,sdt,dia_chi,ten_dang_nhap,mat_khau)
	values ('$ho_ten','$ngay_sinh','$sdt','$dia_chi','$ten_dang_nhap','$mat_khau')";

	mysqli_query($connect,$sql);
	mysqli_close($connect);
	header('location:view_login.php');
}
