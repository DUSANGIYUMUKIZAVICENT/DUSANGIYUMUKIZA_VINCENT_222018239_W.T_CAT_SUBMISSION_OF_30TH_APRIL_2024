<?php 

	session_start();
	error_reporting(0);
 ?>
 <?php 
if (!$_SESSION['us'])
 {
	echo "<script>alert('We need Admin privilege to continue');window.location='login.php';</script>";
}?>
 <!DOCTYPE html>
<html>
<head>
	<title>SCHOOL TORNAMENT</title>
	<style type="text/css">
		.hm a{ background: white;color: blue;font-size: 25px;padding: 10px; }
		#nav
		{
			margin-top: -1px;width: 100%;
			margin-left: -200px;
		}
	li{
		float: right;
		padding-right: 500px;
		list-style-type: none;background: #488;padding: 20px;
	}
	.a
	{
		text-align: center;color: azure;font-size: 50px;background: url(pc5.jpg);	}
	.b
	{
	width: 100%;
	}
	li a{
		color: white;text-decoration: none;font-size: 20px;
	}
	input[type=search]
		{
			color: black;
			width: 60px;
			margin-right: px;
		
			margin-top: -40px;
		}
		input[type=submit]
			{
				margin-left: px;
			}
	a
	{
		text-decoration: none;
	}
	.fo{
		background:#488;width: 100%;
		height: 45px;
		text-align: center;
		color: white;
		margin-top: -9px;
	}
		body{background:url(pc5.jpg);
			background-size: 100%;
			background-repeat: no-repeat;
			margin: 0;
		}
		.hm1
		{
			width: 100%
			background-color:red;
			height: 500px;
			color: red;
			text-align: left;
		}
		 #dv1
		{
			background:url(giphy.gif);
			background-size: 150%;
			background-repeat: no-repeat; 
			height: 99%;
			width: 33.16%;
			float: right;
			
		}
		#dv2
		{
			background: ;
			height: 99%;
			width: 33.16%;
			float: right;
			
		}
		#dv3
		{
			background:url(pc3.gif);
			background-size: 180%;
			background-repeat: no-repeat;
			height: 99%;
			width: 33.16%;
			float: right;
			
		}
		.l a
		{
			background:;
			color: ;
		}
		.l
		{
			background: #545;
			color: white;
		}
		.l:hover
		{
			cursor: pointer;
		}
	</style>
</head>
<body class="ghh">
	<div class="a">CLASS TOURNAMENT MANAGEMENT SYSTEM</div>
	<div class="b">
		<ul id="nav">
					<?php
					if ($_SESSION['v']=='MNG')
					 {
					echo '<li class="l"><a href="grant_acess.php">ACESS</a></li>'	;
					}
			if ($_SESSION['us']) {
				echo '<li class="lg"><a href="javascript:func()">LOGOUT</a></li>';
			}
			else{
				echo'<li class="lg"><a href="login.php">LOGIN</a></li>';}
			 ?>				
			 <li class="ad"><a href="setting.php">FORM SETTING</a></li><li class="rp"><a href="table.php">TABLES</a></li>		
			<li class="rf"><a href="contact.php">CONTACT</a></li>
			<li class="mt">&nbsp;<a href="about.php">ABOUT US</a></li>
			>
			<li class="hm"><a href="index.php">HOME</a></li>
			<li id="bb"><form><input type="search" id="search" name="search" placeholder="Search"><input type="submit" id="search" name="search" value="search"></form></li>

		</ul>
		<script type="text/javascript">
		function func ()
		 {
			var a=confirm("Do you want to logout");
			if (a) {window.location.replace('logout.php')};
		}
		</script>
	</div><br><br><br>
	<div style="height: 461px; border:1px solid #488;">
		<div id="dv1"></div>
		<div id="dv2"><h2 style="text-align: center;border-bottom: 4px solid #111;color: #">WELCOME TO CLASS TOURNAMENT MANAGEMENT SYSTEMS</h2>
			<p style="text-align: center;font-size: 39px;">
				Here we communicate different matches 
				if you want to see different match  visit our website 
				for more info  <a href="contact.php" style="color: blue">contact us</a>
			</p>
		</div>
		<div id="dv3"></div>
	</div>
	<div class="fo">
		<br>&copy;2022 schooltour ||All right reserved. 
	</div>
</body>
</html>