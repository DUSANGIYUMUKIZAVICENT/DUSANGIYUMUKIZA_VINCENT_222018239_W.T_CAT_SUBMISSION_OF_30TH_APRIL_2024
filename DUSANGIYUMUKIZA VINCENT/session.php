<?php
session_start(); 
if (!$_SESSION['us']) 
{
	echo "<script>window.location.replace('index.php');</script>";
}
 ?>
 