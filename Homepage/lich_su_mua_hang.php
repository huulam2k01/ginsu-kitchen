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
			url('../image/wallpapertip_minimalist-nature-wallpaper_810410.jpg');
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
			text-align: center;
			color: white;
			font-weight: bolder;
		}
		a{
			text-decoration: none;
			color: #1fb8a8;
		}
	</style>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
	<?php if (isset($_SESSION['ma'])) { ?>
	<?php
	$ma_khach_hang = $_SESSION['ma'];
	include '../Admin/connect.php';
	$sql = "select * from hoa_don where hoa_don.ma_khach_hang = '$ma_khach_hang'
	ORDER BY date(thoi_gian_mua) DESC";
	$result = mysqli_query($connect,$sql);
	?>
		
	<h1>LỊCH SỬ MUA HÀNG</h1>
	<table border="2" width="100%">
		<tr>
			<th>Thời gian</th>
			<th>Tình trạng</th>
			<th>Thông tin người nhận</th>
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
					<a href="xem_chi_tiet_user.php?ma=<?php echo $each['ma'] ?>">Xem </a>
				</td>

			</tr>

		<?php endforeach ?>
	</table>
	<h2 style="text-align: center;">
		<a href="check_basket.php" style="text-decoration: none; color: white" > <i class="icon-reply"></i> Quay lại mua hàng </a> 
	</h2>
	<?php } else header('location:user/view_login.php') ?>
</body>
</html>