<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
	$ma = $_GET['ma'];
	require '../connect.php';
	$sql = "select * from user where ma = '$ma'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
	?>
	<form method="post" action="process_alter_client.php">
		<input type="hidden" name="ma" value="<?php echo $ma ?>">

		<label for="ho_ten">Nhập tên khách hàng:</label> <br>
		<input name="ho_ten" type="text" id="ho_ten" value="<?php echo $each['ho_ten'] ?>">
		<br>

		<label for="ngay_sinh"> Nhập ngày sinh:</label> <br>
		<input name="ngay_sinh" type="date" id="ngay_sinh" value="<?php echo $each['ngay_sinh'] ?>">
		<br>

		<label for="sdt">Nhập sđt:</label> <br>
		<input name="sdt" type="number" id="sdt" value="<?php echo $each['sdt'] ?>">
		<br>

		<label for="dia_chi">Nhập địa chỉ:</label> <br>
		<input name="dia_chi" type="text" id="dia_chi" value="<?php echo $each['dia_chi'] ?>">
		<br>

		<label for="ten_dang_nhap">Nhập tên đăng nhập:</label> <br>
		<input name="ten_dang_nhap" type="text" id="ten_dang_nhap" value="<?php echo $each['ten_dang_nhap'] ?>">
		<br>
		
		<label for="mat_khau">Nhập mật khẩu :)) :</label> <br>
		<input name="mat_khau" type="text" id="mat_khau" value="<?php echo $each['mat_khau'] ?>">
		<br>
		<button>Sửa</button>
	</form>
</body>
</html>