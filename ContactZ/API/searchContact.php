<?php
session_start();

// Server parameters
$dbhost = 'localhost';
$dbuser = 'acdcecon_admin';
$dbpass = 'group12!@';
$dbname = 'acdcecon_functionality_test';

// for testing
$contact = file_get_contents('JSON/infile.txt');

// $contact = $_REQUEST["contact"];
I
$contact = strtolower($contact); // Find way to properly compare database entries and searches

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
    $result = $conn->query($sql);
    $ids = array();
    
    if ($result->num_rows == 0)
        echo 'No results found\n';
    
    else
    {
        // store each id in an array
        while ($row = $result->fetch_assoc())
            array_push($ids, $row['id']);
                     
        // send ids **consider sending back as json
        foreach($ids as $id)
            echo $id . "\n";
    }
}

$conn->close();

?>