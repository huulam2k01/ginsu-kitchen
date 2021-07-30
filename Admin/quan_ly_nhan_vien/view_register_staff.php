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

	<div id="id02" class="modal">
		<span class="close" title="Đóng cửa sổ"><a href="index.php" style="text-decoration:none; color: white">&times;</a></span>
		<form class="modal-content" method="post" action="process_register_staff.php">
			<div class="container">
				<h1>Đăng kí</h1>
				<p>Vui lòng điền đầy đủ thông tin vào form này để thêm nhân viên.</p>
				<hr>
				
				<label for="name"><b>Họ và tên:</b> <span class="error" id="name_error"></span></label>
				<input type="text" placeholder="" name="ho_ten" id="name" >
				

				<label for="ngay_sinh"><b>Ngày sinh:</b></label>
				<input type="date" placeholder="" name="ngay_sinh" id="ngay_sinh" required>

				
				<label for="sdt"><b>SĐT:</b><span class="error" id="sdt_error"></span></label>
				<input type="number" placeholder="" name="sdt" id="sdt" >
				

				<label for="dia_chi"><b>Địa chỉ:</b><span class="error" id="dia_chi_error"></span></label>
				<input type="text" placeholder="" name="dia_chi" id="dia_chi" >

				
				<label for="email"><b>Email:</b><span class="error" id="email_error"></span></label>
				<input type="text" placeholder="" name="email" id="email">
	

				<label for="gioi_tinh"><b>Giới tính: </b><span class="error" id="gioi_tinh_error"></span></label>
				<input type="radio" name="gioi_tinh" value="0" checked>Nam
				<input type="radio" name="gioi_tinh" value="1">Nữ
				<br>
				<br>

				<b>Chức vụ:<br></b><span class="error" id="chuc_vu_error"></span> <br>
				<input type="radio" name="chuc_vu" value="1">Nhân viên full time
				<input type="radio" name="chuc_vu" value="2">Nhân viên part-time ca sáng (7h-12h)
				<input type="radio" name="chuc_vu" value="3">Nhân viên part time ca chiều (13h-18h)
				<input type="radio" name="chuc_vu" value="4">Nhân viên part_time ca tối (18h-22h)
				<input type="radio" name="chuc_vu" value="5">Quản lí chi nhánh
				<input type="radio" name="chuc_vu" value="6">Quản lí quận
				

     <!--  <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label> -->

   <!--  <p>Bằng việc tạo tài khoản, bạn đồng ý với <a href="https://nmbimg.fastmirror.org/image/2020-09-13/5f5d7ad11c49e.jpg" target="_blank" style="color:dodgerblue">Điều khoản & Quyền riêng tư</a> của chúng tôi.</p> -->

    <div class="clearfix">
    	<a href="index.php"><button type="button" class="cancelbtn" id="cancelbtn">Huỷ</button></a> 
    	<button type="submit" class="signupbtn" onclick="return join()">Thêm</button>
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
	function join(){
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

			var sdt = document.getElementById('sdt').value;
			var sdt_regex = /^0[0-9]{9,10}$/;
			if (sdt_regex.test(sdt)){
				document.getElementById('sdt_error').innerHTML='';
			}
			else{
				document.getElementById('sdt_error').innerHTML=' *Vui lòng điền số điện thoại của bạn.';
				check_error=true;
			}

			// var dia_chi =document.getElementById('dia_chi').value;
			// var dia_chi_regex = /^(?:[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪ][a-zàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵỷỹ]{1,6}[0-9]\s?)+$/;
			// if (dia_chi_regex.test(dia_chi)) {
			// 	document.getElementById('dia_chi_error').innerHTML='';
			// }
			// else{
			// 	document.getElementById('dia_chi_error').innerHTML=' *Vui lòng điền địa chỉ của bạn.';
			// 	check_error=true;
			// }

			var email = document.getElementById('email').value;
			var email_regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
			if (email_regex.test(email)) {
				document.getElementById('email_error').innerHTML='';
			}
			else{
				document.getElementById('email_error').innerHTML=' *Vui lòng nhập đúng định dạng email';
				check_error=true;
			}

			var chuc_vu = document.getElementsByName('chuc_vu');
			var chuc_vu_check = false;
			for(var i = 0; i<chuc_vu.length; i++){
				if(chuc_vu[i].checked){
					chuc_vu_check = true;
				}
			}
			if(chuc_vu_check==false){
				check_error = true;
				document.getElementById('chuc_vu_error').innerHTML = '*Vui lòng chọn một chức vụ';
			}
			else{
				document.getElementById('chuc_vu_error').innerHTML = '';
			}

			if(check_error){
				return false;
		}
	}
</script>
</body>
</html>