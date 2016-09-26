<?php
	session_start();
	if (!empty($_SESSION['uid'])){ 
		header("location:home.php"); 
	}
	else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/mystyle.css"> -->
</head>
<body>
<div class="container">
<div class="header">
	<img class="header" src="images/head.png">
</div>
<br><br><br>
<div class="loginform">
	<table align="center">
		<form method="post" action="pros_login.php"> 
			<tr>
				<td colspan="3"><b>Silahkan Login</b><hr></td>
			</tr>
			<tr>
				<td>Username</td>
				<td>&nbsp;</td>
				<td><input type="text" name="uid" placeholder="username" required autofocus></td>
			</tr>
			<tr>
				<td>Password</td> 
				<td>&nbsp;</td>
				<td><input type="password" name="pass" placeholder="password" required></td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td colspan="3" align="right">
					<button type="submit" name="blog">LOGIN</button>
				</td>
			</tr>
		</form>
	</table>
</div>
<br><br><br>
<div class="footer">
	2014 &copy; STMIK Indonesia - sCrypto & team
</div>
</div>
</body>
</html>

<?php
	}
?>