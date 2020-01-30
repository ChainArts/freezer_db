<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$username = mysqli_real_escape_string($link, $_POST['username']);
$result = mysqli_query($link, "SELECT * FROM userdata WHERE username='$username'");
if($result->num_rows == 0){
    $nameErr = "Incorrect username or password";
}
else{
    $user = mysqli_fetch_assoc($result);
    if(password_verify($_POST['pass'],$user['password'])){
        
        $_SESSION["USR_Name"] = $user['username'];
        $_SESSION["USR_PASS"] = $user['password'];
        $_SESSION["USR_VNAME"] = $user['firstname'];
        $_SESSION["USR_SNAME"] = $user['lastname'];
    }
    else{
        $nameErr = "Incorrect username or password (bcrypt)";
    }
}
}
mysqli_free_result($result);
?>