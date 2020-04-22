<?php
session_start();
include "config.php";

$Brand = $_POST['Brand'];
$Model = $_POST['Model'];
$Capacity = $_POST['Capacity'];
$Location = $_POST['Location'];

    
    try 
    {   
        mysqli_query($link, "INSERT INTO freezer 
        
        (Brand, Model, Capacity, Location) 
        
        VALUES
        ('$Brand','$Model','$Capacity','$Location')");
        
         if(mysqli_affected_rows($link) > 0){
            echo "<p>Freezer Added</p>";
            echo "<p>Click here if you are not redirected automatically!</p>"; 
            echo "<a href='landing'>Dashboard</a>";
        } else {
            echo "Freezer NOT added<br/>";
            echo mysqli_error ($link);
        }
        
    }
    catch(Exeption $e)
    {    
        echo 'Message: ' .$e->getMessage();
    };


?>

<meta http-equiv="refresh" content="1;URL=landing">