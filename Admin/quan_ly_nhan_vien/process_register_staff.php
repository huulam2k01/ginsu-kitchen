<?php

$ho_ten = $_POST['ho_ten'];
$ngay_sinh = $_POST['ngay_sinh'];
$sdt = $_POST['sdt'];
$dia_chi = $_POST['dia_chi'];
$email = $_POST['email'];
$gioi_tinh = $_POST['gioi_tinh'];
$chuc_vu = $_POST['chuc_vu'];

$connect = mysqli_connect('localhost','root','','ginsu_kitchen');
mysqli_set_charset($connect,'utf8');


$sql = "insert into staff(ho_ten,ngay_sinh,sdt,dia_chi,email,gioi_tinh,chuc_vu)
values ('$ho_ten','$ngay_sinh','$sdt','$dia_chi','$email','$gioi_tinh','$chuc_vu')";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');
// die();