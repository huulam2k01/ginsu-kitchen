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
	<!-- <img src="https://bom.to/rn0rjYG" alt=""> -->
	<h1 align="center" style="color: white">Đây là khu vực quản lý nhân viên</h1>
	
	<span style="position: absolute; left: 540px"><a href="view_register_staff.php"><button style="background-color: dodgerblue; font-size: 25px">Thêm nhân viên</button></a></span> 

	<span style="position: absolute; left: 747px"><a href="../common/trang_chu_admin.php"><button style="background-color: dodgerblue; font-size: 25px">Quay về trang Admin</button></a></span> 
	<br><br><br><br>
	<?php 
	require '../connect.php';
	$sql = "select * from staff";
	$result = mysqli_query($connect,$sql);
	//Tìm kiếm
	$tim_kiem = '';
	if (isset($_GET['tim_kiem'])) {
		$tim_kiem = $_GET['tim_kiem'];
	}
	
	//Lấy tất cả nhân viên đang có
	$sql = "select staff.*
	from staff 
	where staff.ho_ten like '%$tim_kiem%'";
	$result = mysqli_query($connect,$sql);
	
	//Đếm tổng số nhân viên đang có
	$tong_so_staff = mysqli_num_rows($result);
	$so_staff_1_trang = 10;
	
	//Tính số trang cần phải hiển thị
	$tong_so_trang = ceil($tong_so_staff / $so_staff_1_trang);

	//Bỏ qua
	$trang_hien_tai = 1;
	if(isset($_GET['trang'])){
		$trang_hien_tai = $_GET['trang'];
	}
	$bo_qua = ($trang_hien_tai - 1) * $so_staff_1_trang;

	//Hiển thị nhân viên trên từng trang 1
	$sql = "$sql
	limit $so_staff_1_trang offset $bo_qua";
	$result = mysqli_query($connect,$sql);
	?>
	<form align="center" style="color: white; font-weight: bolder;">
		Tìm kiếm nhân viên: <input type="search" name="tim_kiem" value="<?php echo $tim_kiem ?>">
		<button type="submit">Tìm</button>
	</form>
	<h1 align="center" style="color: white">
		Hiện có <?php echo $tong_so_staff ?> nhân viên 
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
			<th>Họ Tên</th>
			<th>Ngày sinh</th>
			<th>SĐT</th>
			<th>Địa chỉ</th>
			<th>Email</th>
			<th>Giới tính</th>
			<th>Chức vụ</th>
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
					<?php echo $each['email'] ?>
				</td>
				<td>
					<?php if ($each['gioi_tinh']==0) {
						echo "Nữ";
					} else {
						echo "Nam";
					} ?>
				</td>
				<td>
					<?php if ($each['chuc_vu'] == 1) {
						echo "Nhân viên full time";
					} elseif ($each['chuc_vu'] == 2) {
						echo "Nhân viên part-time ca sáng (7h-12h)";
					} elseif ($each['chuc_vu'] == 3) {
						echo "Nhân viên part time ca chiều (13h-18h)"; 
					} elseif ($each['chuc_vu'] == 4) {
						echo "Nhân viên part_time ca tối (18h-22h)";
					} elseif ($each['chuc_vu'] == 5) {
						echo "Quản lí chi nhánh";
					} elseif ($each['chuc_vu'] == 6) {
						echo "Quản lí quận";
					}
					?>
				</td>
				<td>
					<a href="view_alter_staff.php?ma=<?php echo $each['ma'] ?>
					"style="text-decoration: none; color: #55eb34">Sửa</a>
				</td>
				<td>
					<a href="delete.php?ma=<?php echo $each['ma'] ?>
					"style="text-decoration: none; color: #f72828">Xoá</a>
				</td>
			</tr>
		<?php endforeach ?>
	</body>
	</html>