<?php
session_start();
if (empty($_SESSION['ma_admin'])) {
	header("location:../index.php?error=*Vui lòng đăng nhập");
}