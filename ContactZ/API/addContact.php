<?php
    session_start();
    // Server parameters
    $dbhost = 'localhost';
    $dbuser = 'acdcecon_admin';
    $dbpass = 'group12!@';
    $dbname = 'acdcecon_functionality_test';

    // Extract users information and get it as an array
//   $add = $_REQUEST["add"];
//   $add = json_decode($add, true);

    // For testing
    $add = json_decode(file_get_contents('JSON/infile.json'), true);

    // Take contact information and store them in appropriate fields
 //   $UID = $inData["UID"];
    $firstname = $add["firstname"];
    $lastname = $add["lastname"];
    $number = $add["number"];
    $uid = 1;

   /* if (isset($_SESSION['id']))
        $uid = $_SESSION['id'];
        
    else
    {
        die('Error creating contact');
    } */

    // Establish a secure connection to the database
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Verify connection to the database has been made
    if ($conn -> connect_error)
    {
        die("Connection Error: " . $conn -> connect_error);
    }

    else
    {
        $sql = "SELECT * FROM contacts where firstname='" . $firstname . "' and lastname='" . $lastname . "' and number='" . $number . "' and userid=" . $uid;
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0)
            echo 'contact already exists.\n';
        
        
        else
        {
             // Create an sql statement that will insert the contact, linking it to the user with the users ID
            $sql = "INSERT INTO contacts (userid, lastname, firstname, number) VALUES (". $uid . ", '" . $lastname . "', '" . $firstname . "', '" . $number . "')";
            
            $result = $conn->query($sql);
            
            if ($result != TRUE)
                echo 'Error creating contact.';
               
            else
                echo 'Contact added';
        
        }
        
       
        // Close the connection to the database
        $conn->close();
    }

?>
