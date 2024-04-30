<?php 
include 'connect.php';
 ?>
 <?php 
 error_reporting(0);
session_start();
if (!$_SESSION['us'])
 {
	echo "<script>alert('We need Admin privilege to continue');window.location='login.php';</script>";
}?>
<html>
<head>
	<title></title>
		<style type="text/css">
		#nav
		{
			width: 100%;
		}
	#nav li{
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
			width: 95%;
			font-family: arial;
			margin-left: 30px;
		}
		form
		{
			width: 70%;text-align: center;
		}
		.dv form
		{
			margin-left: 200px;
		}
		.dv .dv2
		{
			margin-left: 400px;
			width: 70%;
		}
						.l a
		{
			background:;
			color: ;
		}
	.l a
		{
			background:#545;
			color: white;
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
		.rf a{ background: white;color: blue;font-size: 20px;padding: 5px; }
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
			if ($_SESSION['us']) {
				echo '<li class="lg"><a href="javascript:func()">LOGOUT</a></li>';
			}
			else{
				echo'<li class="lg"><a href="login.php">LOGIN</a></li>';}

					if ($_SESSION['v']=='MNG')
					 {
					echo '<li class="l"><a href="grant_acess.php">ACESS</a></li>';
					}
			 ?>	

		</ul>
	<br>
	<div class="dv">
		<form>
			<fieldset><legend><h1>Contact</h1></legend>
		<input type="text" name="" placeholder="Full Name"><br><br>
		<input type="email" name="" placeholder="Email"><br><br>
		<input type="phonet" name="" placeholder="Phone No"><br><br>
		<label>Comment</label><br><textarea></textarea>
		<br><br>
		<input type="submit" name="" style="width: 90px;background: seagreen;">
	</fieldset>
	</form>	
	<div class="dv2">
	<p><h3>OUR CONTACTS</h3>
		<ul>
			<li>info@etech.ac.rw </li><br>
			<li>+25078268241</li><br>
			<li>entertournmgtsystem.com</li><br>
			<li>Huye, Street, NM 169 </li><br>
			<li>PO.Box: 169 Butare, Rwanda </li><br>
	</ul></p>
</div>
</div>
		<script type="text/javascript">
		function func ()
		 {
			var a=confirm("Do you want to logout");
			if (a) {window.location.replace('logout.php')};
		}
		</script>
</body>
</html>