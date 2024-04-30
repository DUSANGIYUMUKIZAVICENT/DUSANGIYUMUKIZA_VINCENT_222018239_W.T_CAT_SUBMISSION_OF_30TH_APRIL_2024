<html>
<head>
	<title>SCHOOL TOURNAMENT</title>
	<style type="text/css">
		*
		{
			margin: 0;
			background: url(cd.png);
		}
	fieldset{width: 70%;text-align: center;border-radius: 5px;border-color: blue; padding: 50px;}
	legend{font-size: 30px;color: seagreen;}
	input[type=text],[type=Password]{
		border-style: none;outline: none;border: 2px groove blue;
		padding: 8px;border-radius: 5px;
	}
	label{color: blue;font-size: 25px;}h2{color: blue;width: 70%;}
	form
	{
		width: 70%;background: #aaa;opacity: 90%;
	}
	body
	{
		background: url(pc5.jpg);background-size: 100%;
	}
	input[type=submit]
	{
		outline: none;
		background:seagreen;
		padding: 8px;
		width: 150px;
		margin-left: 105px;
		border-radius: 5px;color: white;
	}
	.rgs:hover
	{
		cursor: pointer;
	}
	.fg
	{
		margin-left: 70px;
	}
	</style>
</head>
<body><center><br><br>	
	<h2 style="font-size: 30px;background: #aaa;color: white;padding: 5px;">CLASS TOURNAMENT MANAGEMENT STSTEM</h2>
	<form method="POST"><br>
		<fieldset><legend>LOGIN FORM</legend><br>
	<label>Username : </label><input type="text" name="usr" placeholder="username" required><BR><BR>
	<label>Password : </label><input type="password" name="ps" placeholder="password" required><BR><BR>
	<input type="submit" name="sb" value="LOGIN"><BR>
	<p class="fg">I don`t have acount <h4 onclick="window.location='register.php'" class="rgs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create account</h4></p><BR>
	</fieldset><br><br>
	</form>
</center>
<?php 
include 'connect.php';
if (isset($_POST['sb'])) 
{
	$usr=md5($_POST['usr']);$ps=md5($_POST['ps']);
	$sel=$con->query("SELECT * FROM `users` where u_name='$usr' and u_password='$ps' and user_type='ON' or user_type='MNG'");
	$D=$sel->fetch_assoc();$ft=$D['names'];
	if ($usr=$D['u_name'] and $ps=$D['u_password']) 
	{	session_start();
		$_SESSION['us']=$_POST['usr'];
		$_SESSION['v']=$D['user_type'];
			header("refresh:1;");
		 echo"<script>alert('Hey $ft ! welcome');window.location.replace('index.php');</script>";
	}
	else
	{	header("refresh:1;");
			echo "<script>alert('Oop Indentification are not correct ');</script>";
	}
}
 ?>
</body>
</html>