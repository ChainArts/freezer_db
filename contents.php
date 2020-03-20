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
                       <div class="btn_menu" onclick="openNav()">&#9776;  MENU</div>
                  </div>
                  <div class="box-right">
                     CONTENTS
                  </div>
                </div>
            </header>
            <div id=content>
            <div class="table-wrapper">
            <input id="search" class="form" type="text" onkeyup="filter()" placeholder="Search for Contents...">
                <table id="table">
                    <tr>
                        <th><a href="contents?sort=id">Ticket ID</a></th>
                        <th><a href="contents?sort=urgency">Urgency</a></th>
                        <th><a href="contents?sort=time">Date</a></th>
                        <th><a href="landing_admin.php?sort=email">E-Mail</a></th>
                        <th><a href="landing_admin.php?sort=category">Category</a></th>
                        <th><a href="landing_admin.php?sort=title">Title</a></th>
                        <th><a href="landing_admin.php?sort=status">Status</a></th>
                    </tr>
                    <?php
                        $query = "SELECT ticket.TicketID, ticket.Urgency, ticket.Title, ticket.Time, ticket.Description, ticket.Category, ticket.UserID, ticket.Status, users.Name, users.sname, users.Email 
                        FROM ticket INNER JOIN users ON ticket.UserID=users.UserID";
                        if(isset($_GET["sort"])){
                            include "order.php";
                        }
                        $result = $link-> query($query);
                        if($result->num_rows == 0){
                            echo "<tr><td colspan = '7'>No tickets available</td></tr>";
                        }
                        else{
                            while ($row = $result-> fetch_assoc()){
                                switch($row['Status']){
                                    case "0":
                                        $status = "Open";
                                        $statusmessage = "Set as closed";
                                        break;
                                    case "1":
                                        $status = "Closed";
                                        $statusmessage = "Set as open";
                                        break;
                                }
                                echo "<tr class=\"tablebtn\" data-href=\"ticket_details.php?id=".$row['TicketID']."\"><td>".$row['TicketID']."</td><td>". $row['Urgency'] ."</td><td>".$row['Time']."</td><td>". $row['Email'] ."</td><td>". $row['Category'] ."</td><td>". $row['Title'] ."</td><td>". $status ."</td></tr>";
                            }
                        }
                    ?>
                </table>
            </div>  
        </div>
    </div>
    </div>
</body>