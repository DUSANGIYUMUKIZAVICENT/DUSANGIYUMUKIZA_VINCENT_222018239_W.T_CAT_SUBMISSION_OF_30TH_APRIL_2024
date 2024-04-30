<?php 
session_start();
error_reporting(0);
session_destroy();
 if (session_destroy())
  {
	echo "<script>window.location.replace('login.php');</script>";
 }
 	echo "<script>window.location.replace('login.php');</script>";

  ?>