<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="post" action="process_insert.php" enctype="multipart/form-data">
		<br>
		<label for="anh">Ảnh sản phẩm:</label> 
		<input type="file" name="anh" id="anh" required="" accept="image/*">
		<br>
		<br>
		<button>Thêm</button>
	</form>
</body>
</html>