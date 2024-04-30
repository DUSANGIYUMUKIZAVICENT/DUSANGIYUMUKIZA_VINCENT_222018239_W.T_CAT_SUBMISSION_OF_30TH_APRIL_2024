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
				$rf=$con->query("SELECT * FROM referees");
				$tm=$con->query("SELECT * FROM team ORDER BY t_id DESC");
				$tms=$con->query("SELECT * FROM team ORDER BY t_id ASC");
				$ply=$con->query("SELECT * FROM playground");
			 ?>	

		</ul>
	<br>
	<center>
<form method="POST">
	<fieldset><legend style="text-align: center;"><h3>ADD MATCH</h3></legend>
		<label>Playground:</label>
		<select name="pg">
		<?php 
		while ($pg=$ply->fetch_assoc())
		{
			echo "<option value=".$pg['pg_id'].">".$pg['pg_name']."</option>";
		}

		 ?>	
		</select><br><br>
		<label>Match date:</label><input type="date" name="dt" required><br><br>
	<label> Refer :  </label><select name="rf">
		<?php 
		while ($ref=$rf->fetch_assoc())
		{
			echo "<option value=".$ref['ref_id'].">".$ref['f_name']." ".$ref['l_name']."</option>";
		}

	 ?></select><br><br>
	<label>Home team:</label>
	<select name="ht">
		<?php 
		while ($tm1=$tm->fetch_assoc())
		{
			echo "<option value=".$tm1['t_id'].">".$tm1['t_name']."</option>";
		}

	 ?></select><br><br>
	<label>Away team:</label>
		<select name="at">
		<?php 
		while ($tm2=$tms->fetch_assoc())
		{
			echo "<option value=".$tm2['t_id'].">".$tm2['t_name']."</option>";
		}

	 ?></select><br><br>
	<input type="submit" name="btn" value="ADD">
	<button onclick="history.back()">Back</button>
</fieldset>
	<button onclick="window.location='team.php';">ADD TEAM</button> 
	<button  onclick="window.location='referee.php';">ADD REFEREE</button> 
	<button  onclick="window.location='player.php';">ADD PLAYER</button>
	<button  onclick="window.location='playground.php';">ADD PLAYGROUND</button> 
	<button  onclick="window.location='match.php';">ADD MATCH</button><br><br>
</form>
<div style="background-color: #fff; ">
<?php 
	$dt=date('Y-m-d');
	if(isset($_POST['btn']))
	{
		$inst=$con->query("INSERT INTO matches VALUES ('','$_POST[pg]','$dt','$_POST[dt]','$_POST[rf]','$_POST[ht]','$_POST[at]')");
		if ($inst)
		 {header("refresh:1;");
			echo "<script>alert('Yes');</script>";
		}
		else
		{header("refresh:1;");
			echo "<script>alert('Not');</script>";
		}
	}
 ?></div>
 		<script type="text/javascript">
		function func ()
		 {
			var a=confirm("Do you want to logout");
			if (a) {window.location.replace('logout.php')};
		}
		</script>
</center>
</body>
</html>