<?php
    session_start();
    include "config.php";

    if((!isset($_SESSION["id"])) || ($_SESSION["id"] != session_id()))
    {
        header('location: login');
    }
    
    if($_SESSION["USR_LVL"] == '0'){
            header('Location: landing');
    }
 ?>
<!DOCTYPE HTML>
<html>

<head>
    <title> Freezer Management | Freezer </title>
    <link rel="icon" href="media/snowflake-solid.png">
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
        <div class="header">
        <div id="content-wrapper">
            <header id="header">
                <div class="header-main">
                   <div class="box-left">
                    <div class="btn_menu" onclick="window.location='<?php echo $_SESSION['LOC']?>'">
                        <span><i class="fas fa-chevron-left"></i> Back</span>
                    </div>
                  </div>
                  <div class="box-right">
                     USERS
                  </div>
                </div>
            </header>
            <div id=content>
                <table id=table style="margin: 50px 356px 50px 356px;">
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Username</th>
                        <th>User Level</th>
                        <th>Delete User</th>
                    </tr>
                    <?php
                        $query = "SELECT Usr_ID, firstname, lastname, username, usr_lvl FROM userdata";
                        $result = $link-> query($query);
                        if($result->num_rows == 0){
                            echo "<tr><td colspan = '6'>No users found.</td></tr>";
                        }
                        else{
                            while ($row = $result-> fetch_assoc()){
                                $other = 0;
                                $show = 0;
                                if($row['usr_lvl'] == 1){
                                    $level = "Admin";
                                    $show = "User";
                                    $other = 0;
                                }
                                else{
                                    $level = "User";
                                    $show = "Admin";
                                    $other = 1;
                                }
                                echo "<tr><td>". $row['Usr_ID'] ."</td><td>". $row['firstname'] ."</td><td>". $row['lastname']. "</td><td>".$row['username']."</td><form method='post' action='". $_SERVER['PHP_SELF']. "'><td><select name='level[]' class= \"ddown-small\"><option class=\"option\" value=\"".$row['usr_lvl']." \">".$level."&nbsp&nbsp&nbsp&nbsp&nbsp</option>
                                <option class=\"option\" value=\"".$other."  \">".$show." </option></select></td><td><a href=\"user_del.php?id=".$row['Usr_ID']."\"><i class=\"fas fa-trash-alt\"></i></a></td></tr>";
                            }
                        }
                        if(isset($_POST['levelchange'])){
                            include "user_level.php";
                        }
                        elseif(isset($_POST['deluser'])){
                            $userid=$row['UserID'];
                            echo($userid);
                            $query="DELETE FROM users WHERE Usr_ID='$userid'";
                            if(mysqli_query($link, $query)){
                                echo("Worked.");
                            } else {
                                echo("Failed.");
                            }
                        }
                         ?>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>