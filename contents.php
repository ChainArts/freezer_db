<?php
    include "config.php";
?>

<!DOCTYPE HTML>
<html>

<head>
    <title> Freezer Management | Contents </title>
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
    <script src="js/parallax.js"></script>
</head>

<body>
    <div class="page-wrapper" id="page-wrapper">
      <nav class="sidenav-main" id="sidenav-main">
          <div class="header">
             <div class="pull-right">
                <div class="closebtn" onclick = "closeNav()">
                    CLOSE &#10006
                </div>
             </div>
              
          </div>
          <ul class="menu-main">
               <li>
                   <a class="item" href="landing">Home</a>
               </li>
                <li>
                    <a class="item" href="Freezer"><i class="fas fa-clipboard-list"></i> Freezer</a>
                </li>
                <li>
                    <a class="item" href="contents" style= "background-color: #26292f;"><i class="fas fa-fish"></i> Contents</a>
                </li>
                <li>
                    <a href="insert_item" class="item"><i class="fas fa-pencil-alt"></i> Add Item</a>
                </li>
                <li>    
                    <span class="item">
                        <h1>Currently logged in as:</h1>
                        <p style="font-weight: 200;"><?php echo $_SESSION["USR_VNAME"] . " " .    $_SESSION["USR_SNAME"];?></p>
                    </span>
                </li>
                    <a class="item" href="login" onClick="session_unset(); session_destroy()"><i class="fas fa-sign-out-alt"></i> Logout</a>
                <li>
                     <a class="item">About</a>
                </li>
          </ul>
        </nav> 
        <div id="content-wrapper">
            <header id="header">
                <div class="header-main">
                  <div class="box-left">
                       <div class="btn_menu" onclick="openNav()">&#9776;  MENU</div>
                  </div>
                  <div class="box-right">
                     CONTENTS
                  </div>
                </div>
            </header>
            <div id=content>
                List
            <footer>
                
            </footer>
        </div>
    </div>
</body>