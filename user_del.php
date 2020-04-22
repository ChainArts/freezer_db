<?php
    include "config.php";
    $id = $_GET["id"];
    $query="DELETE FROM userdata WHERE userdata.usr_id='$id'";
    if(mysqli_query($link, $query)){
        header('location: users');
    } else {
        echo "Failed to delete User":
    }
?>