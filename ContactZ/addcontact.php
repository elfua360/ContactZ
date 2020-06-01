<?php
session_start();

if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'])
{
    header('Location: index.php');
}

else
{
    $_SESSION['loggedin'] = TRUE;
}
?>
<!DOCTYPE html>
<html>
<head>
<script src="jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="CSS/ContactZ.css">
<meta charset="ISO-8859-1">
<title>Add a new contact</title>
<h1>Add a New Contact</h1>

</head>


<!-- -----------------------BODY STARTS HERE------------------------ -->
<body>
<div class="formholder">
	<form id ="form">
		<label for="firstname">First name:</label><br> <input type="text"
			id="firstname" name="firstname"> <br> <br> <label
			for="lastname">Last name:</label><br> <input type="text"
			id="lastname" name="lastname"> <br> <br> <label
			for="phone">Phone Number:</label><br> <input type="text"
			id="phone" name="phone"> <br> <br> <label
			for="email">Email:</label><br> <input type="text" id="email"
			name="email"> <br>
		<br> <button type="button">Add Contact</button>
        <p id ="response" style="color:red"> </p>
	</form>
</div>
<script>
$(document).ready(function() {
   $("button").click(function() {
        var payload = {firstname : $('#firstname').val(), lastname : $('#lastname').val(), number : $('#phone').val()};
        payload = JSON.stringify(payload);  
        console.log(payload);
        $.ajax({
            url:"API/addContact.php",
            data: {add : payload},
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