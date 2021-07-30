<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		body {
			font-family: sans-serif;
			background: /*#1a1a1a*/ white;
			/*height: 600px;*/
			
			justify-content: center;
			align-items: start;
			padding: 0px 20px; 
		}

		#tong{
			width: 100%;
			/*height: 2186px;*/
		}
		.tung_san_pham{
			float: left;
			width: 257px;
			/*height: 299px;*/
			padding: 10px 10px;
			padding-top: 30px;
			margin: 25px 25px;
			text-align: center;
			border: 5px outset black;
		}
		/*.tung_san_pham .text_bg{
			width: 100%;
			height: 120px;
			background-image: url("https://i.pinimg.com/originals/4e/51/3f/4e513f0b5d875bb4dfe982a4785d140e.gif");
			background-size: center;

			}*/
			.bot{
				clear: left ;
			}
		</style>
		<!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	</head>
	<body>
		<?php
		include'../admin/connect.php';
		$thu_muc_anh = '../image/';

	//Lấy tất cả sản phẩm đang có
		if (!isset($_GET['ma_danh_muc_san_pham'])){
			$sql_sp = "select item.*, nha_san_xuat.ten as 'ten_nha_san_xuat' 
			from item
			join nha_san_xuat ON nha_san_xuat.ma = item.ma_nha_san_xuat
			where item.ten like '%$tim_kiem%' or nha_san_xuat.ten like '%$tim_kiem%'";
			$result_sp = mysqli_query($connect,$sql_sp);
		}

	//Hiển thị theo danh mục sản phẩm
		else{
			$sql_sp = "select item.* from item";
			$ma_danh_muc_san_pham = $_GET['ma_danh_muc_san_pham'];
			$sql_sp .= " where ma_danh_muc_san_pham = '$ma_danh_muc_san_pham'";
			$result_sp = mysqli_query($connect,$sql_sp);
		}

	//Đếm tổng số sản phẩm đang có
		$tong_so_san_pham = mysqli_num_rows($result_sp);
		$so_san_pham_1_trang = 8;

	//Tính số trang cần phải hiển thị
		$tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_1_trang);

	//Bỏ qua
		$trang_hien_tai = 1;
		if(isset($_GET['trang'])){
			$trang_hien_tai = $_GET['trang'];
		}
		$bo_qua = ($trang_hien_tai - 1) * $so_san_pham_1_trang;

	//Hiển thị sản phẩm trên từng trang 1
		$sql_tung_sp = "$sql_sp
		limit $so_san_pham_1_trang offset $bo_qua";
		$result_tung_sp = mysqli_query($connect,$sql_tung_sp);
		?>
		<div id="tong">
			<div>
				<p align="center">
					<?php for ($i = 1; $i <=$tong_so_trang; $i++) { ?>
						<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>" style="color: black; font-weight: bolder; text-decoration: none; font-size: 30px">
							<?php echo $i ?>
						</a>
					<?php } ?>
				</p>
			</div>
			<?php foreach ($result_tung_sp as $each_sp): ?>
				<a href="item_view.php?ma=<?php echo $each_sp['ma'] ?>" style="color: black; text-decoration: none;">
					<div class="tung_san_pham" id="sp_<?php echo $each_sp['ma'] ?>">
						<img style="border: 3px solid black; object-fit:contain;" src="<?php echo $thu_muc_anh. $each_sp['anh'] ?>" height="200" width="200">
						<p style="text-align: center; white-space: nowrap; /*width: 130px;*/ overflow: hidden;overflow-x: hidden; overflow-y: hidden;text-overflow: ellipsis;-webkit-line-clamp: 2; -webkit-box-orient: vertical;">
							<?php echo $each_sp['ten'] ?>
						</p>


						<h3 style="color: red">
							<?php echo $each_sp['gia'] ?> vnđ
						</h3>

						<p>
							<?php if(isset($_SESSION['ho_ten'])){ ?>
								<a style="color: #1E90FF" href="add_to_basket.php?ma=<?php echo $each_sp['ma'] ?>&kieu=item">Thêm vào giỏ hàng<i class="icon-shopping-cart"></i></a>
							<?php } ?>
						</p>
					<!-- <div class="text_bg">

					</div> -->
				</div>
			</a>
		<?php endforeach ?>
	</div>
	<div class="bot">
		<p align="center">
			<?php for ($i = 1; $i <=$tong_so_trang; $i++) { ?>
				<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>" style="color: black; font-weight: bolder; text-decoration: none; font-size: 30px">
					<?php echo $i ?>
				</a>
			<?php } ?>
		</p>
	</div>
</body>
</html>