<?php include 'User/check_user.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GINSU</title>
	<style type="text/css">

		#tong{
			width: 100%;
			/*height: 4000px;*/
			background: #d9d5cc;
		}

		.menu{
			width: 100%;
			/*height: 79px;*/
			display: flex;
			background: #c1cbdb;
			position: fixed;
			z-index: 1;
			border: 4px solid black;
		}
		.menu .content1{
			width: 1200px;
			display: flex;
			padding: 0px 0px;
			margin: 0 auto; 
			/*background: #c1cbdb; */
		}
		.gioi_thieu{
			width: 100%;
			/*height: 650px;*/
			display: flex;
			background: #d9d5cc;
		}
		.gioi_thieu .content2{
			width: 1300px;
			display: flex;
			padding: 0px 0px;
			margin: 0 auto; 
			background: /*cyan*/ #d9d5cc;
		}
		.gioi_thieu .content2 .danh_muc{
			width: 17%;
			/*height: 100%; */
			background: /*yellow*/ #d9d5cc;
			float: left;
			padding-top: 88px;
		}		
		.gioi_thieu .content2 .slide_anh{
			width: 80%;
			/*height: 100%;*/
			background: /*purple*/ #d9d5cc;
			float: left;
			padding-top: 88px;
		}
		.san_pham{
			width: 100%;
			background: #d9d5cc;
			display: flex;
		}
		.san_pham .content3{
			width: 1350px;
			height: auto;
			padding: 0px 0px;
			margin: 0 auto; 
			background: /*cyan*/ #d9d5cc;
		}
		.thong_tin_them{
			width: 100%;
			/*height: 500px;*/
			display: flex;
			background: /*blue*/ #c1cbdb;
		}
		.thong_tin_them .content4{
			width: 1300px;
			/*height: 100%;*/
			padding: 0px 0px;
			margin: 0 auto; 
			background: /*green*/;
		}
	</style>
</head>
<body style="padding-left: 0px; padding-right: 0px">
	<div id="tong">
		<div class="menu">
			<div class="content1"> <?php include'top.php' ?> </div>
		</div>
		<div class="gioi_thieu">
			<div class="content2">
				<div class="danh_muc">
					<?php include'menu.php' ?>
				</div>
				<div class="slide_anh">
					<?php include'slide_show/slide_show.php' ?>
				</div>
			</div>
		</div>
		<div class="san_pham">
			<div class="content3">
				<?php include'item.php' ?>
			</div>
		</div>
		<div class="thong_tin_them">
			<div class="content4">
				<?php include'foot.php' ?>
			</div>
		</div>
	</div>
</body>
</html>