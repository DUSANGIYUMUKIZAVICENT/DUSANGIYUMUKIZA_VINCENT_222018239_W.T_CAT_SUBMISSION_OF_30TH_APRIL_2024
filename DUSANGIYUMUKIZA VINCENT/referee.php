<?php 
session_start();
if (!$_SESSION['us'])
 {
	echo "<script>alert('Please login to continue');window.location='login.php';</script>";
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
		list-style-type: none;background: #488;
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

		</ul></div>
	<br>
	<center>
<form method="POST">
	<fieldset><legend style="text-align: center;"><h3>ADD REFEREE</h3></legend>
	<label>Lastnames:</label><br><input type="text" name="lnm" required placeholder="Enter lastname.." autocomplete="no" ><br>
	<label>Firstnames:</label><br><input type="text" name="fnm" required autocomplete="no" placeholder="Enter Firstname.."><br>
	<label>Birthdate:</label><br><input type="date" name="ag" required autocomplete="no"><br>
	<label>Gender:</label><br><input type="radio" name="gnr" value="Male" required>Male<input type="radio" name="gnr" value="Female" required>Female<br>
	<label>Phone:</label><br><input type="tel" name="pn" required autocomplete="no" placeholder="Enter phonenumber.."><br><br>
	<input type="submit" name="sb" value="ADD"><button onclick="history.back()">Back</button>
</fieldset>
	<button onclick="window.location='team.php';">ADD TEAM</button> 
	<button  onclick="window.location='referee.php';">ADD REFEREE</button> 
	<button  onclick="window.location='player.php';">ADD PLAYER</button>
	<button  onclick="window.location='playground.php';">ADD PLAYGROUND</button> 
	<button  onclick="window.location='match.php';">ADD MATCH</button><br><br>	
</form>	
		<script type="text/javascript">
		function func ()
		 {
			var a=confirm("Do you want to logout");
			if (a) {window.location.replace('logout.php')};
		}
		</script>
<?php 
if(isset($_POST['sb']))
{
	$ins=$con->query("INSERT INTO referees VALUES ('','$_POST[fnm]','$_POST[lnm]','$_POST[ag]','$_POST[gnr]','$_POST[pn]')");
	if($ins)
	{
		echo "yes";
	}
	else
	{
		echo "not";
	}
}
?>
</center>
</body>
</html>