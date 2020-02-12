<!DOCTYPE HTML>
<html>

<head>
    <title> Freezer Management | Register </title>
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
    include "config.php";
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
            if(isset($_POST['register'])){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $username = mysqli_real_escape_string($link, $_POST['username']);
                    $check = mysqli_query($link, "SELECT * FROM userdata WHERE username = '$username'");

                    if($check->num_rows != 0){
                        $nameErr = "This Username is already in use";
                    }
                    else{
                        $password = $_POST['pass'];
                        $passconfirm = $_POST['passconfirm'];

                    if($password != $passconfirm){
                        $passErr = "The passwords have to match";
                        }
                    else{
                        $username = mysqli_real_escape_string($link, $_POST['username']);
                        $password = mysqli_real_escape_string($link, password_hash($_POST['pass'], PASSWORD_BCRYPT));
                        $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
                        $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
                        $query = "INSERT INTO userdata (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')";

                    if(mysqli_query($link, $query)){
                        echo "<a> registration complete </a>";
                        echo "<a href='index.php'>Login</a>";
                        echo '<meta http-equiv="refresh" content="1;URL=index.php"/>';
                        die;
                        }
                    else{
                        echo "<a> Registration failed.</a>";
                        echo "<a href='register_index.php'>Try again</a>";
                        echo '<meta http-equiv="refresh" content="1;URL=register.php"/>';
                        die;
                        }
                    }   
                }
            }
            }
        }
    }
    ?>
    <div id="container">
            <div class="wrapper">
                <span class="title">Register</span>
                <form method="post" class="login" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <div class="namewrapper">
                    <div class="usr input">
                        <span class="label">Firstname</span>
                        <input type="text" name="firstname" class="form" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
                    </div>
                    <div class="usr input">
                        <span class="label">Lastname</span>
                        <input type="text" name="lastname" class="form" value="<?php if(isset($_POST['lastname'])) echo $_POST['sname']; ?>">
                    </div>
                    </div>
                    <div class="usr input">
                        <span class="label">Username<span class="error"><?php echo $nameErr ?></span></span>
                        <input type="text" name="username" class="form" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                    </div>
                    <div class="pwd input">
                        <span>Password<span class="error"><?php echo $passErr ?></span></span>
                        <input type="password" name="pass" class="form">
                    </div>
                    <div class="pwd input">
                        <span>Confirm password</span>
                        <input type="password" name="passconfirm" class="form">
                    </div>
                    <input type="submit" name="register" value="REGISTER" class="btn">
                    <a href="javascript:delay('index.php')" class="link">Login</a>
                </form>
            </div>
        </div>
</body>
