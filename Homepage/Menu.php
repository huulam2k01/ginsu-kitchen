<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	.vertical-menu {
		width: 200px;
		padding-left: 30px;
	}

	.vertical-menu a {
		background-color: #eee;
		color: black;
		display: block;
		padding: 9px;
		text-decoration: none;
	}

	.vertical-menu a:hover {
		background-color: #ccc;
	}

	.vertical-menu a.active {
		background-color: #c1cbdb;
		color: white;
	}
	.active{
		font-weight: bolder;
	}
</style>
<?php  
include'../admin/connect.php';
$sql = "select * from danh_muc_san_pham";
$result_danh_muc_san_pham = mysqli_query($connect,$sql);
?>
<body>
	<div class="vertical-menu">
		<a href="index.php" class="active" style="color: black"> <img src="../image/list-icon-png-3.jpg" style="width: 15px; height: 15px"> DANH MỤC SẢN PHẨM </a> 
		<?php foreach ($result_danh_muc_san_pham as $each_danh_muc_san_pham): ?>
			<a href="index.php?ma_danh_muc_san_pham=<?php echo $each_danh_muc_san_pham['ma'] ?>">
				<?php echo $each_danh_muc_san_pham['loai_san_pham'] ?>
			</a>
		<?php endforeach ?>

		<!-- <a href="#">Bình đựng nước</a>
		<a href="#">Nồi, bộ nồi</a>
		<a href="#">Chảo chống dính</a>
		<a href="#">Dao, kéo, thớt</a>
		<a href="#">Kệ nhà bếp</a>
		<a href="#">To, chén, dĩa</a>
		<a href="#">Ly, bộ ly</a>
		<a href="#">Bộ ấm trà</a>
		<a href="#">Dụng cụ làm bánh</a>
		<a href="#">Hộp đựng thực phẩm</a>
		<a href="#">Đũa muỗng</a>
		<a href="#">Phụ kiện bếp</a> -->
	</div>
</body>
</html>