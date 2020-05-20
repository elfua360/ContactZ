<?php
// Server parameters
$dbhost = 'localhost';
$dbuser = 'acdcecon_admin';
$dbpass = 'group12!@';
$dbname = 'acdcecon_functionality_test';

// Get login info
$login = json_decode(file_get_contents('JSON/infile.json'), true);

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
        $firstName = $row["firstName"];
        $lastName = $row["lastName"];
        $id = $row["ID"];
        echo "User logged in\n";
    }
    
    else
    {
        echo "login failed";
    }
}

$conn -> close();
?>