<?php
session_start();

// Server parameters
$dbhost = 'localhost';
$dbuser = 'acdcecon_admin';
$dbpass = 'group12!@';
$dbname = 'acdcecon_contactZ';

// For testing
//$contact_id = json_decode(file_get_contents('JSON/infile.json'));

$contact = $_GET["contact"];
$contact = json_decode($contact, true);
$contact_id = $contact["id"];

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
        echo -1;
        
    $contact = $result->fetch_assoc();
    
    echo json_encode($contact);
}

?>