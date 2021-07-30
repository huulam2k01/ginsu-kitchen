<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
	$ma = $_GET['ma'];
	$thu_muc_anh = '../../image/';
	require '../connect.php';
	$sql_sp = "select * from item where ma = '$ma'";
	$result_sp = mysqli_query($connect,$sql_sp);
	$each_sp = mysqli_fetch_array($result_sp);
	$sql_nsx = "select * from nha_san_xuat";
	$result_nsx = mysqli_query($connect,$sql_nsx);

	$sql_danh_muc = "select * from danh_muc_san_pham";
	$result_danh_muc = mysqli_query($connect,$sql_danh_muc);
	?>
	<form method="post" action="process_update.php" enctype="multipart/form-data">
		<input type="hidden" name="ma" value="<?php echo $ma ?>">
		<label for="ten">Tên sản phẩm: <span class="error" id="ten_error"></span></label> 
		<br>
		<input type="text" name="ten" id="ten" value="<?php echo $each_sp['ten'] ?>">
		<br>
		<label for="gia">Giá sản phẩm: <span class="error" id="gia_error"></span></label> 
		<br>
		<input type="number" name="gia" id="gia" value="<?php echo $each_sp['gia'] ?>">
		<br>
		<label for="mo_ta">Mô tả sản phẩm: <span class="error" id="mo_ta_error"></span></label>
		<br>
		<textarea name="mo_ta" id="mo_ta"><?php echo $each_sp['mo_ta'] ?></textarea>
		<br>
		<input type="hidden" name="anh_cu" value="<?php echo $each_sp['anh'] ?>">
		<label>Ảnh sản phẩm cũ:</label>
		<br>
		<img src="<?php echo $thu_muc_anh. $each_sp['anh'] ?>" height='200'>
		<br>
		<label for="anh_moi">Hoặc chọn ảnh mới cho sản phẩm:</label> 
		<br>
		<input type="file" name="anh_moi" id="anh_moi"> 
		<br>
		<label for="ma_nha_san_xuat">Nhà sản xuất:</label>
		<br>
		<select name="ma_nha_san_xuat" id="ma_nha_san_xuat">
			<?php foreach ($result_nsx as $each_nsx): ?>
				<option value="<?php echo $each_nsx['ma'] ?>"
					<?php 
					if ($each_nsx['ma'] == $each_sp['ma_nha_san_xuat']) echo "selected";
					?>
					>
					<?php echo $each_nsx['ten'] ?>
				</option>
			<?php endforeach ?>
		</select>
		<br>
		<label>Loại sản phẩm:</label>
		<select name="danh_muc_san_pham">
			<?php foreach ($result_danh_muc as $each_danh_muc): ?>
				<option value="<?php echo $each_danh_muc['ma'] ?>"
					<?php 
					if ($each_danh_muc['ma'] == $each_sp['ma_danh_muc_san_pham']) echo "selected";
					?>
					>
					<?php echo $each_danh_muc['loai_san_pham'] ?>
				</option>
			<?php endforeach ?>
		</select>
		<br>
		<button type="submit" onclick="return them_san_pham()">Sửa</button>
		
	</form>
	<script>
		function them_san_pham(){
			var check_error = false ;

			var ten = document.getElementById('ten').value;
			var ten_regex = /^[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪa-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ1-9]\s+$/;
			if (ten_regex.test(ten)) {
				document.getElementById('ten_error').innerHTML='';
			}
			else{
				document.getElementById('ten_error').innerHTML=' *Vui lòng nhập tên sản phẩm đúng.';
				check_error=true;
			}

			var gia = document.getElementById('gia').value;
			var gia_regex = /^[1-9][0-9]{4,}$/;
			if (gia_regex.test(gia)){
				document.getElementById('gia_error').innerHTML='';
			}
			else{
				document.getElementById('gia_error').innerHTML=' *Vui lòng điền số điện thoại của bạn.';
				check_error=true;
			}

			var mo_ta = document.getElementById('mo_ta').value;
			var mo_ta_regex = /^[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪa-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ1-9]\s+$/;
			if (mo_ta_regex.test(mo_ta)) {
				document.getElementById('mo_ta_error').innerHTML='';
			}
			else{
				document.getElementById('mo_ta_error').innerHTML=' *Vui lòng nhập tên sản phẩm đúng.';
				check_error=true;
			}
			if(check_error){
				return false;
			}
		}
	</script>
</body>
</html>