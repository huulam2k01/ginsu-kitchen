<?php
$ma_slide = $_GET['ma_slide'];

require '../connect.php';

$sql = "delete from slide_show
where
ma_slide = '$ma_slide'";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');