<?php
include "config.php";
?>


<!DOCTYPE HTML>
<html>

<head>
    <title> Freezer Management | Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Stylesheets-->
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300|Source+Sans+Pro:200,300,400&display=swap" rel="stylesheet">
    
    <!--JavaScript-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/utils/Draggable.min.js"></script>
    <script src="js/parallax.js"></script>
</head>


<body>
   <?php
    
    $nameErr = $passErr = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['username'])){
            $nameErr = "Enter a username";
            if(empty($_POST['pass'])){
                $passErr = "Enter a password";
            }
        }
        elseif(empty($_POST['pass'])){
            $passErr = "Enter a password";
            if(empty($_POST['username'])){
                $nameErr = "Enter a username";
            }
        }
        else{
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
        
                    header('location: landing');
                    $_SESSION["LOC"] = "landing";
            }
            else{
                $nameErr = "Incorrect username or password";
            }
                }
            }   
            mysqli_free_result($result);
        }
    }
    ?>
    <div id="container">
        <div class="wrapper">
            <span class="title">
                FREEZER MANAGEMENT
            </span>
            <form method="post" class=login action="<?php echo $_SERVER["PHP_SELF"];?>">
                <div class="usr input">
                    <span>Username<span class="error"><?php echo $nameErr ?></span></span>
                    <input type="text" name="username" class="form" value="<?php if (isset($_POST['username'])) echo $_POST['username'];?>">
                </div>
                <div class="pwd input">
                    <span>Password<span class="error"><?php echo $passErr ?></span></span>
                    <input type="password" name="pass" class="form">
                </div>
                <a href="javascript:delay('change_pw')" class="link">Forgot password?</a>
                <input type="submit" name="login" value="LOGIN" class="btn">
                <a href="javascript:delay('register')" class="link">Register now</a>
                
            </form>
        </div>
    </div>
</body>