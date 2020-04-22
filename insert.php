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
    <script src="js/script.js"></script>
</head>

<body>
    <div class="page-wrapper" id="page-wrapper">
      <nav class="sidenav-main" id="sidenav-main">
          <div class="header">
             <div class="pull-right">
                <div class="closebtn" onclick = "closeNav()">
                    CLOSE
                </div>
             </div>
              
          </div>
          <ul class="menu-main">
               <li>
                   <a class="item" href="landing">Home</a>
               </li>
                <li>
                    <a class="item" href="Freezer.php?freezer=1"><i class="far fa-snowflake"></i> Freezer</a>
                </li>
                <li>
                    <a class="item" href="contents"><i class="far fa-list-alt"></i> Contents</a>
                </li>
                <li>
                    <a href="insert" class="item" style= "background-color: #26292f;"><i class="fas fa-pencil-alt"></i> Add Item</a>
                </li>
                <li>    
                    <span class="item" style="cursor: auto;">
                        <h1>Currently logged in as:</h1>
                        <p style="font-weight: 200;"><?php echo $_SESSION["USR_VNAME"] . " " .    $_SESSION["USR_SNAME"];?></p>
                    </span>
                </li>
                    <a class="item" href="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                <li>
                     <a class="item">About</a>
                </li>
          </ul>
        </nav> 
        <div id="content-wrapper">
            <header id="header">
                <div class="header-main">
                  <div class="box-left">
                    <div class="btn_menu" onclick="openNav()">
                        <div class="menu-ico">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                        <span>MENU</span>
                    </div>
                  </div>
                  <div class="box-right">
                     ADD ITEM
                  </div>
                </div>
            </header>
            <div id="content">
            <div class="form-wrapper">
            <form action="/additem.php" method="POST" class="login">
                
                <div class="input">
                    <span>Name<span class="error"></span></span>
                    <input required type="text" name="Name" class="form" autocomplete="off">
                </div> 
                <div class="input">
                    <span>Type<span class="error"></span></span>
                    <input required type="text" name="type" class="form" autocomplete="off">
                </div>
                
                <div class="input">
                <select name="location" class="ddown" required>
                        <option value="" class="option">Select</option>
                        <?php
                            $query = "SELECT freezer.frz_id, freezer.brand, freezer.model FROM freezer";
                            $result = $link -> query($query);
                            if($result -> num_rows == 0){
                            echo "No freezers in database, please add one first";
                            }
                            else{
                                while($row = $result -> fetch_assoc()){
                                    echo "<option value=".$row['frz_id'].">".$row['brand'].'&nbsp'.$row['model']."</option>";
                                }
                            }
                        ?>
                </select>
                </div>
                <input type="submit" name="add_item" value="ADD ITEM" class="btn">
            </form>
            </div>    
            </div>
         </div>
    </div>
</body>