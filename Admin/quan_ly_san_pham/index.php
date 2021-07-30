<?php include '../check_admin.php' ?>
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
			url('../../image/Mountain Lake Sunset Landscape First Person View.jpg');
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

	//Tìm kiếm
	$tim_kiem = '';
	if (isset($_GET['tim_kiem'])) {
		$tim_kiem = $_GET['tim_kiem'];
	}
	
	//Lấy tất cả sản phẩm đang có
	$sql = "select item.*, nha_san_xuat.ten as 'ten_nha_san_xuat', danh_muc_san_pham.loai_san_pham as danh_muc_san_pham 
	from item 
	join nha_san_xuat ON nha_san_xuat.ma = item.ma_nha_san_xuat
	join danh_muc_san_pham ON danh_muc_san_pham.ma = item.ma_danh_muc_san_pham
	where item.ten like '%$tim_kiem%' or nha_san_xuat.ten like '%$tim_kiem%'
	ORDER BY item.ma DESC";
	$result = mysqli_query($connect,$sql);
	// die($sql);
	
	//Đếm tổng số sản phẩm đang có
	$tong_so_san_pham = mysqli_num_rows($result);
	$so_san_pham_1_trang = 5;
	
	//Tính số trang cần phải hiển thị
	$tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_1_trang);

	//Bỏ qua
	$trang_hien_tai = 1;
	if(isset($_GET['trang'])){
		$trang_hien_tai = $_GET['trang'];
	}
	$bo_qua = ($trang_hien_tai - 1) * $so_san_pham_1_trang;

	//Hiển thị sản phẩm trên từng trang 1
	$sql = "$sql
	limit $so_san_pham_1_trang offset $bo_qua";
	$result = mysqli_query($connect,$sql);

	?>
	<!-- <img src="https://bom.to/rn0rjYG" alt=""> -->
	<h1 align="center" style="color: white">Đây là khu vực quản lý sản phẩm</h1>
	
	<span style="position: absolute; left: 530px"><a href="view_insert.php"><button style="background-color: dodgerblue; font-size: 25px">Thêm sản phẩm</button></a></span> 

	<span style="position: absolute; left: 750px"><a href="../common/trang_chu_admin.php"><button style="background-color: dodgerblue; font-size: 25px">Quay về trang Admin</button></a></span> 
	<br><br><br><br>
	
	<form align="center" style="color: white; font-weight: bolder;">
		Tìm kiếm sản phẩm: <input type="search" name="tim_kiem" value="<?php echo $tim_kiem ?>">
		<button type="submit">Tìm</button>
	</form>
	<h1 align="center" style="color: white">
		Hiện có <?php echo $tong_so_san_pham ?> sản phẩm 
	</h1>
	<p align="center">
		<?php for ($i = 1; $i <=$tong_so_trang; $i++) { ?>
			<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>" style="color: white; font-weight: bolder; text-decoration: none; font-size: 30px">
				<?php echo $i ?>
			</a>
		<?php } ?>
	</p>
	<table width="100%" border="3" style="border-collapse: collapse; color: white">
		<tr>
			<th>Tên sản phẩm</th>
			<th>Giá tiền</th>
			<th>Mô tả sản phẩm</th>
			<th>Ảnh sản phẩm</th>
			<th>Nhà sản xuất</th>
			<th>Loại sản phẩm</th>
			<th>Sửa</th>
			<th>Xoá</th>
		</tr>
		<?php foreach ($result as $each): ?>
			<tr>
				<td>
					<?php echo $each['ten'] ?>
				</td>
				<td>
					<?php echo $each['gia'] ?>
				</td>
				<td>
					<?php echo $each['mo_ta'] ?>
				</td>
				<td>
					<img src="<?php echo $thu_muc_anh. $each['anh'] ?>" height='200'>
				</td>
				<td>
					<?php echo $each['ten_nha_san_xuat'] ?>
				</td>
				<td>
					<?php echo $each['danh_muc_san_pham'] ?>
				</td>

				<td>
					<a href="view_update.php?ma=<?php echo $each['ma'] ?>
					"style="text-decoration: none; color: #55eb34">Sửa</a>
				</td>
				<td>
					<a href="delete.php?ma=<?php echo $each['ma'] ?>
					"style="text-decoration: none; color: #f72828">Xoá</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	<p align="center">
		<?php for ($i=1; $i<=$tong_so_trang ; $i++) { ?>
			<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>" style="color: white; font-weight: bolder; text-decoration: none; font-size: 30px">
				<?php echo $i ?>
			</a>
		<?php } ?>
	</p>
</body>
</html>