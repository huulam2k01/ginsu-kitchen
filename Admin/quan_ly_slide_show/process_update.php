<?php 
$ma_slide = $_POST['ma_slide'];
$anh = $_FILES['anh_slide_moi'];
if ($anh['size']==0) {
	$ten_anh = $_POST['anh_side_cu'];
}
else{
	$thu_muc_anh = '../../image/';
	$duoi_anh = explode('.', $anh['name'])[1];
	$ten_anh = time() . '.' . $duoi_anh;
	$duong_dan_anh = $thu_muc_anh. $ten_anh;

	move_uploaded_file($anh['tmp_name'], $duong_dan_anh);
}

require '../connect.php';

$sql = "update slide_show
set  
anh_slide = '$ten_anh'
where
ma_slide = '$ma_slide'";
mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');
// print_r($sql);
// die($sql);

