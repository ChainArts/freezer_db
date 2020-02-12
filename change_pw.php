<?php
include "config.php";
?>

<!DOCTYPE HTML>
<html>

<head>
    <title> Freezer Management | Reset </title>
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
    
     $nameErr = $newpassErr = $newpassconfErr = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['username'])){
            $nameErr = "Enter a username";
            if(empty($_POST['newpass'])){
                $newpassErr = "Enter a new Password";
                if(empty($_POST['newpassconf'])){
                    $newpassconfErr = "Confirm Password";
                    }
                }
        }
        
        elseif($_POST['newpassconf'] != $_POST['newpass']){
            $newpassconfErr = "Password must be the same";
            }
        
        else{
            
            $newpass = mysqli_real_escape_string($link, password_hash($_POST['newpass'], PASSWORD_BCRYPT));
            $username = mysqli_real_escape_string($link, $_POST['username']);
                
            $query = "UPDATE userdata SET Password = '$newpass' WHERE username = '$username';";
            
            if(mysqli_query($link, $query)){
                echo "Password Updated <br>";
                echo "<a href='index.php'>Login</a>";
                echo '<meta http-equiv="refresh" content="1;URL=index.php"/>';
                die;
            }
            else
            {
                echo "Nix gud";
                echo "<a href='change_pw.php'>Try again</a>";
                echo '<meta http-equiv="refresh" content="1;URL=change_pw.php"/>';
                die;
            }
            }
    }
        
    ?>
    <div id="container">
            <div class="wrapper">
                <span class="title">
                    Reset Password
                </span>
                <form method="post" class="login" action="<?php echo $_SERVER["PHP_SELF"];?>">
                   <div class="usr input">
                        <span class="label">Username<span class="error"><?php echo $nameErr ?></span></span>
                        <input type="text" name="username" class="form" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                    </div>
                    <div class="pwd input">
                        <span>New Password<span class="error"><?php echo $newpassErr ?></span></span>
                        <input type="password" name="newpass" class="form" value="<?php if(isset($_POST['newpass'])) echo $_POST['newpass']; ?>">
                    </div>
                    <div class="pwd input">
                        <span>Confirm Password<span class="error"><?php echo $newpassconfErr ?></span></span>
                        <input type="password" name="newpassconf" class="form" value="<?php if(isset($_POST['newpassconf'])) echo $_POST['newpassconf']; ?>">
                    </div>
                    <input type="submit" name="reset" value="RESET" class="btn">
                    <a href="javascript:delay('index.php')" class="link">Back</a>
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