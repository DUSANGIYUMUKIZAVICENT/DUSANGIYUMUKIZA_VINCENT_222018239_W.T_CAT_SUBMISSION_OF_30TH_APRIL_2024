<html>
<head>
	<title>SHOOL TOURNAMENT</title>
	<style type="text/css">
		*
		{
			margin: 0;
			background: url(cd.png);
		}
	fieldset{width: 70%;text-align: center;border-radius: 5px;border-color: blue; padding: 50px;}
	legend{font-size: 30px;color: seagreen;}
	input[type=text],[type=Password],[type=email],[type=tel]{
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
		background: url(pc5jpg);background-size: 100%;
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
		<fieldset><legend>REGISTRATION FORM</legend><br>
	<label>Names : </label><input type="text" name="nm" placeholder="Enter names" required><BR><BR>
	<label>Email : </label><input type="email" name="em" placeholder="Enter e-mail" required><BR><BR>
	<label>Phone : </label><input type="tel" name="tel" placeholder="Phone number" register><BR><BR>
	<label>Username : </label><input type="text" name="usr" placeholder="Enter username" required><BR><BR>
	<label>Password : </label><input type="password" name="ps" placeholder="Enterpassword" required><BR><BR>
	<label>Password : </label><input type="password" name="ps1" placeholder="Re-enter password" required><BR><BR>
	<input type="submit" name="sb" value="REGISTER"><BR>
	<p class="fg">I have acount <h4 onclick="window.location='login.php'" class="rgs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login</h4></p>
	</fieldset><br>
	</form>
</center>
<?php 
include 'connect.php';
if (isset($_POST['sb'])) 
{
	$usr=md5($_POST['usr']);$ps=md5($_POST['ps']);
	$sel=$con->query("SELECT * FROM `users` where names='$_POST[nm]' and u_name='$usr' and u_password='$ps' and user_type='ON' or user_type='MNG'");
	if (mysqli_num_rows($sel)>) 
	{
		 echo"<script>alert('User arleady exist');</script>";
	}
	elseif (! (mysqli_num_rows($sel)) )
	 {
	 	if ($ps=md5($_POST['ps1']))
	 	 {
	 	$ins=$con->query("INSERT INTO users VALUES('','$_POST[nm]','$_POST[em]','$_POST[tel]','$usr','$ps','OFF')");	
	 	if ($ins) 
	 	{header("refresh:1;");
	 		echo"<script>alert('Welcome $_POST[nm] you are sucessfuly registered');window.location='login.php';</script>";
	 	}
	 	}
		else
		{
		echo"<script>alert('Enter same password to register');</script>";
		} 
	}
	else
	{
			echo "<script>alert('Oop Indentification are invalid ');</script>";
	}
}
 ?>
 ?>
</body>
</html>