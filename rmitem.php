<?php
    session_start();
    include "config.php";
    $id = $_GET["id"];

    $query="SELECT contents.location FROM contents WHERE contents.item_id ='$id'";
    $result = $link -> query($query);
    if($result -> num_rows == 0){
            echo "No freezers in database, please add one first";
            }
            else{
            while($row = $result -> fetch_assoc()){
                                    
                $query2 = "UPDATE freezer SET freezer.status = freezer.status -1 WHERE freezer.frz_id = '$row[location]'";
                if(mysqli_query($link, $query2)){
                    echo "Status Updated";
                }
                else{
                echo "Status Not Updated";                
                }
                
            }
            $query3="DELETE FROM contents WHERE item_id='$id'";
            if(mysqli_query($link, $query3)){
            header('location: contents.php');
            }       
            else {
            echo("Failed.");
            }    
        }
?>

<meta http-equiv="refresh" content="10;URL=contents?sort=Date"/>