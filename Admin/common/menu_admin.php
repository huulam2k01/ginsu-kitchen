<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	#tong{
		background-color: #c1cbdb;
		height: 87px;	
		
	}

	#tong > .logo{
		height: 100%;
		width: 20%;
		float: left;
		position: relative;
	}
	
	#tong > .login{
		height: 100%;
		width: 20%;
		float: left;
	}
	
	#tong > .basket{
		height: 100%;
		width: 20%;
		float: left;
	}
	
	#tong > .client{
		height: 100%;	
		width: 20%;
		float: left;
	}
	
	#tong > .staff{
		height: 100%;	
		width: 20%;
		float: left;
	}
	

</style>
<body>
	<div id="tong">
		<div class="logo">
			<img src="../../image/Ginsu-1024x561.png" width="100" height="60" style="position: absolute; top: 10px; left: 40px">
		</div>
		
		<div class="login">
			<?php if ($_SESSION['cap_do']==1) { ?>
				
				<a href="../quan_ly_admin/index.php" style="text-decoration: none; color: black; position: absolute; top: 30px; left: 359px">
					<span class="text_menu">  Quản lý Admin </span>
				</a>
				<!-- <a href="../quan_ly_admin/index.php" style="text-decoration: none; color: black; position: absolute; top: 15px; left: 390px">
					<span class="text_menu">  Thêm mới Admin </span>
				</a>  -->
			<?php } ?>
			
			<img src="../../image/toppng.com-person-icon-white-icon-980x994.png" style="width: 40px;height: 40px; position: absolute; top: 30px">
			<a href="log_out_admin.php" style="text-decoration: none; color: black; position: absolute; top: 50px; left: 360px">
				<span class="text_menu">  Đăng xuất </span>
			</a> 
			

		</div>
		
		<div class="basket">
			<a href="../quan_ly_san_pham/index.php" style="text-decoration: none; color: black; position: absolute; top: 30px; left: 600px">
				<img src="../../image/PinClipart.com_aloe-vera-clipart_125189.png" alt="" style="width: 40px;height: 40px">
				<span class="text_menu"> Quản lý sản phẩm </span>
			</a>   
		</div>

		<div class="client"> 
			<a href="../quan_ly_khach_hang/index.php" style="text-decoration: none; color: black; position: absolute; top: 30px">
				<img src="../../image/toppng.com-question-mark-icon-png-980x980.png" alt="" style="width: 40px;height: 40px">
				<span class="text_menu"> Quản lý khách hàng </span>
			</a> 
		</div>

		<div class="staff">
			<a href="../quan_ly_slide_show/index.php" style="text-decoration: none; color: black; position: absolute; top: 30px">
				<img src="../../image/NicePng_phone-symbol-png_2239246.png" alt="" style="width: 40px;height: 40px">
				<span class="text_menu">Quản lý slide show</span>
			</a>
		</div>

	</div>
</body>
</html>