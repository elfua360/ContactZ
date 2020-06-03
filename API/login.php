<?php
session_start();
// Server parameters
$dbhost = 'localhost';
$dbuser = 'acdcecon_admin';
$dbpass = 'group12!@';
$dbname = 'acdcecon_contactZ';

// Get login info
/*$username = $_POST["username"];
$username = json_decode($username, true);
$password = $_POST["password"];
$password = json_decode($password, true);*/

$login = $_POST["login"];

$login = json_decode($login, true);

// Make connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn -> connect_error)
{
    die("Connection Error: " . $conn -> connect_error);
}

else
{
    /*$sql = "SELECT id,firstname,lastname FROM users where username='" . $login["username"] . "' and password='" . $login["password"] . "'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $row['firstname'];
        $_SESSION['id'] = $row['id'];
      //  echo 'Welcome ' . $_SESSION['name'];
      //  header('Location: ../contacts.php');
        echo "1";
    } */
    
    $sql = "SELECT * FROM users where username='" . $login["username"] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows <= 0 || $result->num_rows > 1)
        echo 'Incorrect Login';
    
    else
    {
        $row = $result->fetch_assoc();
        if (password_verify($login["password"], $row["password"]))
        {
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $row['firstname'];
            $_SESSION['id'] = $row['id'];
            echo "1";
        }
        
        else
        {
            echo "Incorrect login";
        }
    }
}

$conn -> close();
?>