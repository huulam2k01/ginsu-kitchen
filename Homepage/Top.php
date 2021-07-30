<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	#tong_top{
		width: 100%;
		height: 87px;
		
	}
	.trai{
		width: 50%;
		height: 87px;
		float: left;
	}

	.phai{
		width: 50%;
		height: 87px;
		float: left;
	}

	.logo{
		float: left;
		height: 100%;
		width: 20%;
		padding: 10px 10px;
		
	}
	.search{
		height: 100%;
		width: 70%;
		float: left;
		padding-top: 23px;
		padding-left: 23px;

		
	}
	.search_bar{
		height: 100%;
		width: 70%;
		float: left;
		border-radius: 25px;
		padding: 20px 20px;
	}

	.find{
		height: 100%;
		width: 20%;
		float: left;

	}
	.login{
		width: 25%;
		height: 100%;
		float: left;
	}

	.basket{
		width: 25%;
		height: 100%;
		float: left;
	}

	.question{
		width: 25%;
		height: 100%;
		float: left;
	}

	.phone{
		width: 25%;
		height: 100%;
		float: left;
	}
	
	.dropdown_contact {
		display: none;
		position: absolute;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		padding: 12px 16px;
		z-index: 1;
	}

	.phone:hover .dropdown_contact {
		display: block;
	}
</style>
<body>
	<?php 
	include '../Admin/connect.php';
	//Tìm kiếm
	$tim_kiem = '';
	if (isset($_GET['tim_kiem'])) {
		$tim_kiem = $_GET['tim_kiem'];
	}
	// $sql_nsx = "select ten as 'ten_nha_san_xuat' from nha_san_xuat";
	// $result_nsx = mysqli_query($connect, $sql_nsx);
	// $each_nsx = mysqli_fetch_array($result_nsx);
	?>
	<div id="tong_top">
		<div class="trai">
			<a href="index.php">
				<div class="logo">
					<img src="../image/Ginsu-1024x561.png" width="105" height="60" style="padding-left: 40px">
				</div>
			</a>
			

			<div class="search" id="tim_kiem">
				<form action="index.php">
					<input type="search" name="tim_kiem" placeholder="Tìm kiếm sản phẩm..." style="width: 360px; height: 40px; outline: none;" class="search_bar" value="<?php echo $tim_kiem ?>">
					<input type="image" src="../image/iconfinder_search_1608826.png" style="height: 40px; width: 40px;">
				</form>
			</div>
		</div>

		<div class="phai">
			<div class="login">
				<?php if (empty($_SESSION['ho_ten'])) { ?>
					<a href="user/view_login.php"><img src="../image/toppng.com-person-icon-white-icon-980x994.png" style="width: 40px;height: 40px; padding-top: 20px;"></a>
				<?php } else{ ?>
					<a href="user_information.php"><img src="../image/toppng.com-person-icon-white-icon-980x994.png" style="width: 40px;height: 40px; padding-top: 20px;"></a>
				<?php } ?>
				


				
				<?php if (isset($_SESSION['ho_ten'])) { ?>
					<span style="position: absolute;white-space: nowrap; width: 130px; overflow: hidden;text-overflow: ellipsis; padding-top: 20px">Xin chào <?php echo $_SESSION['ho_ten']; ?></span>
				<?php } ?>
				<?php if (!isset($_SESSION['ma'])) { ?>
					<a href="User/view_login.php" style="text-decoration: none; color: black">
						<span class="text_menu" style="position: absolute; padding-top: 30px; padding-left: 10px"> Đăng nhập </span>
					</a>
				<?php } ?>
				<?php if (isset($_SESSION['ma'])) { ?>
					<a href="User/log_out.php" style="text-decoration: none; color: black">
						<span class="text_menu" style="position: absolute; top: 45px; padding-left: 10px"> Đăng xuất </span>
					</a>
				<?php } ?>
				
			</div>

			<div class="basket">
				<?php if (empty($_SESSION['ma'])) {?>
					<a href="User/view_login.php" style="text-decoration: none; color: black">
						<img src="../image/PinClipart.com_aloe-vera-clipart_125189.png" style="width: 40px; height: 40px; padding-top: 20px; padding-left: 10px">
						<span class="text_menu" style="position: absolute; padding:30px 20px">Giỏ hàng</span>
					</a>
				<?php } else{ ?>
					<a href="check_basket.php" style="text-decoration: none; color: black">
						<img src="../image/PinClipart.com_aloe-vera-clipart_125189.png" style="width: 40px; height: 40px; padding-top: 20px; padding-left: 10px">
						<span class="text_menu" style="position: absolute; padding:30px 20px">Giỏ hàng</span>
					</a> 
				<?php } ?>
			</div>

			<div class="question"> 
				<a href="lich_su_mua_hang.php" style="text-decoration: none; color: black">
					<img src="../image/task-sheet.png" alt="" height="40" style="width: 40px;height: 40px; padding-top: 20px; padding-left: 10px">
					<span class="text_menu" style="position: absolute; padding:30px 26px"> Lịch sử <br> mua hàng </span>
				</a>
			</div>

			<div class="phone">
				<img src="../image/NicePng_phone-symbol-png_2239246.png" style="width: 40px; height: 40px; padding-top: 20px; padding-left: 10px">
				<span class="text_menu" style="position: absolute; padding:30px 20px">Liên hệ</span> <br>
				<span class="dropdown_contact" style="position: absolute; margin-top: 12px">1900100 thấy</span>
			</div>
		</div>
	</div>
</body>
</html>