<?php
session_start();
print("script start");
ob_flush();

// Server parameters
$dbhost = 'localhost';
$dbuser = 'acdcecon_admin';
$dbpass = 'group12!@';
$dbname = 'acdcecon_functionality_test';

// for testing
$contact = file_get_contents('JSON/infile.txt');

// $contact = $_REQUEST["contact"];

$contact = strtolower($contact);

/*
    Handle session details here
*/

// Make connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error)
{
    die("Connection Error: " . $conn -> connect_error);
}


else
{
    // Grab each contact id with a potential match
  //  $sql = "SELECT id FROM contacts where (userid='" . $_SESSION["id"] . ") and (number='" . $contact . "' or firstname='" . $contact ."' or lastname='" . $contact . "')";
    
    // For testing
    $sql = "SELECT id FROM contacts where (number LIKE '" . $contact . "%' or firstname LIKE '" . $contact ."%' or lastname LIKE '" . $contact . "%')";
    echo $sql;
    $result = $conn->query($sql);
    
    if ($result->num_rows == 0)
        echo 'No results found\n';
    
    $ids = array();
    
    else
    {
        // store each id in an array
        while ($row = $result->fetch_assoc())
            array_push($ids, $row['id']);
                     
        // send ids
        echo $ids;
    }
}

conn->close();

?>