<!DOCTYPE html>
<html>
<!-- ---------------------------HEAD STARTS HERE------------------------------------ -->
<head>
<link rel="stylesheet" type="text/css" href="CSS/ContactZ.css">
<meta charset="ISO-8859-1">
<title>ContactZ Online Contact Manager</title>
<h1>Welcome, User Name Here</h1>
<p align="right">
<button onclick="window.location='https://'contactz.xyz/addcontact.html;">Add Contact</button>
<button onclick="window.location='http://contactz.xyz/logout.html';">Log Out</button>
</p>

<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  padding: 10px;
  height: 300px;
}

.left {
  width: 25%;
}

.right {
  width: 75%;
  ;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<!-- ----------------------------HEAD ENDS HERE--------------------------------------- -->


<!-- ---------------------------BODY STARTS HERE-------------------------------------- -->
<body>

	<div class="box">
		<div class="sidenav" style="background-color: #fffa99;">
			<h2>List of Contacts</h2>
			<div class="scrollable" style="background-color: #fffa99;">

				<button type="button" onclick="getInfo1()">Andy Baker</button>
				<p></p>
				<button type="button" onclick="getInfo2()">Jane Doe</button>
				<p></p>
				<button type="button" onclick="getInfo3()">John Smith</button>
				<p></p>
				<button type="button" onclick="getInfo1()">Andy Baker</button>
				<p></p>
				<button type="button" onclick="getInfo2()">Jane Doe</button>
				<p></p>
				<button type="button" onclick="getInfo3()">John Smith</button>
				<p></p>
				<button type="button" onclick="getInfo1()">Andy Baker</button>
				<p></p>
				<button type="button" onclick="getInfo2()">Jane Doe</button>
				<p></p>
				<button type="button" onclick="getInfo3()">John Smith</button>
				<p></p>
				<button type="button" onclick="getInfo1()">Andy Baker</button>
				<p></p>
				<button type="button" onclick="getInfo2()">Jane Doe</button>
				<p></p>
				<button type="button" onclick="getInfo3()">John Smith</button>
				<p></p>
			</div>
		</div>
		<div class="widecolumn" style="background-color: #fce6ff;">
			<h2 id="title">Click on a name to see information</h2>
			<p></p>
			<p id="firstname">First Name:</p>
			<p></p>
			<p id="lastname">Last Name:</p>
			<p></p>
			<p id="phone">Phone Number:</p>
			<p></p>
			<p id="email">Email:</p>
			<p></p>
			<button type="button" onclick="delete1()">Delete Contact</button>
		</div>
	</div>


	<script>
function getInfo1() { 
	document.getElementById("title").innerHTML = "Contact Information";
  	document.getElementById("firstname").innerHTML = "First Name: Andy";
  	document.getElementById("lastname").innerHTML = "Last Name: Baker";
  	document.getElementById("phone").innerHTML = "Phone Number: 407-123-4567";
  	document.getElementById("email").innerHTML = "Email: andy.baker@ucf.edu";
}
function getInfo2() { 
	document.getElementById("title").innerHTML = "Contact Information";
	  document.getElementById("firstname").innerHTML = "First Name: Jane";
	  document.getElementById("lastname").innerHTML = "Last Name: Doe";
	  document.getElementById("phone").innerHTML = "Phone Number: 407-987-6543";
	  document.getElementById("email").innerHTML = "Email: jane.doe@ucf.edu";
	}
function getInfo3() { 
	document.getElementById("title").innerHTML = "Contact Information";
	  document.getElementById("firstname").innerHTML = "First Name: John";
	  document.getElementById("lastname").innerHTML = "Last Name: Smith";
	  document.getElementById("phone").innerHTML = "Phone Number: 407-555-5555";
	  document.getElementById("email").innerHTML = "Email: john.smith@ucf.edu";
	}
function delete1(){
	  if (confirm("Are you sure you want to delete this contact?")) {
		  <!-- needs function to actually remove contact from database.-->
		  alert("Contact has been deleted.");
		  document.getElementById("title").innerHTML = "Click on a name to see information";
		  document.getElementById("firstname").innerHTML = "First Name:";
		  document.getElementById("lastname").innerHTML = "Last Name:";
		  document.getElementById("phone").innerHTML = "Phone Number:";
		  document.getElementById("email").innerHTML = "Email:";
		  
	  } else {
	    alert("Contact has not been deleted.")
	  }
}
</script>

</body>
<!-- -----------------------------BODY ENDS HERE-------------------------------------- -->
</html>