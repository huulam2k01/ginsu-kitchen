<?php
$ma = $_POST['ma'];
$ho_ten = $_POST['ho_ten'];
$ngay_sinh = $_POST['ngay_sinh'];
$sdt = $_POST['sdt'];
$dia_chi = $_POST['dia_chi'];
$email = $_POST['email'];
$gioi_tinh = $_POST['gioi_tinh'];
$chuc_vu = $_POST['chuc_vu'];

require '../connect.php';

$sql = "update staff 
set
ho_ten = '$ho_ten',
ngay_sinh = '$ngay_sinh',
sdt = '$sdt',
dia_chi = '$dia_chi',
email = '$email',
gioi_tinh = '$gioi_tinh',
chuc_vu = '$chuc_vu'
where
ma = '$ma'
";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');
// print_r($sql);
// die();