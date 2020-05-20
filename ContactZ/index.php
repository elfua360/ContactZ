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
			<p>ContactZ is an online contact manager.</p><a href="https://contactz.xyz/register">Register here!</a>
		</div>
		<div class="thincolumn" style="background-color: #fffa99;">
			<form>
				<label for="username">Username:</label><br> <input type="text" id="username" name="username">
				<br> 
				<label for="lname">Password:</label><br> <input type="text" id="password" name="password">
			</form>
			<br>
			<button onclick="login()">Log In</button>
            <!-- document.location = 'https://contactz.xyz/contacts.html' -->
			<!-- <input type="submit" value="Log In"> actual button, change later -->

		</div>
	</div>
<script>
function login(){
    console.log('login called');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            console.log(this.responseText);
            // print php response here
            if (this.responseText == 1)
                window.location.replace('contacts.php');
        }
    };
	var user = document.getElementById('username').value;
    var pass = document.getElementById('password').value;
   
    var payload = {username : user, password: pass};
    var json = JSON.stringify(payload);
    console.log(json);
    xhttp.open("POST", "API/login.php?login=" + json, true);
    xhttp.send();
}
</script>

</body>
</html>