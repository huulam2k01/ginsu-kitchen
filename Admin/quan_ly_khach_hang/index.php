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
	</style>
</head>
<body>
	<!-- <img src="https://bom.to/rn0rjYG" alt=""> -->
	<h1 align="center" style="color: white">Đây là khu vực quản lý khách hàng</h1>
	
	<!-- <span style="position: absolute; left: 530px"><a href="view_register_staff.php"><button style="background-color: dodgerblue; font-size: 25px">Thêm khách hàng</button></a></span> --> 

	<span style="position: absolute; left: 650px"><a href="../common/trang_chu_admin.php"><button style="background-color: dodgerblue; font-size: 25px">Quay về trang Admin</button></a></span> 
	<br><br><br><br>
	<?php 
	require '../connect.php';
	$sql = "select * from user";
	$result = mysqli_query($connect,$sql);

	//Tìm kiếm
	$tim_kiem = '';
	if (isset($_GET['tim_kiem'])) {
		$tim_kiem = $_GET['tim_kiem'];
	}
	
	//Lấy tất cả khách hàng đang có
	$sql = "select user.*
	from user 
	where user.ho_ten like '%$tim_kiem%' or user.ten_dang_nhap like '%$tim_kiem%'";
	$result = mysqli_query($connect,$sql);
	
	//Đếm tổng số khách hàng đang có
	$tong_so_user = mysqli_num_rows($result);
	$so_user_1_trang = 10;
	
	//Tính số trang cần phải hiển thị
	$tong_so_trang = ceil($tong_so_user / $so_user_1_trang);

	//Bỏ qua
	$trang_hien_tai = 1;
	if(isset($_GET['trang'])){
		$trang_hien_tai = $_GET['trang'];
	}
	$bo_qua = ($trang_hien_tai - 1) * $so_user_1_trang;

	//Hiển thị khách hàng trên từng trang 1
	$sql = "$sql
	limit $so_user_1_trang offset $bo_qua";
	$result = mysqli_query($connect,$sql);
	?>
	<form align="center" style="color: white; font-weight: bolder;">
		Tìm kiếm người dùng: <input type="search" name="tim_kiem" value="<?php echo $tim_kiem ?>">
		<button type="submit">Tìm</button>
	</form>
	<h1 align="center" style="color: white">
		Hiện có <?php echo $tong_so_user ?> người dùng 
	</h1>
	<p align="center">
		<?php for ($i = 1; $i <=$tong_so_trang; $i++) { ?>
			<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>" style="color: white; font-weight: bolder; text-decoration: none; font-size: 30px">
				<?php echo $i ?>
			</a>
		<?php } ?>
	</p>
	<table width="100%" border="1" style="border-collapse: collapse; color: white">
		<tr>
			<th>Họ tên</th>
			<th>Ngày sinh</th>
			<th>SĐT</th>
			<th>Địa chỉ</th>
			<th>Tên đăng nhập</th>
			<th>Mật khẩu</th>
			<th>Sửa</th>
			<th>Xoá</th>
		</tr>
		<?php foreach ($result as $each): ?>
			<tr>
				<td>
					<?php echo $each['ho_ten'] ?>
				</td>
				<td>
					<?php echo $each['ngay_sinh'] ?>
				</td>
				<td>
					<?php echo $each['sdt'] ?>
				</td>
				<td>
					<?php echo $each['dia_chi'] ?>
				</td>
				<td>
					<?php echo $each['ten_dang_nhap'] ?>
				</td>
				<td>
					<?php echo $each['mat_khau'] ?>
				</td>
				<td>
					<a href="view_alter_client.php?ma=<?php echo $each['ma'] ?>
					"style="text-decoration: none; color: #55eb34">Sửa</a>
				</td>
				<td>
					<a href="delete.php?ma=<?php echo $each['ma'] ?>
					"style="text-decoration: none; color: #f72828">Xoá</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>