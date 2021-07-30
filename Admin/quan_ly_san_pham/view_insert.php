<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">
		body{
			background: #d9d5cc;
		}
	</style>
</head>
<body>
	<?php  
	include '../connect.php';
	$sql = "select * from nha_san_xuat";
	$result = mysqli_query($connect,$sql);

	$sql_danh_muc = "select * from danh_muc_san_pham";
	$result_danh_muc = mysqli_query($connect,$sql_danh_muc);
	?>
	<form method="post" action="process_insert.php" enctype="multipart/form-data">
		<label for="ten">Tên sản phẩm: <span class="error" id="ten_error"></span> <br></label> 
		<input type="text" name="ten" id="ten" required="">
		<br>
		<label for="gia">Giá sản phẩm: <span class="error" id="gia_error"></span> <br></label> 
		<input type="number" name="gia" id="gia" required="">
		<br>
		<label for="mo_ta">Mô tả sản phẩm: <span class="error" id="mo_ta_error"></span> <br></label> 
		<textarea name="mo_ta" id="mo_ta" required=""></textarea>
		<br>
		<label for="anh">Ảnh sản phẩm:</label> 
		<input type="file" name="anh" id="anh" required="" accept="image/*">
		<br>
		<label>Nhà sản xuất:</label>
		<select name="ma_nha_san_xuat">
			<?php foreach ($result as $each): ?>
				<option value="<?php echo $each['ma'] ?>">
					<?php echo $each['ten'] ?>
				</option>
			<?php endforeach ?>
		</select>
		<br>
		<label>Loại sản phẩm:</label>
		<select name="danh_muc_san_pham">
			<?php foreach ($result_danh_muc as $each_danh_muc): ?>
				<option value="<?php echo $each_danh_muc['ma'] ?>">
					<?php echo $each_danh_muc['loai_san_pham'] ?>
				</option>
			<?php endforeach ?>
		</select>
		<br>
		<button onclick="return them_san_pham()">Thêm</button>
	</form>
	<?php mysqli_close($connect) ?>
	<script>
		function them_san_pham(){
			var check_error = false ;

			// var ten = document.getElementById('ten').value;
			// var ten_regex = /^[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪa-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ1-9]\s+$/;
			// if (ten_regex.test(ten)) {
			// 	document.getElementById('ten_error').innerHTML='';
			// }
			// else{
			// 	document.getElementById('ten_error').innerHTML=' *Vui lòng nhập tên sản phẩm đúng.';
			// 	check_error=true;
			// }

			// var gia = document.getElementById('gia').value;
			// var gia_regex = /^[1-9][0-9]{4,}$/;
			// if (gia_regex.test(gia)){
			// 	document.getElementById('gia_error').innerHTML='';
			// }
			// else{
			// 	document.getElementById('gia_error').innerHTML=' *Vui lòng điền số điện thoại của bạn.';
			// 	check_error=true;
			// }

			// var mo_ta = document.getElementById('mo_ta').value;
			// var mo_ta_regex = /^[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪa-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ1-9]\s+$/;
			// if (mo_ta_regex.test(mo_ta)) {
			// 	document.getElementById('mo_ta_error').innerHTML='';
			// }
			// else{
			// 	document.getElementById('mo_ta_error').innerHTML=' *Vui lòng nhập tên sản phẩm đúng.';
			// 	check_error=true;
			// }

			if(check_error){
				return false;
			}
		}
	</script>
</body>
</html>