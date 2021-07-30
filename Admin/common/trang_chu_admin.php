<?php include '../check_admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
	<style>
		body{
			background: #d9d5cc; /* fallback for old browsers */
			background: -webkit-linear-gradient(right, #d9d5cc, #c2bdb4);
			background: -moz-linear-gradient(right, #d9d5cc, #c2bdb4);
			background: -o-linear-gradient(right, #d9d5cc, #c2bdb4);
			background: linear-gradient(to left, #d9d5cc, #c2bdb4);
			font-family: "Roboto", sans-serif;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}

		.welcome_text{
			text-align: center;
		}
		/*.button {
			background-color: #c1cbdb;
			border: none;
			color: black;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}*/

		p{
			font-weight: bold;
		}
		
	</style>
</head>

<body>
	<div class="menu">
		<?php include('menu_admin.php') ?>
	</div>

	<?php if ($_SESSION['cap_do']==0) { ?>
		<h1 class="welcome_text">ĐÂY LÀ TRANG ADMIN</h1>
	<?php } ?>

	<?php if ($_SESSION['cap_do']==1) { ?>
		<h1 class="welcome_text">ĐÂY LÀ TRANG SUPER ADMIN</h1>
	<?php } ?>
	<div class="welcome_text">
		<h2 align="center">Xin chào <?php echo $_SESSION['ten']; ?> </h2>
	</div>
	<div align="center">
		<a href="../ql_hoa_don" style="text-decoration: none; color: black;">
			<p><img src="../../image/task-sheet.png" alt="" height="40">
			Quản lý hoá đơn</p>
		</a>
	</div>
	
</body>
</html>