<!DOCTYPE html>
<html>
<head>
<script src="jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="CSS/ContactZ.css">	
<meta charset="ISO-8859-1">
<title>Register</title>
<h1>Create an Account with ContactZ</h1>
</head>
<body>

<div class="formholder">
<form id="form">
		<label for="firstname">First Name:</label><br> 
		<input type="text"id="firstname" name="fname"> <br> 
		<br> 
		<label for="lastname">Last Name</label><br> 
		<input type="text" id="lastname" name="lname"> <br> 
		<br> 
        <label for="username">Username</label><br> 
		<input type="text" id="username" name="uname"> <br> 
		<br> 
		<label for="password">Password:</label><br> 
		<input type="password" id="password" name="password"> <br>
		<br> 
		<label for="password">Confirm Password:</label><br> 
		<input type="password" id="cpassword" name="cpassword"> <br>
		<br> 
		<button type="button">Sign Up!</button>
        <p id ="response" style="color:red"> </p>
	</form>
	</div>
<script>
$(document).ready(function() {
   $("button").click(function() {
      if ($("#password").val() != $("#cpassword").val())
          $("#response").text("Passwords must match!");
       else {
           var payload = {username : $('#username').val(), password : $('#password').val(), firstname : $('#firstname').val(), lastname : $('#lastname').val()};
           payload = JSON.stringify(payload);  
           console.log(payload);
           $.ajax({
                url:"API/register.php",
                data: {register : payload},
                datatype: "json",
                method: "POST",
                success: function(data) {
                    if (data == "1")
                        window.location.replace('index.php');
                    else
                        $("#response").text(data);
                }
            }); 
        }
    });    
});
</script>
</body>
</html>