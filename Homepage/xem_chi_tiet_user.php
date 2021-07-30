<?php session_start() ?>
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
			url('../image/minimalist-landscape-mountains-city-b416.jpg');
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
		h1{
			color: white;
			font-weight: bolder;
			text-align: center;
		}
	</style>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
<?php
$ma = $_GET['ma'];
$ma_khach_hang = $_SESSION['ma'];
include '../admin/connect.php';
$sql = "select *, hoa_don.ma_khach_hang from hoa_don_chi_tiet join item on hoa_don_chi_tiet.ma_san_pham = item.ma join hoa_don on hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma where ma_hoa_don = '$ma' and ma_khach_hang = '$ma_khach_hang'";
// die($sql);
$result = mysqli_query($connect,$sql);
$thu_muc_anh ='../image/';
$tong_don = 0;
$tong = 0;
?>
	<h1>CHI TIẾT ĐƠN HÀNG</h1>
	<table border="2" width="100%">
		<tr>
			<th>Tên sản phẩm</th>
			<th>Ảnh</th>
			<th>Số lượng</th>
			<th>Giá</th>
			<th>Tổng</th>
			<!-- <th>Cái này bị lỗi cần sửa và cho thêm khách hàng xem đơn</th> -->
		</tr>
		<?php foreach ($result as $each): ?>
			<tr>
				<td>
					<?php echo $each['ten'] ?>
				</td>
				<td>
					<img height="100px" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
				</td>
				<td>
					<?php echo $each['so_luong'] ?>
				</td>
				<td>
					<?php echo $each['gia'] ?>
				</td>
				<td>
					<?php echo $tong = $each['gia'] * $each['so_luong'] ?>
					<?php $tong_don += $each['gia'] * $each['so_luong'] ?>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	<h1>
		<p style="color: white; float: right;">Tổng tiền : <?php echo $tong ?></p>
	</h1>
	<h2 style="text-align: center;">
		<a href="lich_su_mua_hang.php" style="text-decoration: none; color: white; float: left;" > <i class="icon-reply"></i> Quay lại </a> 
	</h2>
</body>
</html>
