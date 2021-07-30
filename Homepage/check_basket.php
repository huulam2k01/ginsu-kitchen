<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style>
		body{
			margin: 0 auto;
		}
		#tong_trang_gio_hang{
			background: #d9d5cc;
		}
		.menu_gio_hang_container{
			width: 100%;
			display: flex;
			background: #c1cbdb;
			position: fixed;
			z-index: 1;
			border: 4px solid black;

		}
		.menu_gio_hang_container .menu_gio_hang{
			width: 1200px;
			padding: 0px 0px;
			margin: 0 auto; 

		}
		.gio_hang_container{
			width: 100%;
			display: flex;
			
		}
		.gio_hang_container .gio_hang{
			width: 1400px;
			padding: 10px 60px;
			margin: 0 auto; 
			padding-top: 30px;
		}
		.thong_tin_ca_nhan_container{
			width: 100%;
			display: flex;
		}
		.thong_tin_ca_nhan_container .thong_tin_ca_nhan{
			width: 800px;
			padding: 10px 200px;
			margin: 0 auto; 
		}
		.thong_tin_them_gio_hang_container{
			width: 100%;
			display: flex;
			background: #c1cbdb;
		}
		.thong_tin_them_gio_hang_container .thong_tin_them_gio_hang{
			width: 1300px;
			padding: 0px 0px;
			margin: 0 auto;
		}
		input[type=number]{
			width: 245px;
		}
		.error{
			color: red;
		}
	</style>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
	<?php 
	include '../Admin/connect.php';
	$thu_muc_anh = '../image/';
	$tong_tien = 0;
	?>
	<div id="tong_trang_gio_hang">
		<div class="menu_gio_hang_container">
			<div class="menu_gio_hang">
				<?php include 'top.php'; ?>
			</div>
		</div>
		<?php if (empty($_SESSION['basket'])) { ?>
			<div class="gio_hang_container">
				<div class="gio_hang">
					<p align="center"><img src="../image/empty-cart.png">
						<br><br><br>
						<h2 style="text-align: center;"><a href="lich_su_mua_hang.php" style="text-decoration: none; color: black"><img src="../image/task-sheet.png" alt="" height="20">Lịch sử mua hàng</a></h2>
						<br>
						<br>
						<h2 style="text-align: center;">
							<a href="index.php" style="text-decoration: none; color: #5671e8" > <i class="icon-reply"></i> Quay lại mua hàng </a> 
						</h2>
						<br>
						<br></p>
					</div>
				</div>
			<?php }else{ ?>

				<div class="gio_hang_container">
					<div class="gio_hang">
						<h1 align="center" style="margin-top: 88px"> Giỏ hàng </h1>
						<h1 style="float: right;"><a href="lich_su_mua_hang.php" style="text-decoration: none; color: black"><img src="../image/task-sheet.png" alt="" height="40">Lịch sử mua hàng</a></h1>
						<table width="100%" style="border-collapse: collapse; border: 2px solid black;">
							<tr>
								<th width="49%" style="border-collapse: collapse; border: 2px solid black; background-color: white">Tên sản phẩm</th>
								<th width="15%" style="border-collapse: collapse; border: 2px solid black; background-color: white">Ảnh</th>
								<th style="border-collapse: collapse; border: 2px solid black; background-color: white">Số lượng</th>
								<th style="border-collapse: collapse; border: 2px solid black; background-color: white">Giá</th>
								<th style="border-collapse: collapse; border: 2px solid black; background-color: white">Tổng</th>
								<th style="border-collapse: collapse; border: 2px solid black; background-color: white">Xóa</th>		
							</tr>
							<?php foreach ($_SESSION['basket'] as $ma_san_pham => $so_luong): ?>
								<?php 
								$sql = "select *from item where ma = '$ma_san_pham'";
								$result = mysqli_query($connect,$sql);
								$each = mysqli_fetch_array($result);
								?>
								<tr>
									<td align="center" style="border-collapse: collapse; border: 2px solid black;">
										<?php echo $each['ten'] ?>
									</td>
									<td align="center" style="border-collapse: collapse; border: 2px solid black;">
										<img height="100" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
									</td>
									<td align="center" style="border-collapse: collapse; border: 2px solid black;">
										<p style="font-size: +22px">
											<a style="text-decoration: none;" href="giam_san_pham.php?ma=<?php echo $ma_san_pham ?>" >
												<img src="../image/clipart22589931.png" width="15" height="13">
											</a>
											<?php echo $so_luong ?>
											<a style="text-decoration: none;" href="tang_san_pham.php?ma=<?php echo $ma_san_pham ?>">
												<img src="../image/clipart2258993.png" width="13" height="13">
											</a>
										</p>
									</td>
									<td align="center" style="border-collapse: collapse; border: 2px solid black;">
										<?php echo $each['gia'] ?>
									</td>
									<td align="center" style="border-collapse: collapse; border: 2px solid black;">
										<?php echo $each['gia'] * $so_luong?>
										<?php $tong_tien += $each['gia'] * $so_luong ?>
									</td>
									<td align="center" style="border-collapse: collapse; border: 2px solid black;">
										<a style="color: red" href="xoa_san_pham_gio_hang.php?ma=<?php echo $ma_san_pham ?>">
											Xóa
										</a>
									</td>
								</tr>
							<?php endforeach ?>
						</table>
						<h2 style="float: left;">
							<a href="index.php"> <i class="icon-reply"></i> Quay trở lại trang chủ </a> 
						</h2>
						<h2 style="float: right;">
							Tổng tiền: <?php echo $tong_tien ?>
						</h2>
					</div>
				</div>
				<div class="thong_tin_ca_nhan_container">
					<div class="thong_tin_ca_nhan">
						<?php
						$ma = $_SESSION['ma'];
						$sql = "select * from user where ma = '$ma'";
						$result = mysqli_query($connect,$sql);
						$each = mysqli_fetch_array($result);
						?>
						<form action="process_dat_hang.php" method="post">
							<table  style="border: 2px solid black; margin: 10 auto; width: 600px;" align="center">
								<tr>
									<td colspan="3"><h1 align="center">Thông tin người nhận</h1></td>
								</tr>
								<tr>
									<td width="20%" align="center">Tên </td>
									<td><input type="text" name="ten_nguoi_nhan" id="name" value="<?php echo $each['ho_ten'] ?>" size="33"></td>
									<td><span class="error" id="name_error"></span></td>
								</tr>
								<tr>
									<td width="20%" align="center">SĐT</td>
									<td><input type="number" name="sdt_nguoi_nhan" id="sdt" value="<?php echo $each['sdt'] ?>"></td>
									<td><span class="error" id="sdt_error"></span></td>
								</tr>
								<tr>
									<td width="20%" align="center">Địa chỉ</td>
									<td><input required="" type="text" name="dia_chi_nguoi_nhan" value="<?php echo $each['dia_chi'] ?>" size="33"></td>
								</tr>
								<tr>
									<td style="height: 70px" colspan="2" align="center"><button style="font-size: 23px;" type="submit" onclick="return xac_nhan()">Đặt hàng</button></td>
								</tr>
							</table>
						</form>
						<br>
						<br>
						<br>
						<br>
						<br>
					</div>
				</div>
			<?php } ?>
			<div class="thong_tin_them_gio_hang_container">
				<div class="thong_tin_them_gio_hang">
					<?php include 'foot.php'; ?>
				</div>
			</div>
		</div>
		<script>
			function xac_nhan() {
				var check_error = false ;

				var name = document.getElementById('name').value;
				var name_regex = /^(?:[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪ][a-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,6}\s?)+$/;
				if (name_regex.test(name)) {
					document.getElementById('name_error').innerHTML='';
				}
				else{
					document.getElementById('name_error').innerHTML=' *Vui lòng nhập tên có dấu và viết hoa chữ cái đầu.';
					check_error=true;
				}

				var phone_num =document.getElementById('sdt').value;
				var phone_num_regex = /^0[0-9]{9,10}$/;
				if (phone_num_regex.test(phone_num)) {
					document.getElementById('sdt_error').innerHTML='';
				}
				else{
					document.getElementById('sdt_error').innerHTML=' *Vui lòng điền số điện thoại của bạn.';
					check_error = true;
				}

				if(check_error){
					return false;
				}
			}
		</script>
	</body>
	</html>