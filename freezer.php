<?php
    session_start();
    include "config.php";

    if((!isset($_SESSION["id"])) || ($_SESSION["id"] != session_id()))
    {
        header('location: login');
    }

    $location = "";
    $brand = "Please select a freezer!";
    $model = "";
    $cap = "";
    $status = "";                         
    $fill = "";
    $warn = "";
 ?>
<!DOCTYPE HTML>
<html>

<head>
    <title> Freezer Management | Freezer </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="media/snowflake-solid.png">

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
                   <a class="item" href="<?php echo $_SESSION['LOC']?>">Home</a>
               </li>
                <li>
                    <a class="item" href="Freezer" style= "background-color: #26292f;"><i class="far fa-snowflake"></i> Freezer</a>
                </li>
                <li>
                    <a class="item" href="contents"><i class="far fa-list-alt"></i> Contents</a>
                </li>
                <li>
                    <a href="insert" class="item"><i class="fas fa-pencil-alt"></i> Add Item</a>
                </li>
                <li>    
                    <span class="item" style="cursor: auto;">
                        <h1>Currently logged in as:</h1>
                        <p style="font-weight: 200;"><?php echo $_SESSION["USR_VNAME"] . " " .    $_SESSION["USR_SNAME"];?></p>
                    </span>
                </li>
                    <a class="item" href="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
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
                     FREEZER DETAILS
                  </div>
                </div>
            </header>
            <div id=content>
            <div class="table-wrapper">
                <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <select name="freezer" class="ddown" required="pleb" onchange="this.form.submit()">
                        <option value="" class="option">Select</option>
                        <?php
                            $query = "SELECT freezer.frz_id, freezer.brand, freezer.model FROM freezer";
                            $result = $link -> query($query);
                            if($result -> num_rows == 0){
                            echo "No freezers in database, please add one first";
                            }
                            else{
                                while($row = $result -> fetch_assoc()){
                                    echo "<option value=".$row['frz_id']." class = 'option'>".$row['brand'].'&nbsp'.$row['model']."</option>";
                                }
                            }
                        ?>
                </select>
                    <div class="add-right-btn" onclick="window.location='insert';">+ Add Item</div>
                </form>
                <?php
                $FrzID = $_GET['freezer'];
                $query = "SELECT * FROM freezer WHERE freezer.frz_id = '$FrzID'";
                            $result = $link -> query($query);
                            if($result -> num_rows == 0)
                            {
                                echo "Freezer not found!";
                            }
                            else
                            {
                                while ($row = $result -> fetch_assoc()){
                                    $location = $row['location'];
                                    $brand = $row['brand'];
                                    $model = $row['model'];
                                    $cap = $row['capacity'];
                                    $status = $row['status'];
                                    
                                    $fill = $status / $cap;
                                    $fill = $fill * 100;
                                    
                                    if($fill > 100)
                                    {
                                        $warn = "This Freezer is Overfilled!";
                                    }
                                    else
                                    {
                                        $warn = "";
                                    }
                                    
                                }
                            }
                            
                ?>
                <div class="details">
                    <span class="title" style="border-bottom: 1px solid #535353; padding: 25px 0px 25px 0px;
"><?php echo $brand;?> <?php echo $model;?></span>
                    <div class="properties">Location: <?php echo $location?> </div>
                    <div class="properties">Max Capacity: <?php echo $cap?></div>
                    <div class="properties">Fillstate: <?php echo $fill?>% <?php echo $warn?></div>
                </div>
                
                <table id="table">
                    <tr>
                        <th><a href="contents?sort=id">Item ID</a></th>
                        <th><a href="contents?sort=Name">Name</a></th>
                        <th><a href="contents?sort=time">Date</a></th>
                        <th><a href="contents?sort=User">User</a></th>
                        <th><a href="contents?sort=location">Freezer</a></th>
                        <th><a href="contents?sort=category">Category</a></th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        $locations = $brand.' '.$model;
                        
                        $query = "SELECT contents.item_id, contents.name, contents.date, contents.location, contents.user, contents.type
                        FROM contents INNER JOIN userdata ON contents.user=userdata.username WHERE contents.location = '$FrzID'";
        
                        $result = $link-> query($query);
                        if($result->num_rows == 0){
                            echo "<tr><td colspan = '7'>Freezer is empty</td></tr>";
                        }
                        else{
                            while($row = $result -> fetch_assoc()){
                          $query2 = "SELECT * FROM freezer WHERE freezer.frz_id = '$row[location]'";
                                $result2 = $link -> query($query2);
                                if($result2 -> num_rows == 0)
                                {
                                    echo "Freezer not found!";
                                }
                                else
                                {
                                while ($row2 = $result2 -> fetch_assoc()){
                                    $brand = $row2['brand'];
                                    $model = $row2['model'];
                                }
                                
                                echo "<tr class=\"tablebtn\" data-href=\"content_details.php?id=".$row['item_id']."\"><td>".$row['item_id']."</td><td>". $row['name'] ."</td><td>".$row['date']."</td><td>". $row['user'] ."</td><td>".$brand.' '.$model."</td><td>". $row['type'] ."</td><td><a href=\"rmitem.php?id=".$row['item_id']."\"><i class=\"fas fa-trash-alt\"></i></a></td></tr>";
                            }
                        }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>