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
    $delete = json_decode(file_get_contents('JSON/infile.json'), true);

    // Take contact information and store them in appropriate fields
 //   $UID = $inData["UID"];
    $id = $delete["id"];

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
        $sql = "SELECT * FROM contacts where id=" . $id;
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0)
        {
            // Create an sql statement that will DELETE the contact, linking it to the user with the users ID
            $sql = "DELETE FROM contacts Where id=" . $id;
            echo $sql . "\n";
            $result = $conn->query($sql);
            
            
            $sql = "SELECT * FROM contacts where id=" . $id;
            echo $sql;
            echo "\n";
            $result = $conn->query($sql);
            
            // Check if contact was ACTUALLY deleted
            if ($result->num_rows > 0)
            {
                echo 'Error deleting contact.';
            }
            
            else
            {
                echo 'Contact deleted.';
            }
            
        }
        else
        {
            echo 'Contact does not exist.';
        
        }
        
       
        // Close the connection to the database
        $conn->close();
    }

?>