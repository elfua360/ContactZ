<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
{
    header('Location: contacts.php');
}

else
{
    $_SESSION['loggedin'] = FALSE;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/ContactZ.css">
<meta charset="ISO-8859-1">
<title>Login</title>
<h1>Welcome to ContactZ</h1>
<p align="right">
</head>


<body>




	<!-- ---------------------------LOGIN FORM STARTS HERE-------------------------------  -->
	<div class="box">
		<div class="widecolumn" style="background-color: #fce6ff;">
			<p>ContactZ is an online contact manager. The site is under construction right now. </p>
			<p>Site Map:</p>
			<a href="https://contactz.xyz/contacts.html">Homepage after logging in</a>
			<br><br>
			<a href="https://contactz.xyz/addcontact.html">Create New Contact</a>
			<br><br>
			<a href="https://contactz.xyz/register.html">Create an Account</a>
			<br><br>
			<a href="https://contactz.xyz/logout.html">Logout Screen</a>
			<br><br>
			
			<a href="https://contactz.xyz/register.html">Register here!</a>
		</div>
		<div class="thincolumn" style="background-color: #fffa99;">
			<form action="API/login.php" method = "post">
				<label for="username">Username:</label><br> <input type="text" id="username" name="username">
				<br>  <br>
				<label for="password">Password:</label><br> <input type="text" id="password" name="password">
			
			<br><br>
			<input type="submit" value="Log In">
			<p>( Login needs form handler code at http://contactz.xyz/login.php )</p>
			<p>Form Handler also needed at /register.php and /addcontact.php </p>
			</form>
			

		</div>
	</div>
<script>
function redirect(){
	
}
</script>

</body>
</html>