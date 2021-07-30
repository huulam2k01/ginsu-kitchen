<?php
$ma = $_POST['ma'];
$ho_ten = $_POST['ho_ten'];
$ngay_sinh = $_POST['ngay_sinh'];
$sdt = $_POST['sdt'];
$dia_chi = $_POST['dia_chi'];
$ten_dang_nhap = $_POST['ten_dang_nhap'];
$mat_khau = $_POST['mat_khau'];


require '../connect.php';

$sql = "update user
set
ho_ten = '$ho_ten',
ngay_sinh = '$ngay_sinh',
sdt = '$sdt',
dia_chi = '$dia_chi',
ten_dang_nhap = '$ten_dang_nhap',
mat_khau = '$mat_khau'
where
ma = '$ma'
";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');
