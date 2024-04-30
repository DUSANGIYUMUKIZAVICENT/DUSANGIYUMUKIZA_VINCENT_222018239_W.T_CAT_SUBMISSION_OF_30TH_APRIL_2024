<?php 
error_reporting(0);
include 'connect.php';
$sel=$con->query("SELECT DISTINCT matches.*,referees.*,team.* FROM  matches JOIN referees ON(matches.ref_id=referees.ref_id) JOIN team ON(matches.t1_id=team.t_id) JOIN playground ON(matches.playground=playground.pg_id) WHERE matches.action='ON'");
 ?>
 <?php 
session_start();
if (!$_SESSION['us'])
 {
	echo "<script>alert('We need Admin privilege to continue');window.location='login.php';</script>";
}?>
<html>
<head>
	<title>SCHOOL TOURNAMENT</title>
	<style type="text/css">
	.rp a{ color: red; background: white;color: blue;font-size: 20px;padding: 7px; }
	#p{padding-left:50px;padding-right:50px;color: white;
		background: seagreen;border-radius: 4px;}
		table
		{
			background: #eee;
		}
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
			 ?>	

		</ul><br><br>
	<center>	<table border="1" cellspacing="0" cellpadding="0" width="700px" class="tab">
		<tr><th colspan="6">MACH REPORT</th></tr><tr>
			<th>N<sup><u>o</u></sup></th>
			<th>Match</th>
			<th>Day</th>
			<th>Registered date</th>
			<th>Playground</th>
			<th>Referee</th>
		</tr>
		<?php 
		$a=1;
		while ($data=$sel->fetch_assoc()) 
		{
			$slt=$con->query("SELECT * FROM team WHERE t_id='$data[t2_id]'");
			$pg=$con->query("SELECT * FROM playground WHERE pg_id='$data[playground]'");
			$b=$slt->fetch_assoc();$p=$pg->fetch_assoc();
			echo "<tr class='tr'>";
			echo "<td>".$a."</td>
			<td>".$b['t_name']." <br>".$data['t_name']."</td><td>".$data['m_date']."</td><td>".$data['date']."</td>
			<td>".$p['pg_name']."</td><td>".$data['f_name']." ".$data['l_name']."</td>";
			echo "</tr>";
			$a++;
		}
		 ?>
	</table><br>
	<input type="button" value="print report" id="p" onclick="prt()">
	<script type="text/javascript">
	function prt (table)
	 {
		window.print();	
	}
		function func ()
		 {
			var a=confirm("Do you want to logout");
			if (a) {window.location.replace('logout.php')};
		}
	</script>
</center>
</body>
</html>