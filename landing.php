<?php
    include "config.php";
?>

<!DOCTYPE HTML>
<html>

<head>
    <title> Freezer Management | Dashboard </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Stylesheets-->
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300|Source+Sans+Pro:200,300,400&display=swap" rel="stylesheet">
    
    <!--JavaScript-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/utils/Draggable.min.js"></script>
    <script src="js/parallax.js"></script>
</head>

<body>
    <div id="container">
        <nav class="menu">
            <div class="menulist">
                 <ul>
                    <li><a href="#Freezer"><i class="fas fa-clipboard-list"></i> Freezer </a> </li>
                    <li><a href="#contents"><i class="fas fa-fish"></i> Contents </a> </li>
                    <li><a href="insert_item"><i class="fas fa-pencil-alt"></i> Add Item </a></li>
                </ul>
                <div class="usr_info">
                    <ul>    
                        <li>
                            <a>
                                <h1>Currently logged in as:</h1>
                                <p><?php echo $_SESSION["USR_VNAME"] . " " . $_SESSION["USR_SNAME"];?></p>
                            </a>
                        </li>
                        <li><a href="login" onClick="session_unset(); session_destroy()"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        <?php// print_r($_SESSION); ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>