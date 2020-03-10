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
    <title> Freezer Management | Dashboard </title>
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
                    <a class="item" href="contents"><i class="fas fa-fish"></i> Contents</a>
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
                    <a class="item" href="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                <li>
                     <a class="item" href="about">About</a>
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
                      DASHBOARD
                  </div>
                </div>
            </header>
            <section id="content">
                <div class="tiles">
                   <div class="box-1 gridbox"><div class="tilecontent">Freezer 1</div></div>
                   <div class="box-2 gridbox"><div class="tilecontent">Freezer 2</div></div>
                   <div class="box-3 gridbox"><div class="tilecontent">Freezer 3</div></div>
                   <div class="box-4 gridbox"><div class="tilecontent">Freezer 4</div></div>
                   <div class="box-5 gridbox"><div class="tilecontent">Freezer 5</div></div>
                   <div class="box-6 gridbox"><div class="tilecontent">Freezer 6</div></div>
                   <div class="box-7 gridbox"><div class="tilecontent">Freezer 7</div></div>
                   <div class="box-8 gridbox"><div class="tilecontent">Freezer 8</div></div>
                   <div class="box-9 gridbox"><div class="tilecontent">Freezer 9</div></div>
                   <div class="box-10 gridbox"><div class="tilecontent">Freezer 10</div></div>
                </div>    
            </section>
       </div>
       <div class="about">
           Maximilian Roll / Florian Stella
       </div>
    </div>
</body>