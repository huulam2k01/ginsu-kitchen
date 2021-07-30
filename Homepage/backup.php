<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GINSU (´▽`ʃ♡ƪ)</title>

	<style>
		#tong{
			width: 100%;
			height: 2000px;
			background-color: #d9d5cc;
			/*background-image: url('image/4s.jpg');*/
		}

		#tong > .tren {
			width: 100%;
			height: 8%;
			position: fixed;
			z-index: 1;
			/*background-color: blue;*/
		}

		#tong > .giua{
			width: 100%;
			height: 35.5%;
			/*background: red;*/
		}

		#tong > .giua > .trai{
			width: 20%;
			height: 100%;
			float: left;
			/*background: yellow;*/
		}
		#tong > .giua > .phai{
			width: 80%;
			height: 100%;
			float: left;
			/*background: purple;*/
		}
		#tong > .duoi{
			width: 100%;
			height: 60%;
			background: red;
		}
		#tong > .duoi_1{
			width: 100%;
			height: 70px;
			background: #c1cbdb;
		}
		#tong > .duoi_cung{
			width: 100%;
			height: 20%;
			background: #c1cbdb;
		}
		
	</style>

</head>

<body>
	<div id="tong">
		<div class="tren">
			<div class="top">
				<?php include 'top.php'; ?>
			</div>
		</div>

		<div class="giua">
			<div class="trai">
				<div class="menu" style="position: absolute; padding-left: 105px; padding-top: 87px">
					<?php include 'menu.php' ?>
				</div>
			</div>
			
			<div class="phai">
				<div class="promo" style="position: absolute; padding-top: 87px; ">
					<?php include 'slide_show/slide_show.php' ?>
				</div>
			</div>
		</div>

		<div class="duoi">
			<div class="item">
				<?php include '../item_information/index.php' ?>
			</div>
		</div>

		<div class="duoi_1"></div>

		<div class="duoi_cung">
			<div class="foot">
				<?php include 'foot.php'; ?>
			</div>
		</div>
	</div>
</body>
</html>