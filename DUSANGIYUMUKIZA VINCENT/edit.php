<?php 
$id=$_GET['mt'];
include 'connect.php';
$sel=$con->query("SELECT DISTINCT matches.*,referees.*,team.*,playground FROM  matches JOIN referees ON(matches.ref_id=referees.ref_id) JOIN team ON(matches.t1_id=team.t_id) JOIN playground ON(matches.playground=playground.pg_id) WHERE mt_id='$id'");
$sc=$con->query("SELECT DISTINCT matches.*,referees.*,team.*,playground FROM  matches JOIN referees ON(matches.ref_id=referees.ref_id) JOIN team ON(matches.t1_id=team.t_id) JOIN playground ON(matches.playground=playground.pg_id) WHERE mt_id='$id'");
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
	#nv{
		color: white;text-decoration: none;
	}
	.fo{background:#333;width: 100%;height: 50px;
		text-align: center;color: white;}
		body{background:url(bgjpg);background-size: 100%;
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
		table
		{
			background:#999;
		}
				button	
		{
			background:#488;
			color: white;padding: 4px;
			border:none;
			margin: 5px;border-radius: 5px;
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
			<li class="hm"><a href="index.php" id="nv">HOME</a></li>
			<li class="mt">&nbsp;<a href="about.php" id="nv">ABOUT US</a></li>
			<li class="rf"><a href="contact.php" id="nv">CONTACT</a></li>
			<li class="rp"><a href="table.php" id="nv">TABLES</a></li>		

			<li class="ad"><a href="setting.php" id="nv">FORM SETTING</a></li>
					<?php 
			session_start();
			error_reporting(0);
			if ($_SESSION['us']) {
				echo '<li class="lg"><a href="javascript:func()" id="nv">LOGOUT</a></li>';
			}
			else{
				echo'<li class="lg"><a href="login.php" id="nv">LOGIN</a></li>';}
				?>

		</ul><br><br>
	<center><br>
		
			<table border="1" cellspacing="0" cellpadding="0" width="" class="tab">
		<tr><th colspan="5">EDIT MATCH</th></tr><tr>
			<th>N<sup><u>o</u></sup></th>
			<th>Teams</th>
			<th>Match date</th>
			<th>Playground</th>
			<th>Referee</th>
		</tr>
		<tr>
			<form method="POST">
				<td></td><td>
					<!-- team 1 -->
				<select name="tm1">
				<?php
				$data=$sel->fetch_assoc();
				echo "<option value=".$data['t_id'].">".$data['t_name']."</option>";	
				 ?>
				<?php
				$t=$con->query("SELECT * FROM team");
				while ($da=$t->fetch_assoc())
				{
				echo "<option value=".$da['t_id'].">".$da['t_name']."</option>";
				}
				 ?>
				</select><br>
					<!-- team 2 -->
				<select name="tm2">
				<?php
				$lt=$con->query("SELECT * FROM team WHERE t_id='$data[t2_id]'");
				$dt=$lt->fetch_assoc();
				echo "<option value=".$dt['t_id'].">".$dt['t_name']."</option>";	
				 ?>
				<?php
				$t=$con->query("SELECT * FROM team");
				while ($da=$t->fetch_assoc())
				{
				echo "<option value=".$da['t_id'].">".$da['t_name']."</option>";
				}
				 ?>
				</select>
			</td><td>					
				<!-- Date -->
				<input type='datetime-local' name='dat' max='2010-24-01' value='<?php echo"$data[m_date]"; ?>'>
					</td>
					<td>
				<select name="pgd">
				<!-- Playground-->
				<?php
					$lt=$con->query("SELECT * FROM playground WHERE pg_id='$data[playground]'");
					$pgd=$lt->fetch_assoc();
				echo "<option value=".$pgd['pg_id'].">".$pgd['pg_name']."</option>";	
				$rf=$con->query("SELECT * FROM playground");
				while ($d=$rf->fetch_assoc())
				{
				echo "<option value=".$d['pg_id'].">".$d['pg_name']."</option>";
				}
				 ?>
				</select>						
					</td>
					<td>
				<select name="ref">
				<!-- Referee -->
				<?php
				echo "<option value=".$data['ref_id'].">".$data['f_name']." ".$data['l_name']."</option>";	
				 ?>
				<?php $a=1;
				$rf=$con->query("SELECT * FROM referees");
				while ($d=$rf->fetch_assoc())
				{
				echo "<option value=".$d['ref_id'].">".$d['f_name']." ".$d['l_name']."</option>";
				}
				 ?>
				</select>
					</td>
		</tr>
		<tr><td colspan="5" style="text-align: center;border:none;"><br><input type="submit" name="btn" value="UPDATE"><br>	<button onclick="window.location='team.php';">ADD TEAM</button> 
	<button  onclick="window.location='referee.php';">ADD REFEREE</button> 
	<button  onclick="window.location='player.php';">ADD PLAYER</button>
	<button  onclick="window.location='match.php';">ADD MATCH</button> <br></td></tr>
		</form>
		<?php 
		if (isset($_POST['btn'])) 
		{	echo"<br>".$pgd=$_POST['pgd']; echo"<br>".$mdt=$_POST['dat']; echo"<br>".$refer=$_POST['ref']; echo"<br>".$t1=$_POST['tm1']; echo"<br>".$t2=$_POST['tm2'];
			$up=$con->query("UPDATE  matches SET playground='$pgd',m_date='$mdt',ref_id='$refer',t1_id='$t1',t2_id='$t2' WHERE mt_id='$id'");
		if ($up)
		 {	
		 	header("refresh:1;");
			echo "<script>alert('Updated');</script>";
		}
		else
		{	header("refresh:1;");
			echo "<script>alert('Not updated');</script>";
		}
		}
		 ?>
	</table>
	<br><br>

			<script type="text/javascript">
		function func ()
		 {
			var a=confirm("Do you want to logout");
			if (a) {window.location.replace('logout.php')};
		}
		</script>
</body>
</html>