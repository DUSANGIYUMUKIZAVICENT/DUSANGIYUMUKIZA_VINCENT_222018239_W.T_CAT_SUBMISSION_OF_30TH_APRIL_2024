<?php 
error_reporting(0);
session_start();
if (!$_SESSION['us'])
 {
	echo "<script>alert('We need Admin privilege to continue');window.location='login.php';</script>";
}?>
<?php 
include 'connect.php';
 ?>
<html>
<head>
	<title>SCHOOL TOURNAMENT</title>
		<style type="text/css">
				.mt a{ background: white;color: blue;font-size: 20px;padding: 7px; }
		#nav
		{
			width: 100%;
		}
	li{
		float: left;
		list-style-type: none;background: #488;
		padding: 10px 25px;
		width: 10%;
	}
	.b
	{
		width: 100%; 
	}
	.a
	{
		text-align: center;color: azure;font-size: 50px;background: url(pc5.jpg);
	}
	a{
		color: white;text-decoration: none;
	}
	.fo{background:#333;width: 100%;height: 50px;
		text-align: center;color: white;}
		body{background:url(bg.jpg);background-size: 100%;
			background-repeat: no-repeat;
			margin: 0;
		}
		div
		{
			font-size: 25px;
			background: #eee;
			width: 75%;
			font-family: arial;
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
<body>
				<ul id="nav">
			<li class="hm"><a href="index.php">HOME</a></li>
			<li class="mt">&nbsp;<a href="about.php">ABOUT US</a></li>
			<li class="rf"><a href="contact.php">CONTACT</a></li>
			<li class="rp"><a href="table.php">TABLES</a></li>		

			<li class="ad"><a href="setting.php">FORM SETTING</a></li>
					<?php 
			session_start();
			error_reporting(0);
			if ($_SESSION['us']) {
				echo '<li class="lg"><a href="javascript:func()">LOGOUT</a></li>';
			}
			else{
				echo'<li class="lg"><a href="login.php">LOGIN</a></li>';}
					if ($_SESSION['v']=='MNG')
					 {
					echo '<li class="l"><a href="grant_acess.php">ACESS</a></li>'	;
					}
			 ?>	

		</ul>
	<br>
	<center>
		<div>
		<h1>ABOUT US</h3>
<h3>OUR MISSION</h2>
<p>the mission of enter classes tournament mgtsystem is to enhance the planning and execution of law enforcement,<br> emergency, rescue, and protection missions by providing operators with improved situational awareness through a <br>state-of-the-art map-based mission management and planning system. This system integrates navigation, sensor, and <br>communication systems to deliver essential information to operators in challenging mission conditions.</p>

<h3>WHAT WE DO ?</h3>
<p>The purpose of tournament management software is to streamline the organization and management of tournaments <br>across various sports. This software simplifies the registration process for participants by automating <br>procedures, creating customized forms, and facilitating online payments.</p><br>
</div></center>
		<script type="text/javascript">
		function func ()
		 {
			var a=confirm("Do you want to logout");
			if (a) {window.location.replace('logout.php')};
		}
		</script>
</body>
</html>