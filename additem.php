<?php
session_start();
include "config.php";

$User = $_SESSION["USR_Name"];
$date = date('Y-m-d H:i:s');
$Name = $_POST['Name'];
$type = $_POST['type'];
$notes = "";
$FRZ_ID = $_POST['location'];

$brand="";
$model="";


$query = "SELECT freezer.brand, freezer.model FROM freezer WHERE freezer.frz_id = '$FRZ_ID'";
                            $result = $link -> query($query);
                            if($result -> num_rows == 0){
                            echo "No freezers in database, please add one first";
                            }
                            else{
                                while($row = $result -> fetch_assoc()){
                                    $brand = $row['brand'];
                                    $model = $row['model'];
                                }
                                $query = "UPDATE freezer SET status = status + 1 WHERE frz_id = '$FRZ_ID'";
                            }
                            
$location = $brand.' '. $model;
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
