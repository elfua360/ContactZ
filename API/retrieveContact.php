<?php
session_start();

// Server parameters
$dbhost = 'localhost';
$dbuser = 'acdcecon_admin';
$dbpass = 'group12!@';
$dbname = 'acdcecon_functionality_test';

// For testing
$contact_id = json_decode(file_get_contents('JSON/infile.json'));

// Make connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// If connection fails
if ($conn -> connect_error)
{
    die("Connection Error: " . $conn -> connect_error);
    ob_flush();
}

else
{
    $sql = "SELECT * FROM contacts where id=" . $contact_id;
    $result = $conn->query($sql);
    
    if ($result->num_rows > 1 || $result->num_rows <= 0)
        echo 'Error getting contact'
        
    $contact = $result->fetch_assoc();
    
    echo json_encode($contact);
}

?>