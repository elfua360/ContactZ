<?php
session_start();

// Server parameters
$dbhost = 'localhost';
$dbuser = 'acdcecon_admin';
$dbpass = 'group12!@';
$dbname = 'acdcecon_contactZ';

// Get login info
$register = $_POST["register"];
$register = json_decode($register, true);

// For testing
//$register = json_decode(file_get_contents('JSON/infile.json'), true);

// Make connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// If connection fails
if ($conn -> connect_error)
{
    die("Connection Error: " . $conn -> connect_error);
}

// Continue with registration
else
{  
    $sql = "SELECT * FROM users where username='" . $register["username"] . "'";
    $result = $conn->query($sql); 
    
    // The username is already taken
    if ($result->num_rows > 0)
    {
        echo 'Username already exists';
        ob_flush();
    }
    
    else 
    {
        // get new user details
        $username = $register["username"];
        $password = $register["password"];
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $firstname = $register["firstname"];
        $lastname = $register["lastname"];
        
        // Make sure names are right length
        if (checkName($username) && checkname($password) && checkname($firstname) && checkname($lastname))
        {
            $sql = "INSERT into users (firstname, lastname, username, password) VALUES('" . $firstname . "', '" . $lastname . "', '" . $username . "', '" . $hash . "')";
            $result = $conn->query($sql);
            
            // Check if query was succesful
            if ($result)
            {
                echo '1';
            }
                
            else
            {
                echo 'Error: ' . $sql . $conn->error;
            }
        }
        
        else
        {
            echo 'Invalid parameters';
            ob_flush();
        }
    }
}

$conn -> close();


function checkName($name)
{
    if (strlen($name) > 0 && strlen($name) < 50)
        return TRUE;
    
    else
        Return FALSE;
}
?>