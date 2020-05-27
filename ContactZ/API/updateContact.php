<?php
session_start();

// Server parameters
$dbhost = 'localhost';
$dbuser = 'acdcecon_admin';
$dbpass = 'group12!@';
$dbname = 'acdcecon_contactZ';

// for testing
$contact = json_decode(file_get_contents('JSON/infile.json'), true);

// extract details
$id = $contact["id"];
$firstname = $contact["firstname"];
$lastname = $contact["lastname"];
$number = $contact["number"];

// Get session is here

// Check for matching ids here

// Make connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error)
{
    die("Connection Error: " . $conn -> connect_error);
}

else
{
    $count = count_fields($firstname, $lastname, $number);
    
    if ($count <= 0)
        echo "No changes requested";
    
    else
    {
        // base sql code
        $sql = "UPDATE contacts SET ";
        $iter = 0;
        
        // Choose which columns to modify
        while ($iter < $count)
        {
            if (strlen($firstname) > 0)
            {
                $sql = ($count - $iter++) == 1 ? $sql . "firstname = '" . $firstname . "'" : $sql . "firstname = '" . $firstname . "', ";
                $firstname = "";
                continue;
            }
             
            if (strlen($lastname) > 0)
            {
                $sql = ($count - $iter++) == 1 ? $sql . "lastname = '" . $lastname . "'" : $sql . "lastname = '" . $lastname . "', ";
                $lastname = "";
                continue;
            }
            
            if (strlen($number) > 0)
            {
                $sql = ($count - $iter++) == 1 ? $sql . "number = '" . $number . "'" : $sql . "number = '" . $number . "', ";
                $number = "";
                continue;
            }    
        }
        
        $sql = $sql . 'WHERE id = ' . $id; 
        
        // Query code
        $result = $conn->query($sql);
        
        if ($result == false)
            echo 'Something went wrong';
        
        else
        {
            echo 'database updated';
        }
        
    }
  
}

function count_fields($fname, $lname, $num)
{
    $count = 0;
    
    if (strlen($fname) > 0)
        $count++;
    if(strlen($lname) > 0)
        $count++;
    if(strlen($num) > 0)
        $count++;
    
    return $count;
    
}

/*pseudo-code
**ALSO CREATE GETCONTACT.PHP

Check (at least) 4 variables holding firstname, lastname, number, id, *other traits*

get contact by id
if contact id does not match user id: throw error
For each feature besides id:
    if unset: ignore
    else begin:
        update corresponding row in contact with new info
endfor
echo result of operations
end
        


*/
?>