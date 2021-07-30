<?php 
$ten_dang_nhap = $_POST['ten_dang_nhap'];
$mat_khau = $_POST['mat_khau'];

include '../../admin/connect.php';

$sql = "select * from user where ten_dang_nhap = '$ten_dang_nhap' and mat_khau = '$mat_khau'";
$result = mysqli_query($connect,$sql);

//Đếm số kết quả trả về
$so_ket_qua = mysqli_num_rows($result);

if ($so_ket_qua == 1) {
	session_start();
	$each = mysqli_fetch_array($result);
	$_SESSION['ma'] = $each['ma'];
	$_SESSION['ho_ten'] = $each['ho_ten'];
	$_SESSION['check_user'] = $each['check_user'];

	if (isset($_POST['remember'])) {
		setcookie('ma',$each['ma'],time() + 60*60*24*60);
		setcookie('ten_dang_nhap',$each['ten_dang_nhap'],time() + 60*60*24*60);
	}
	
	header("location:../index.php");
}
else{
	header("location:view_login.php?error=Tên đăng nhập hoặc mật khẩu sai, vui lòng nhập lại");
}