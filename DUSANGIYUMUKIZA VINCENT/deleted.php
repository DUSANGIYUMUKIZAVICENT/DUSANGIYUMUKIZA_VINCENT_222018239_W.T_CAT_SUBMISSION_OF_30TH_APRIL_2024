<?php 
session_start();
if (!$_SESSION['us'])
 {
	echo "<script>alert('We need Admin privilege to continue');window.location='login.php';</script>";
}
error_reporting(0);
include 'connect.php';
$sel=$con->query("SELECT DISTINCT matches.*,referees.*,team.* FROM  matches JOIN referees ON(matches.ref_id=referees.ref_id) JOIN team ON(matches.t1_id=team.t_id) WHERE matches.action='OFF'");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SCHOOL TORNAMENT</title>
			<style type="text/css">
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
	#nv{
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
		table
		{
			background:#eee;
		}
		button	
		{
			background:#488;
			color: white;padding: 4px;
			border:none;
			margin: 5px;border-radius: 5px;
		}
		tr:nth-child(even)
		{
			background:#dde;
		}
		.tr:hover
		{
			background:grey;
		}
		tr th
		{
			background-color: #333;
			color: #ddd;
		}
		.l a
		{
			background:;
			color: white;
			text-decoration: none;
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
		.ad a{ background: white;color: blue;padding: 3px; text-decoration: none;}
		#gh a
		{
			text-decoration: none;
			color:#999;padding: 5px;
			font-size: 20px;margin: 5px;
			background-color: black;
		}
	</style>
</head>
<body>
		<ul id="nav">
			<li class="hm"><a href="index.php" id="nv">HOME</a></li>
			<li class="mt">&nbsp;<a href="about.php" id="nv">ABOUT US</a></li>
			<li class="rf"><a href="contact.php" id="nv">CONTACT</a></li>
			<li class="rp"><a href="table.php" id="nv">TABLES</a></li>		

			<li class="ad"><a href="setting.php" >FORM SETTING</a></li>
					<?php 
			
			if ($_SESSION['us']) {
				echo '<li class="lg"><a href="javascript:func()" id="nv">LOGOUT</a></li>';
			}
			else{
				echo'<li class="lg"><a href="login.php" id="nv">LOGIN</a></li>';}
									if ($_SESSION['v']=='MNG')
					 {
					echo '<li class="l"><a href="grant_acess.php">ACESS</a></li>'	;
					}
				?>

		</ul><br><br>
	<center><br>
		<table border="1" cellspacing="0" cellpadding="0" width="700px" class="tab">
		<tr><th colspan="5">MACH REPORT ACTIVATION</th><th rowspan="2">Activate</th></tr><tr>
			<th>N<sup><u>o</u></sup></th>
			<th>Match</th>
			<th>Date</th>
			<th>Playground</th>
			<th>Referee</th>
					</tr>
		<form method="POST">
		<?php 
		$a=1;
		while ($data=$sel->fetch_assoc()) 
		{
			$slt=$con->query("SELECT * FROM team WHERE t_id='$data[t2_id]'");
			$pg=$con->query("SELECT * FROM playground WHERE pg_id='$data[playground]'");
			$b=$slt->fetch_assoc();
			$p=$pg->fetch_assoc();
			$mc=$data['mt_id'];
			$team=$b['t_name'];
			echo "<tr>";
			echo "<td>".$a."</td>
			<td>"."".$b['t_name']."<br>".$data['t_name']."</td><td>".$data['m_date']."</td>
			<td>".$p['pg_name']."</td><td>".$data['f_name']." ".$data['l_name']."</td>
			<td id='gh'><a href='delete.php?mc=$mc'> ✓ </a></td>
			</tr>";
			$a++;
		}
		 ?>
	</table></form><button onclick="history.back()">Back</button><button onclick="history.back()">View match records</button><br>
	<br><br>
	<button onclick="window.location='team.php';">ADD TEAM</button> 
	<button  onclick="window.location='referee.php';">ADD REFEREE</button> 
	<button  onclick="window.location='player.php';">ADD PLAYER</button>
	<button  onclick="window.location='playground.php';">ADD PLAYGROUND</button> 
	<button  onclick="window.location='match.php';">ADD MATCH</button> 
			<script type="text/javascript">
		function func ()
		 {
			var a=confirm("Do you want to logout");
			if (a) {window.location.replace('logout.php')};
		}
		</script>
</body>
</html>