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
<script src="jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="CSS/ContactZ.css">
<meta charset="ISO-8859-1">
<title>Login</title>
<h1>Welcome to ContactZ</h1>
<p align="right">
</head>


<body>




	<!-- ---------------------------LOGIN FORM STARTS HERE-------------------------------  -->
	<div class="box">
		<div class="widecolumn" style="background-color: #d5d5d5;">
			<p>ContactZ is an online contact manager. Keep track of all of your contacts in one convenient website!</p>
			<p>Features: Add/Delete contacts, update information, and search!</p>
			<br>
			<p>ContactZ is free and always will be! </p>
			
		</div>
		<div class="thincolumn" style="background-color: #9aa2ab;">
			<form id = "form">
				<label for="username">Username:</label><br> <input type="text" id="username" name="username">
				<br>  <br>
				<label for="password">Password:</label><br> <input type="password" id="password" name="password">
			
			<br><br>
			<button type="button">Log In</button>
			<p id ="response" style="color:red"> </p>
			<!--<p>Form Handler also needed at /register.php and /addcontact.php </p>-->
			</form>
			<button onclick="window.location='https://'contactz.xyz/signup.php;"> Create An Account</button>
			

		</div>
	</div>
<script>
/*function login(){
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
            else
                document.getElementById("response").innerHTML = this.responseText;
        } 
    };
	var user = document.getElementById('username').value;
    var pass = document.getElementById('password').value;
   
    var payload = {username : user, password: pass};
    var json = JSON.stringify(payload);
    console.log(json);
    xhttp.open("POST", "API/login.php?login=" + json, true);
    xhttp.send();
}*/
$(document).ready(function() {
   $("button").click(function() {
       var payload = {username : $('#username').val(), password : $('#password').val()};
       payload = JSON.stringify(payload);
       console.log(payload);
       $.ajax({
           url:"API/login.php",
           data: {login : payload},
           datatype: "json",
           method: "POST",
           success: function(data) {
               if (data == "1")
                   window.location.replace('contacts.php');
               else
                $("#response").text(data);
           }
       }); 
   });    
});
</script>

</body>
</html>