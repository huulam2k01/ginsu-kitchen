<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	body {font-family: Arial, Helvetica, sans-serif;}
	* {box-sizing: border-box;}

	/* Full-width input fields */
	input[type=text], input[type=password], input[type=number], input[type=date] {
		width: 100%;
		padding: 15px;
		margin: 5px 0 22px 0;
		display: inline-block;
		border: none;
		background: #f1f1f1;
	}

	/* Add a background color when the inputs get focus */
	input[type=text]:focus, input[type=password]:focus, input[type=number], input[type=date] {
		background-color: #ddd;
		outline: none;
	}

	/* Set a style for all buttons */
	button {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
		opacity: 0.9;
	}

	button:hover {
		opacity:1;
	}

	/* Extra styles for the cancel button */
	.cancelbtn {
		padding: 14px 20px;
		background-color: #f44336;
	}

	/* Float cancel and signup buttons and add an equal width */
	.cancelbtn, .signupbtn {
		float: left;
		width: 50%;
	}

	/* Add padding to container elements */
	.container {
		padding: 16px;
	}

	/* The Modal (background) */
	.modal {
		/*display: none;  Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: #474e5d;
		padding-top: 50px;
	}

	/* Modal Content/Box */
	.modal-content {
		background-color: #fefefe;
		margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		border: 1px solid #888;
		width: 80%; /* Could be more or less, depending on screen size */
	}

	/* Style the horizontal ruler */
	hr {
		border: 1px solid #f1f1f1;
		margin-bottom: 25px;
	}

	/* The Close Button (x) */
	.close {
		position: absolute;
		right: 35px;
		top: 15px;
		font-size: 40px;
		font-weight: bold;
		color: #f1f1f1;
	}

	.close:hover,
	.close:focus {
		color: #f44336;
		cursor: pointer;
	}

	/* Clear floats */
	.clearfix::after {
		content: "";
		clear: both;
		display: table;
	}

	/* Change styles for cancel button and signup button on extra small screens */
	@media screen and (max-width: 300px) {
		.cancelbtn, .signupbtn {
			width: 100%;
		}
	}
	.error{
		color: red;
	}
</style>
<body>

	<div id="id01" class="modal">
		<span class="close" title="Đóng cửa sổ"><a href="../index.php" style="text-decoration:none; color: white">&times;</a></span>
		<form class="modal-content" method="post" action="process_registration.php">
			<div class="container">
				<h1>Đăng kí</h1>
				<p>Vui lòng điền đầy đủ thông tin vào form này để đăng kí.</p>
				<hr>
				
				<label for="name"><b>Họ và tên:</b> <span class="error" id="name_error"></span></label>
				<input type="text" placeholder="" name="ho_ten" id="name" >
				

				<label for="ngay_sinh"><b>Ngày sinh:</b></label>
				<input type="date" placeholder="" name="ngay_sinh" id="ngay_sinh" required>

				
				<label for="sdt"><b>SĐT:</b><span class="error" id="sdt_error"></span></label>
				<input type="number" placeholder="" name="sdt" id="sdt" >
				

				<label for="dia_chi"><b>Địa chỉ:</b><span class="error" id="dia_chi_error"></span></label>
				<input type="text" placeholder="" name="dia_chi" id="dia_chi" required="">

				
				<label for="ten_dang_nhap"><b>Tên đăng nhập:</b><span class="error" id="ten_dang_nhap_error"></span><span class='error'>
					<?php if(isset($_GET["loi"])){?>
						<?php echo $_GET["loi"];?>
					<?php } ?>
						</span></label>
				<input type="text" placeholder="" name="ten_dang_nhap" id="ten_dang_nhap">
	

				<label for="mat_khau"><b>Mật khẩu:</b><span class="error" id="mat_khau_error"></span></label>
				<input type="password" placeholder="" name="mat_khau" id="mat_khau" >


				<label for="nhap_lai_mat_khau"><b>Nhập lại mật khẩu:</b><span class="error" id="nhap_lai_mat_khau_error"></span></label>
				<input type="password" placeholder="" name="nhap_lai_mat_khau" id="nhap_lai_mat_khau" >

     <!--  <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label> -->

    <p>Bằng việc tạo tài khoản, bạn đồng ý với <a href="https://nmbimg.fastmirror.org/image/2020-09-13/5f5d7ad11c49e.jpg" target="_blank" style="color:dodgerblue">Điều khoản & Quyền riêng tư</a> của chúng tôi.</p>

    <div class="clearfix">
    	<a href="view_login.php"><button type="button" class="cancelbtn" id="cancelbtn">Huỷ</button></a> 
    	<button type="submit" class="signupbtn" onclick="return join()">Đăng kí</button>
    </div>
</div>
</form>
</div>

<script>
	// document.getElementById("cancelbtn").onclick = cancel() {
	// 	location.href = "view_login.php"
	// }
// // Get the modal
// var modal = document.getElementById('id01');

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
// 	if (event.target == modal) {
// 		modal.style.display = "none";
// 	}
// }
	function join() {
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

			// var dia_chi =document.getElementById('dia_chi').value;
			// var dia_chi_regex = /^(?:[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪ][a-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,6}[0-9]\s?)+$/;
			// if (dia_chi_regex.test(dia_chi)) {
			// 	document.getElementById('dia_chi_error').innerHTML='';
			// }
			// else{
			// 	document.getElementById('dia_chi_error').innerHTML=' *Vui lòng điền địa chỉ của bạn.';
			// }

			var ten_dang_nhap = document.getElementById('ten_dang_nhap').value;
			var ten_dang_nhap_regex = /^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;
			if (ten_dang_nhap_regex.test(ten_dang_nhap)) {
				document.getElementById('ten_dang_nhap_error').innerHTML='';
				     
			}
			else{
				document.getElementById('ten_dang_nhap_error').innerHTML=' *Tên đăng nhập chỉ số, chữ và không có kí tự trắng.';
				check_error = true;
			}

			var mat_khau = document.getElementById('mat_khau').value;
			var mat_khau_regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
			if (mat_khau_regex.test(mat_khau)) {
				document.getElementById('mat_khau_error').innerHTML='';
			}
			else{
				document.getElementById('mat_khau_error').innerHTML=' *Mật khẩu chỉ số và chữ.';
				check_error = true;
			}

			var nhap_lai_mat_khau = document.getElementById('nhap_lai_mat_khau').value;
			if (nhap_lai_mat_khau == mat_khau){
				document.getElementById('nhap_lai_mat_khau_error').innerHTML='';
			}
			else{
				document.getElementById('nhap_lai_mat_khau_error').innerHTML='*Vui lòng nhập đúng theo mật khẩu';
				check_error = true;
			}

			if(check_error){
				return false;
			}
	}
</script>
</body>
</html>