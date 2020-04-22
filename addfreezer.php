<?php
    session_start();
    include "config.php";

    if((!isset($_SESSION["id"])) || ($_SESSION["id"] != session_id()))
    {
        header('location: login');
    }        
 ?>
<!DOCTYPE HTML>
<html>

<head>
    <title> Freezer Management | Freezer </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Stylesheets-->
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300|Source+Sans+Pro:200,300,400&display=swap" rel="stylesheet">
    
    <!--JavaScript-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/utils/Draggable.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <?php
    
    ?>
    <div class="page-wrapper" id="page-wrapper">
        <div class="header">
        <div id="content-wrapper">
            <header id="header">
                <div class="header-main">
                   <div class="box-left">
                    <div class="btn_menu" onclick="window.location='landing';">
                        <span><i class="fas fa-chevron-left"></i> Back</span>
                    </div>
                  </div>
                  <div class="box-right">
                     ADD FREEZER
                  </div>
                </div>
            </header>
            <div id=content>
            <div class="form-wrapper">
            <form method="POST" action="/insert_freezer.php" class="login">
                
                <div class="input">
                    <span>Brand<span class="error"></span></span>
                    <input required type="text" name="Brand" class="form" autocomplete="off">
                </div> 
                <div class="input">
                    <span>Model<span class="error"></span></span>
                    <input required type="text" name="Model" class="form" autocomplete="off">
                </div>
                <div class="input">
                    <span>Capacity<span class="error"></span></span>
                    <input required type="number" name="Capacity" class="form" autocomplete="off">
                </div>
                <div class="input">
                   <select name="Location" class="ddown" required="pleb">
                        <i class="fas fa-angle-down"></i>
                        <option value="">Select Location</option>
                        <option value="Kitchen 1">Kitchen 1</option>
                        <option value="Kitchen 2">Kitchen 2</option>
                        <option value="Cellar">Cellar</option>
                    </select>
                </div>
                <input type="submit" name="insert_freezer" value="Add Freezer" class="btn">
            </form>
            </div>          
            </div>
        </div>
    </div>
    </div>
</body>