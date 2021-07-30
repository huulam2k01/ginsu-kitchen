<?php 
$anh = $_FILES['anh'];

$thu_muc_anh = '../../image/';

$duoi_anh = explode('.', $anh['name'])[1];
$ten_anh = time() . '.' . $duoi_anh;

$duong_dan_anh = $thu_muc_anh. $ten_anh;
move_uploaded_file($anh['tmp_name'], $duong_dan_anh);

include '../connect.php';

$sql = "insert into slide_show(anh_slide)
values ('$ten_anh')";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');
// print_r($sql);
// die();
