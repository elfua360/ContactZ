<?php
    session_start();
    // Server parameters
    $dbhost = 'localhost';
    $dbuser = 'acdcecon_admin';
    $dbpass = 'group12!@';
    $dbname = 'acdcecon_contactZ';

    // Extract users information and get it as an array
    $add = $_POST["add"];
    $add = json_decode($add, true);

    // Take contact information and store them in appropriate fields
    $firstname = $add["firstname"];
    $lastname = $add["lastname"];
    $number = $add["number"];
    $email = $add["email"];
    $uid = 0;

    if (strlen($firstname) <= 0 || strlen($lastname) <= 0 || strlen($number) <= 0 || strlen($email) <= 0)
        die("Invalid parameters");

    if (isset($_SESSION['id']))
        $uid = $_SESSION['id'];
        
    else 
        die('Error creating contact');
    

    // Conect to database
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Verify connection to the database has been made
    if ($conn -> connect_error)
    {
        die("Connection Error: " . $conn -> connect_error);
    }

    else
    {
        $sql = "SELECT * FROM contacts where firstname='" . $firstname . "' and lastname='" . $lastname . "' and number='" . $number . "' and userid=" . $uid . " and email = '" . $email . ",";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0)
            echo 'contact already exists';
        
        
        else
        {
             // Create an sql statement that will insert the contact, linking it to the user with the users ID
            $sql = "INSERT INTO contacts (userid, lastname, firstname, number, email, fullname) VALUES (". $uid . ", '" . $lastname . "', '" . $firstname . "', '" . $number . "', '" . $email . "', '" . $firstname . " " . $lastname . "')";
            
            $result = $conn->query($sql);
            
            if ($result != TRUE)
                echo 'Error creating contact.';
               
            else
                echo '1';
        
        }
        
       
        // Close the connection to the database
        $conn->close();
    }

?>
