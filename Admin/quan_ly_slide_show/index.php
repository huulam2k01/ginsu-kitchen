<?php require '../check_admin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		body{
			background:
			/* top, transparent black, faked with gradient */ 
			linear-gradient(
				rgba(0, 0, 0, 0.7), 
				rgba(0, 0, 0, 0.7)
				),
			/* bottom, image */
			url(https://bom.to/rn0rjYG);
			background-size: cover;
		}
		td{
			text-align: center;
		}
	</style>
</head>
<body>
	<?php 
	$thu_muc_anh = '../../image/';

	require '../connect.php';
	
	//Lấy tất cả ảnh đang có
	$sql = "select slide_show.* 
	from slide_show";
	$result = mysqli_query($connect,$sql);

	?>
	<!-- <img src="https://bom.to/rn0rjYG" alt=""> -->
	<h1 align="center" style="color: white">Đây là khu vực quản lý slide show</h1>
	
	<span style="position: absolute; left: 530px"><a href="view_insert.php"><button style="background-color: dodgerblue; font-size: 25px">Thêm ảnh</button></a></span> 

	<span style="position: absolute; left: 750px"><a href="../common/trang_chu_admin.php"><button style="background-color: dodgerblue; font-size: 25px">Quay về trang Admin</button></a></span> 
	<br><br><br><br>

	<table width="100%" border="3" style="border-collapse: collapse; color: white">
		<tr>
			<th>Ảnh slide show</th>
			<th>Sửa</th>
			<th>Xoá</th>
		</tr>
		<?php foreach ($result as $each): ?>
			<tr>
				<td>
					<img src="<?php echo $thu_muc_anh. $each['anh_slide'] ?>" height='200'>
				</td>
				<td>
					<a href="view_update.php?ma_slide=<?php echo $each['ma_slide'] ?>
					"style="text-decoration: none; color: #55eb34">Sửa</a>
				</td>
				<td>
					<a href="delete.php?ma_slide=<?php echo $each['ma_slide'] ?>
					"style="text-decoration: none; color: #f72828">Xoá</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>