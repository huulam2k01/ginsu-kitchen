<?php include '../check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
		table{
			color: white;
			font-weight: bold;
			border-collapse: collapse;
		}
		td{
			text-align: center;
		}
		a{
			text-decoration: none;
			color: #1fb8a8;
		}
	</style>
</head>
<body>
<?php
include '../connect.php';
$sql = "select hoa_don.*,user.ho_ten,user.sdt,user.dia_chi
from hoa_don join user on user.ma = hoa_don.ma_khach_hang
ORDER BY date(thoi_gian_mua) DESC";
$result = mysqli_query($connect,$sql);
?>
<h1 align="center" style="color: white">QUẢN LÝ HOÁ ĐƠN</h1>
<span style="margin-left: 570px"><a href="../common/trang_chu_admin.php"><button style="background-color: dodgerblue; font-size: 25px">Quay về trang Admin</button></a></span> 
	<br><br><br><br>
<table border="2" width="100%">
	<tr>
		<th>Thời gian</th>
		<th>Tình trạng</th>
		<th>Thông tin người nhận</th>
		<th>Thông tin người đặt</th>
		<th>Sửa tình trạng</th>
		<th>Xem</th>
	</tr>
	<?php foreach ($result as $each): ?>
		<tr>
			<td>
				<?php echo date_format(date_create($each['thoi_gian_mua']),'d-m-Y H:i:s') ?>
			</td>
			<td>
				<?php if( $each['tinh_trang']==1){
					echo "Đang chờ duyệt";
				}else if ($each['tinh_trang']==2){
					echo "Đang xử lí";
				}else if($each['tinh_trang']==3){
					echo "Đã hủy";
				}
				 ?>
			</td>
			<td>
				<?php echo $each['ten_nguoi_nhan'] ?><br>
				<?php echo $each['sdt_nguoi_nhan'] ?><br>
				<?php echo $each['dia_chi_nguoi_nhan'] ?>
			</td>
			<td>
				<?php echo $each['ho_ten'] ?><br>
				<?php echo $each['sdt'] ?><br>
				<?php echo $each['dia_chi'] ?>
			</td>
			<td>
				<?php if($each['tinh_trang']==1){ ?>
				<a style="color: green;" href="update_tinh_trang.php?ma=<?php echo $each['ma'] ?>&tinh_trang=2">Duyệt</a><br>
				<a style="color: #bd2020;" href="update_tinh_trang.php?ma=<?php echo $each['ma'] ?>&tinh_trang=3">Hủy</a><br>
			<?php }  ?>
			</td>
			<td>
				<a href="xem_chi_tiet_admin.php?ma=<?php echo $each['ma'] ?>">Xem </a>
			</td>

		</tr>

	<?php endforeach ?>
</table>
</body>
</html>