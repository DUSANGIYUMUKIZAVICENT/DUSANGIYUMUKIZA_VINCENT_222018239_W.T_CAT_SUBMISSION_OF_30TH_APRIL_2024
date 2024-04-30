<?php 
error_reporting(0);
include 'connect.php';
	$id=$_GET['mt'];
	$id1=$_GET['mc'];
	$sc=$con->query("SELECT DISTINCT matches.*,referees.*,team.*,playground FROM  matches JOIN referees ON(matches.ref_id=referees.ref_id) JOIN team ON(matches.t1_id=team.t_id) JOIN playground ON(matches.playground=playground.pg_id) WHERE mt_id='$id' or mt_id='$id1'"); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SCHOOL TOURNAMENT</title>
</head>
<body>
<?php 

include 'connect.php';
$dt=$sc->fetch_assoc();
$usr=$dt['t_name'];$date=$dt['m_date'];
$pgy=$dt['pg_name'];
if (!empty($id))
{
$ins=$con->query("UPDATE matches SET action='OFF' WHERE mt_id='$id'");
			$slt=$con->query("SELECT * FROM team WHERE t_id='$dt[t2_id]'");
			$pg=$con->query("SELECT * FROM playground WHERE pg_id='$dt[playground]'");
			$b=$slt->fetch_assoc();
			$p=$pg->fetch_assoc();
			$BV=$b['t_name'];
			$pgy=$pg['pg_name'];
	if ($ins)
	 {
		header("refresh:1;");
		echo "<script>alert('You`re deleted $usr Vs $BV  that was supposed to be ON $date at $pgy sucessfully  ');history.back();</script>";
	}
}
elseif (!empty($id1))
 {
 	$in=$con->query("UPDATE matches SET action='ON' WHERE mt_id='$id1'");
			$sl=$con->query("SELECT * FROM team WHERE t_id='$dt[t2_id]'");
			$p=$con->query("SELECT * FROM playground WHERE pg_id='$dt[playground]'");
			$bn=$sl->fetch_assoc();
			$p=$p->fetch_assoc();
			$B=$bn['t_name'];
	if ($in)
	 {
		header("refresh:1;");
		echo "<script>alert('$usr Vs $B supposed to be ON $date at $pgf activated sucessfully');history.back();</script>";
	}
}
	else
	{
		header("refresh:1;");
		echo "<script>alert('Unsucessfully');history.back();</script>";
	}
 ?>
</body>
</html>