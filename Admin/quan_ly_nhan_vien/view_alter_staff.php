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
		<span class="close" title="????ng c???a s???"><a href="../index.php" style="text-decoration:none; color: white">&times;</a></span>
		<form class="modal-content" method="post" action="process_alter_staff.php">
			<div class="container">
				<?php 
					$ma = $_GET['ma'];
					require '../connect.php';
					$sql = "select * from staff where ma = '$ma'";
					$result = mysqli_query($connect,$sql);
					$each = mysqli_fetch_array($result);
				?>
				<h1>S???a</h1>
				<p></p>
				<hr>
				
				<input type="hidden" name="ma" value="<?php echo $ma ?>">
				<label for="ho_ten"><b>H??? v?? t??n:</b> <span class="error" id="name_error"></span></label>
				<input type="text"  name="ho_ten" id="ho_ten" value="<?php echo $each['ho_ten'] ?>">
				

				<label for="ngay_sinh"><b>Ng??y sinh:</b></label>
				<input type="date" name="ngay_sinh" id="ngay_sinh" value="<?php echo $each['ngay_sinh'] ?>" required>

				
				<label for="sdt"><b>S??T:</b><span class="error" id="sdt_error"></span></label>
				<input type="number"  name="sdt" id="sdt" value="<?php echo $each['sdt'] ?>">
				

				<label for="dia_chi"><b>?????a ch???:</b><span class="error" id="dia_chi_error"></span></label>
				<input type="text" name="dia_chi" id="dia_chi" value="<?php echo $each['dia_chi'] ?>">

				
				<label for="email"><b>Email:</b><span class="error" id="email_error"></span></label>
				<input type="text" name="email" id="email" value="<?php echo $each['email'] ?>">
	

				<label for="gioi_tinh"><b>Gi???i t??nh: </b><span class="error" id="gioi_tinh_error"></span></label>
				<input type="radio" name="gioi_tinh" value="0" <?php if ($each['gioi_tinh']==0) {
			echo "checked";
		} ?>>Nam
				<input type="radio" name="gioi_tinh" value="1" <?php if ($each['gioi_tinh']==1) {
			echo "checked";
		} ?>>N???
				<br>
				<br>

				<input type="radio" name="chuc_vu" value="1" <?php if ($each['chuc_vu']==1) {
			echo "checked";
		} ?>>Nh??n vi??n full time
				<input type="radio" name="chuc_vu" value="2" <?php if ($each['chuc_vu']==2) {
			echo "checked";
		} ?>>Nh??n vi??n part-time ca s??ng (7h-12h)
				<input type="radio" name="chuc_vu" value="3" <?php if ($each['chuc_vu']==3) {
			echo "checked";
		} ?>>Nh??n vi??n part time ca chi???u (13h-18h)
				<input type="radio" name="chuc_vu" value="4" <?php if ($each['chuc_vu']==4) {
			echo "checked";
		} ?>>Nh??n vi??n part_time ca t???i (18h-22h)
				<input type="radio" name="chuc_vu" value="5" <?php if ($each['chuc_vu']==5) {
			echo "checked";
		} ?>>Qu???n l?? chi nh??nh
				<input type="radio" name="chuc_vu" value="6" <?php if ($each['chuc_vu']==6) {
			echo "checked";
		} ?>>Qu???n l?? qu???n
				<span class="error" id="sdt_error"></span>

     <!--  <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label> -->

   <!--  <p>B???ng vi???c t???o t??i kho???n, b???n ?????ng ?? v???i <a href="https://nmbimg.fastmirror.org/image/2020-09-13/5f5d7ad11c49e.jpg" target="_blank" style="color:dodgerblue">??i???u kho???n & Quy???n ri??ng t??</a> c???a ch??ng t??i.</p> -->

    <div class="clearfix">
    	<a href="view_login.php"><button type="button" class="cancelbtn" id="cancelbtn">Hu???</button></a> 
    	<button type="submit" class="signupbtn" onclick="return join()">S???a</button>
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
			var name_regex = /^(?:[A-Z?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????][a-z??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????]{1,6}\s?)+$/;
			if (name_regex.test(name)) {
				document.getElementById('name_error').innerHTML='';
							}
							else{
								document.getElementById('name_error').innerHTML=' *Vui l??ng nh???p t??n c?? d???u v?? vi???t hoa ch??? c??i ?????u.';
								check_error=true;
							}

			var sdt =document.getElementById('sdt');
			var sdt_regex = /^0[0-9]{9,10}$/;
			if (sdt_regex.test(phone_num)) {
				document.getElementById('sdt_error').innerHTML='';
			}
			else{
				document.getElementById('sdt_error').innerHTML=' *Vui lo??ng ??i????n s???? ??i????n thoa??i cu??a ba??n.';
				check_error=true;
			}

			var dia_chi =document.getElementById('dia_chi').value;
			var dia_chi_regex = /^(?:[A-Z?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????][a-z??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????]{1,6}[0-9]\s?)+$/;
			if (dia_chi_regex.test(dia_chi)) {
				document.getElementById('dia_chi_error').innerHTML='';
			}
			else{
				document.getElementById('dia_chi_error').innerHTML=' *Vui lo??ng ??i????n ??i??a chi?? cu??a ba??n.';
				check_error=true;
			}

			var email = document.getElementById('email');
			var email_regex = /^(?:[a-zA-Z]{6,}[0-9]+)?/;
			if (email_regex.test(email)) {
				document.getElementById('email_error').innerHTML='';
			}
			else{
				document.getElementById('email_error').innerHTML='  *Vui l??ng nh???p ????ng ?????nh d???ng email';
				check_error=true;
			}

			var chuc_vu = document.getElementsByName('chuc_vu').value;
			var chuc_vu_check = false;
			for(var i = 0; i<chuc_vu.length; i++){
				if(chuc_vu[i].checked){
					chuc_vu_check = true;
				}
			}
			if(chuc_vu_check==false){
				check_error = true;
				document.getElementById('chuc_vu_error').innerHTML = '*Vui l??ng ch???n m???t ch???c v???';
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