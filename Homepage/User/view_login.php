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
  .psw_forgot{
    position: absolute;
    right: 159px;
  }
  .registration{
    position: absolute;
    right: 300px;
  }
</style>
<body>
  <?php 
  if (isset($_COOKIE['ma'])) {
    $ma = $_COOKIE['ma'];
    $ten = $_COOKIE['ten'];

    setcookie('ma',$ma,time() + 60*60*24*60);
    session_start();
    $_SESSION['ma'] = $ma;
    $_SESSION['ten_dang_nhap'] = $ten_dang_nhap;

    header("location:../index.php");
  }
  ?>
  <div id="id01" class="modal">
    <span class="close" title="Đóng cửa sổ"><a href="../index.php" style="text-decoration:none; color: white">&times;</a></span>
    <form class="modal-content" method="post" action="process_login.php">
      <div class="container">
        <h1>Đăng nhập</h1>
        <br>
        <span style="color: red">
          <?php if (isset($_GET['error'])){ ?>
            *<?php echo $_GET['error']; ?>
          <?php } ?>
        </span>
        
        <hr>

        <label for="ten_dang_nhap"><b>Tên đăng nhập:</b></label>
        <input type="text" placeholder="" name="ten_dang_nhap" required>

        <label for="mat_khau"><b>Mật khẩu:</b></label>
        <input type="password" placeholder="" name="mat_khau" required>

        <label>
          <input type="checkbox"  name="remember" style="margin-bottom:15px"> Ghi nhớ đăng nhập
        </label>

        <label class="registration">
          Chưa có tài khoản ? <a href="view_registration.php" style="color: #3690d9" >Đăng kí</a>
        </label>

        <!-- <label class="psw_forgot">
          Quên <a href="" style="color: #3690d9" >mật khẩu</a> ?
        </label> -->

        <div class="clearfix">
          <button type="button" class="cancelbtn" id="cancelbtn">Huỷ</button>
          <button type="submit" class="signupbtn">Đăng nhập</button>
        </div>
      </div>
    </form>
  </div>

  <script>
    document.getElementById("cancelbtn").onclick = function (){
      location.href = "../index.php"
    }
// // Get the modal
// var modal = document.getElementById('id01');

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }

</script>
</body>
</html>