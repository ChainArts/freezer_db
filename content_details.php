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
    <div class="page-wrapper" id="page-wrapper">
        <div class="header">
        <div id="content-wrapper">
            <header id="header">
                <div class="header-main">
                   <div class="box-left">
                    <div class="btn_menu" onclick="window.location='contents';">
                        <span><i class="fas fa-chevron-left"></i> Back</span>
                    </div>
                  </div>
                  <div class="box-right">
                     Details
                  </div>
                </div>
            </header>
            <div id=content>
                <?php
                
                $id=$_GET['id'];
                
                $query = "SELECT contents.item_id, contents.name, contents.date, contents.location, contents.user, contents.type, contents.notes
                        FROM contents INNER JOIN userdata ON contents.user=userdata.username WHERE '$id' = contents.item_id";
                
                $result = $link-> query($query);
                while ($row = $result-> fetch_assoc()){
                    $itemid = $row['item_id'];
                    $name = $row['name'];
                    $date = $row['date'];
                    $user = $row['user'];
                    $type = $row['type'];
                    $notes = $row['notes'];
                    
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
                                }
                }
                ?>
                
                <div class="details">
                    <span class="title" style="border-bottom: 1px solid #535353; margin-top: 50px; padding: 25px 0px 25px 0px;
">#<?php echo $itemid;?> <?php echo $name;?></span>
                    <div class="properties">Frozen: <?php echo $date?> </div>
                    <div class="properties">Frozen by: <?php echo $user?></div>
                    <div class="properties">Freezer: <?php echo $brand.' '.$model?></div>
                    <div class="properties">Type: <?php echo $type?></div>
                    <div class="properties">Notes: <?php echo $notes?></div>
                </div>
                
            </div>
        </div>
    </div>
    </div>
</body>