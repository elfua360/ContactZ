<?php
session_start();

// Server parameters
$dbhost = 'localhost';
$dbuser = 'acdcecon_admin';
$dbpass = 'group12!@';
$dbname = 'acdcecon_contactZ';

// for testing
$contact = $_GET["contact"];
$contact = json_decode($contact, true);

$contact = strtolower($contact["contact"]); // Find way to properly compare database entries and searches

// check ids
if(!isset($_SESSION["id"]))
    die("Fatal error");

// Make connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error)
{
    die("Connection Error: " . $conn -> connect_error);
}

else
{
    // Grab each contact id with a potential match
 //   $sql = "SELECT id FROM contacts where (userid='" . $_SESSION["id"] . ") and (number='" . $contact . "' or firstname='" . $contact ."' or lastname='" . $contact . "')";
    

    $sql = "SELECT * FROM contacts where (userid=" . $_SESSION["id"] . ") and (number LIKE '" . $contact . "%' or firstname LIKE '" . $contact ."%' or lastname LIKE '" . $contact . "%' or fullname LIKE '" . $contact . "%' or email LIKE '" . $contact . "%')";
    $result = $conn->query($sql);
    $contacts = array();
    
    if ($result->num_rows == 0)
        echo -1;
    
    else
    {
        // store each id in an array
        while ($row = $result->fetch_assoc())
            array_push($contacts, $row);
                     
        // send ids **consider sending back as json
        //foreach($ids as $id)
        //    echo $id . "\n";
        echo json_encode($contacts);   
    }
}

$conn->close();

?>