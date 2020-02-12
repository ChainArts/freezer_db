<!DOCTYPE HTML>
<html>

<head>
    <title> Ticketsystem | Register </title>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#111">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Stylesheets-->
    <link rel="shortcut icon" type="image/x-icon" href="style/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/devicons/1.8.0/css/devicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed|Josefin+Sans|Source+Sans+Pro:700|Source+Sans+Pro|">

    <!--JavaScript-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/utils/Draggable.min.js"></script>
</head>

<body>
    <?php
    include "config.php";
    $emailErr = $passErr = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['email'])){
            $emailErr = "Enter an E-Mail";
            if(empty($_POST['pass'])){
                $passErr = "Enter a password";
            }
        }
        elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid E-Mail format";
        }
        elseif(empty($_POST['pass'])){
            $passErr = "Enter a password";
            if(empty($_POST['email'])){
                $emailErr = "Enter an E-Mail";
            }
        }
        else{
            if(isset($_POST['register'])){
                include "register.php";
            }
        }
    }
    ?>
    <div class="page">
        <div class="loginwindow">
            <div class="wrapper">
                <span class="title">Register</span>
                <form method="post" class="login" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <div class="namewrapper">
                    <div class="vname input">
                        <span class="label">Name</span>
                        <input type="text" name="name" class="form" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"></input>
                    </div>
                    <div class="nname input">
                        <span class="label">Surname</span>
                        <input type="text" name="sname" class="form" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>"></input>
                    </div>
                    </div>
                    <div class="email input">
                        <span class="label">E-Mail<span class="error"><?php echo $emailErr ?></span></span>
                        <input type="text" name="email" class="form" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"></input>
                    </div>
                    <div class="password input">
                        <span>Password<span class="error"><?php echo $passErr ?></span></span>
                        <input type="password" name="pass" class="form"></input>
                    </div>
                    <div class="password input">
                        <span>Confirm password</span>
                        <input type="password" name="passconfirm" class="form"></input>
                    </div>
                    <input type="submit" name="register" value="REGISTER" class="btn"></input>
                    <a href="javascript:delay('index.php')" class="link">Login</a>
                </form>
            </div>
        </div>
    </div>
    <script src="js/transition.js"></script>
    <script> function delay(URL) {
        $(".loginwindow").removeClass("fade");
        $(".loginwindow").addClass("fade");
        setTimeout(function () {
            window.location = URL;
        }, 400)
    };</script>
</body>
