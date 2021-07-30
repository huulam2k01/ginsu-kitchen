<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GINSU</title>
	<style type="text/css">
		html{
			/*background: #c1cbdb;*/
		}
		#tong{
			background: #d9d5cc;
		}

		.menu{
			width: 100%;
			/*height: 87px;*/
			display: flex;
			background: #c1cbdb;
			position: fixed;
			z-index: 1;
			border: 4px solid black;
		}
		.menu .content1{
			width: 1300px;
			/*height: 100%;*/
			padding: 0px 0px;
			margin: 0 auto; 
			/*background: #c1cbdb; */
		}
		.gioi_thieu{
			width: 100%;
			/*height: 500px;*/
			display: flex;
			background: #d9d5cc;
		}
		.gioi_thieu .content2{
			width: 1300px;
			height: 100%;
			padding: 0px 0px;
			margin: 0 auto; 
			background: /*cyan*/ #d9d5cc;
		}
		.gioi_thieu .content2 .danh_muc{
			width: 17%;
			/*height: 100%; */
			background: /*yellow*/ #d9d5cc;
			float: left;
			padding-top: 87px;
		}		
		.gioi_thieu .content2 .slide_anh{
			width: 80%;
			/*height: 100%;*/
			background: /*purple*/ #d9d5cc;
			float: left;
			padding-top: 95px;
		}
		.san_pham{
			width: 100%;
			/*height: 900px;*/
			display: flex;
			/*background: #d9d5cc;*/
		}
		.san_pham .content3{
			width: 1200px;
			/*height: 100%;*/
			display: flex;
			padding: 0px 0px;
			margin: 0 auto; 
			background: /*cyan*/ #d9d5cc;
		}
		.san_pham .content3 .anh{
			width: 50%;
			height: 500px;
			padding: 0px 0px;
			margin: 0 auto;
			float: left;
			/*background: red;*/
		}
		.san_pham .content3 .thong_tin_sp{
			width: 50%;
			/*height: 815px;*/
			padding: 0px 0px;
			margin: 0 auto; 
			float: left;
			/*background: blue;*/
		}
		.san_pham .content3 .thong_tin_sp .ten{
			width: 100%;
			height: 70px;
			padding: 0px 0px;
			margin: 0 auto;
			color: #3690d9;
			/*background: pink;*/
		}
		.san_pham .content3 .thong_tin_sp .gia{
			width: 100%;
			height: 80px;
			padding: 0px 0px;
			margin: 0 auto; 
			color: #c43d3d;
			/*background: yellow;*/
		}
		.san_pham .content3 .thong_tin_sp .mo_ta{
			width: 100%;
			/*height: 500px;*/
			padding: 0px 0px;
			margin: 0 auto; 
			/*background: purple;*/
		}
		.thong_tin_them{
			width: 100%;
			/*height: 500px;*/
			display: flex;
			background: /*blue*/ #c1cbdb;
		}
		.thong_tin_them .content4{
			width: 1300px;
			height: 100%;
			padding: 0px 0px;
			margin: 0 auto; 
			background: /*green*/;
		}
		.main-btn{
			font-size: 20px;
			font-family: 'Pacifico';
			overflow: visible;
			border-radius: 10px;
			position: relative;
			padding-right: 50px;
			background-color: #ecfbff;
			border: 2px solid #a6e0ee;
			color: #fff;
			display: block;
			height: 60px;
			width: 200px;
			cursor: pointer;
			text-align:center;
			text-decoration:none;
			-webkit-transition: 0.8s ease-out;
			-moz-transition: 0.8s ease-out;
			transition: 0.8s ease-out;
			background: -webkit-linear-gradient(left top, #3378e8, #32c3e8);
			background: -o-linear-gradient(bottom right, #3378e8, #32c3e8);
			background: -moz-linear-gradient(bottom right, #3378e8, #32c3e8);
			background: linear-gradient(bottom right, #3378e8, #32c3e8);
			margin:20px 30px;
			margin-left: 100px;
		}
		.main-btn img{
			position: absolute;
			top: 13px;
			right: 25px;
			height: 30px;
			width: auto;
			transition: color 0.2s ease, background-color 0.2s ease, transform 0.3s ease;

		}
		.main-btn:hover .inside-img {
			-webkit-transform: rotateZ(720deg);
			-moz-transform: rotateZ(720deg);
			transform: rotateZ(720deg);
		}
		pre {
			white-space: pre-wrap;       /* Since CSS 2.1 */
			white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
			white-space: -pre-wrap;      /* Opera 4-6 */
			white-space: -o-pre-wrap;    /* Opera 7 */
			word-wrap: break-word;       /* Internet Explorer 5.5+ */
			font-family: "courier new", courier, monospace;
			font-size: 16px;
		}
		p.binh_luan{
			text-align: left;
			margin-left: 50px;
		}
		table{
			margin-left: 86px;
		}
	</style>
</head>
<body style="padding-left: 0px; padding-right: 0px">
	<?php 
	include'../Admin/connect.php';
	$ma = $_GET['ma'];
	$sql = "select * from item where ma = '$ma'";
	$result = mysqli_query($connect, $sql);
	$thu_muc_anh = '../image/';
	$dem = mysqli_num_rows($result);
	$sql_binh_luan = "select binh_luan.thoi_gian, binh_luan.noi_dung, user.ho_ten from binh_luan 
	join user on binh_luan.ma_khach_hang = user.ma 
	where ma_san_pham = '$ma'";
	$result_binh_luan = mysqli_query($connect, $sql_binh_luan);
	// die($sql_binh_luan);


	// $sql_nsx = "select ten as 'ten_nha_san_xuat' from nha_san_xuat where ma = '$ma'";
	// $result_nsx = mysqli_query($connect, $sql_nsx);
	// $each_nsx = mysqli_fetch_array($result_nsx);
	?>
	
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
		<?php
		if ($dem==0) { ?>
			<div class="san_pham">
				<div class="content3" style="margin: auto auto; display: block;">
					<p style="text-align: center;"><img src="../image/—Pngtree—commercial elements available for 404_5771809.png" alt="" height="300"></p>
					<h1 style="text-align: center;">THÔI TOANG RỒI !</h1>
					<h3 style="text-align: center;">Nội dung bạn đang tìm có vẻ như không tồn tại, hoặc đã được chuyển đi nơi khác, bạn có thể</h3> 
					<h3 style="text-align: center;">tham khảo các sản phẩm khác ở trang chủ của chúng tôi.
					</h3>
				</div>
			</div>			
		<?php }else{ ?>
			<div class="san_pham">
				<div class="content3">
					<?php foreach ($result as $each): ?>
						<div class="anh"><br><br>
							<img style="border: 3px solid black; object-fit:contain;" src="<?php echo $thu_muc_anh. $each['anh'] ?>" height="450" width="450"><br>
							<a href="add_to_basket.php?ma=<?php echo $each['ma'] ?>&kieu=item_view" class="main-btn"> <p style="margin-top: 12px;"> Thêm vào giỏ hàng </p><img src="../image/shopping_cart_empty-512.png" class="inside-img" />
							</a>
						</div>

						<div class="thong_tin_sp">
							<div class="ten"><br><br>
								<h2>
									<?php echo $each['ten'] ?>
								</h2>
							</div>
							<div class="gia">
								<h3><br><br>Giá: 
									<?php echo $each['gia'] ?> vnđ
								</h3>
							</div>
							<div class="mo_ta">
								<h3>Mô tả: <br></h3>
								<pre><?php echo $each['mo_ta'] ?></pre>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<form method="POST" action="binh_luan.php">
				<input type="hidden" name="ma_san_pham" value="<?php echo $ma ?>">
				<table>
					<tr>
						<td colspan="2"><h2>Đăng bình luận của bạn: </h2></td>
					</tr>
					<tr>
						<td><textarea name="binh_luan" required 
							rows="4" cols="77" style="font-size: 17px;"></textarea></td>
					</tr>
					<tr>
						<td style="padding-left: 687px;"><button style="font-size: 20px;">Đăng</button></td>
					</tr>
				</table>
			</form>
			<h2 style="margin-left: 86px;">Bình luận khác:</h2>
			<?php foreach ($result_binh_luan as $each_binh_luan): ?>
				<table >
					<tr>
						<td><p class="binh_luan" style="font-weight: bolder;font-size: 20px;"> 
							<?php echo $each_binh_luan['ho_ten'] ?> </p>
						</td>
						<td>
							<p class="binh_luan" style="margin-left: 0px;font-size: 13px;">
								<img src="image/toppng.com-clock-9pm-clock-9pm-clock-9pm-clock-icon-9-pm-881x881.png" alt="">
								<?php echo $each_binh_luan['thoi_gian'] ?> </p>
						</td>
					</tr>
					<table>
						<tr>
						<td style="width: 752px;">
							<p class="binh_luan" style="margin-left: 70px;"> 
								<?php echo $each_binh_luan['noi_dung'] ?> </p>
						</td>
					</tr>
					</table>
					
				</table>
			<?php endforeach ?>
			<br><br>
		<?php } ?>
		<div class="thong_tin_them">
			<div class="content4">
				<?php include'foot.php' ?>
			</div>
		</div>
	</div>
</body>
</html>