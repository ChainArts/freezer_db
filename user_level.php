<?php
    $query = "SELECT Usr_ID, usr_lvl FROM userdata";
    $result = $link-> query($query);

    $i = 0;
    foreach($_POST['level'] AS $key => $value){
        $newlevel = $_POST['level'];
        }
    $result = $link-> query($query);
    if($result->num_rows == 0){
        die("Error");
    }
    else{
        while ($row = $result-> fetch_assoc()){
            $userid = $row['Usr_ID'];
            $oldlevel = $row['usr_lvl'];
            if($newlevel[$i] != $oldlevel){
                $query = "UPDATE userdata SET usr_lvl='$newlevel[$i]' WHERE usr_id='$userid'";
                if(mysqli_query($link, $query)){
                    header('location: users');
                } else {
                    echo("Failed.");
                }
            }
            $i++;
        }
}
?>