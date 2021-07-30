<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
	$ma_slide = $_GET['ma_slide'];
	$thu_muc_anh = '../../image/';
	require '../connect.php';
	$sql = "select * from slide_show where ma_slide = '$ma_slide'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);

	?>
	<form method="post" action="process_update.php" enctype="multipart/form-data">
		<input type="hidden" name="ma_slide" value="<?php echo $ma_slide ?>">

		<br>
		<input type="hidden" name="anh_slide_cu" value="<?php echo $each['anh_slide'] ?>">
		<label>Ảnh slide show cũ:</label>
		<br>
		<img src="<?php echo $thu_muc_anh. $each['anh_slide'] ?>" height='200'>
		<br>
		<label for="anh_slide_moi">Hoặc chọn ảnh slide show mới:</label> 
		<br>
		<input type="file" name="anh_slide_moi" id="anh_slide_moi"> 
		<br>
		<button>Sửa</button>
	</form>
</body>
</html>