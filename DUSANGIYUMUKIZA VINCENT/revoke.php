<!DOCTYPE html>
<html>
<head>
	<title>SCHOOL TOURNAMENT</title>
</head>
<body>
<?php 
include 'connect.php';
error_reporting(0);
	$gt=$_GET['id'];
	$sl=$con->query("SELECT * FROM users WHERE user_id='$gt'");
	$f=$sl->fetch_assoc();
	$up=$con->query("UPDATE users SET user_type='OFF' WHERE user_id='$gt' and user_type!='MNG'");
	if ($up) 
	{
		echo"<script>alert('User $f[names] Revoked acess sucessfully');history.back();</script>";
	}
 ?>
</body>
</html>
</body>
</html>