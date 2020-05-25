<?php
session_start();
// Server parameters
$dbhost = 'localhost';
$dbuser = 'acdcecon_admin';
$dbpass = 'group12!@';
$dbname = 'acdcecon_functionality_test';

// Get login info
//$username = $_REQUEST["username"];
//$username = json_decode($username, true);
//$password = $_REQUEST["password"];
//$password = json_decode($password, true);

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
      //  header('Location: ../contacts.php');;
        echo 1;
    }
    
    else
    {
        echo 'Incorrect Login';
    }
}

$conn -> close();
?>