<?php 
session_start();
if (!$_SESSION['us'])
 {
	echo "<script>alert('We need Admin privilege to continue');window.location='login.php';</script>";
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SCHOOL TOURNAMENT</title>
			<style type="text/css">
		#nav
		{
			width: 100%;
		}
	li{
		float: left;
		list-style-type: none;
		background: #488;
		padding: 10px 40px;
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
		form
		{
			background: #455;
		}
		input[type=text],[type=date],[type=tel]
		{
			width: 30%;
			outline: none;
		}
		h2
		{
			color: white;
		}		
		button	
		{
			background:#488;
			color: white;padding: 4px;
			border:none;
			margin: 5px;border-radius: 5px;
		}
	</style>
</head>
<body>
		<div class="a">CLASS TOURNAMENT MANAGEMENT SYSTEM</div>
	<div class="b">
		<ul id="nav">
<li class="hm"><a href="index.php">HOME</a></li>
			<li class="mt">&nbsp;<a href="about.php">ABOUT US</a></li>
			<li class="rf"><a href="contact.php">CONTACT</a></li>
			<li class="rp"><a href="table.php">TABLES</a></li>		

			<li class="ad"><a href="setting.php">FORM SETTING</a></li>
					<?php 
					include 'connect.php';
			error_reporting(0);
			if ($_SESSION['us']) {
				echo '<li class="lg"><a href="javascript:func()">LOGOUT</a></li>';
			}
			else{
				echo'<li class="lg"><a href="login.php">LOGIN</a></li>';}
			 ?>	
		</ul>
	<br>
	<center>
<form method="POST">
	<fieldset><legend style="text-align: center;"><h3>ADD STADIUM</h3></legend>
 <br>
	<label> Names : </label><input type="text" name="nm" placeholder="Enter stadium name..." required><br><br>
	<label>Location:</label><input type="text" name="ch" placeholder="Enter stadium location...." required><br><br>
	<label> Owner : </label><input type="text" name="dt" placeholder="Enter stadium Owner" required><br><br>
	<input type="submit" name="bt" value="ADD"><br><button onclick="history.back()">Back</button><br></fieldset>
	<button onclick="window.location='team.php';">ADD TEAM</button> 
	<button  onclick="window.location='referee.php';">ADD REFEREE</button> 
	<button  onclick="window.location='player.php';">ADD PLAYER</button>
	<button  onclick="window.location='playground.php';">ADD PLAYGROUND</button> 
	<button  onclick="window.location='match.php';">ADD MATCH</button>
</form>

<?php 
if (isset($_POST['bt']))
 {
	$tm=$con->query("INSERT INTO playground VALUES ('','$_POST[nm]','$_POST[ch]','$_POST[dt]')");
	if ($tm)
	 {	header("refresh:1;");
		echo "<script>alert('Inserted');</script>";
	}
	else
	{header("refresh:1;");
		echo "<script>alert('Not inserted');</script>";
	}
}
 ?>
 		<script type="text/javascript">
		function func ()
		 {
			var a=confirm("Do you want to logout");
			if (a) {window.location.replace('logout.php')};
		}
		</script>
</body>
</center>
</body>
</html>