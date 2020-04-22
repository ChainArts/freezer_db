<?php
session_start();
include "config.php";

$User = $_SESSION["USR_Name"];
$date = date('Y-m-d H:i:s');
$Name = $_POST['Name'];
$type = $_POST['type'];
$notes = $_POST['notes'];
$FRZ_ID = $_POST['location'];

$location = $_POST['location'];


 $query = "UPDATE freezer SET freezer.status = freezer.status + 1 WHERE freezer.frz_id = '$FRZ_ID'";
        if(mysqli_query($link, $query)){
                echo "Status Updated";
                }
                else{
                echo "Status not Updated";
                                    
                    }
 try 
    {   
        mysqli_query($link, "INSERT INTO contents
        
        (name, date, user, location, type, notes) 
        
        VALUES
        ('$Name','$date','$User','$location','$type','$notes')");
        
         if(mysqli_affected_rows($link) > 0){
            echo "<p>Item stored</p>";
            echo "<p>Click here if you are not redirected automatically!</p>"; 
            echo "<a href='landing'>Dashboard</a>";
        } else {
            echo "Item NOT stored<br />";
            echo mysqli_error ($link);
        }
        
    }
    catch(Exeption $e)
    {    
        echo 'Message: ' .$e->getMessage();
    };



?>

<meta http-equiv="refresh" content="1;URL=contents?sort=Date"/>
