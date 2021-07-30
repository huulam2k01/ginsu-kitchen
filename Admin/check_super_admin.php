<?php
session_start();
if ($_SESSION['cap_do'] != 1) {
	header("location:../index.php?error=*Bạn không có quyền vào đây !");
}