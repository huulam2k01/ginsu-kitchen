<?php
session_start();
unset ($_SESSION["ma"]);
unset ($_SESSION["ho_ten"]);
unset ($_SESSION["basket"]);

setcookie('ma','',-1);
setcookie('ten','',-1);
setcookie('basket','',-1);


header("location:../index.php");