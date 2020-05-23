<?php
session_start();
// Server parameters
$dbhost = 'localhost';
$dbuser = 'acdcecon_admin';
$dbpass = 'group12!@';
$dbname = 'acdcecon_functionality_test';

// Get login info
$login = $_REQUEST["login"];
$login = json_decode($login, true);

// Make connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn -> connect_error)
{
    die("Connection Error: " . $conn -> connect_error);
}

else
{
    $sql = "SELECT id,firstname,lastname FROM users where username='" . $login["username"] . "' and password='" . $login["password"] . "'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        /*$firstName = $row["firstname"];
        $lastName = $row["lastname"];
        $id = $row["id"]; */
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $row['firstname'];
        $_SESSION['id'] = $row['id'];
      //  echo 'Welcome ' . $_SESSION['name'];
        echo '1';
    }
    
    else
    {
        echo "Incorrect login";
    }
}

$conn -> close();
?>