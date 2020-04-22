<?php
    session_start();
    include "config.php";
    $id = $_GET["id"];
    $query="DELETE FROM contents WHERE item_id='$id'";
    if(mysqli_query($link, $query)){
        header('location: contents.php');
    } else {
        echo("Failed.");
    }
?>