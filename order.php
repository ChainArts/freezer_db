<?php
    $order = $_GET["sort"];

    switch($order){
        case "ticketid":
            $query .= " ORDER BY TicketID DESC";
            break;
        case "urgency":
            $query .= " ORDER BY urgency";
            break;
        case "time":
            $query .= " ORDER BY Time DESC";
            break;
        case "email":
            $query .= " ORDER BY Email";
            break;
        case "category":
            $query .= " ORDER BY Category";
            break;
        case "title":
            $query .= " ORDER BY Title";
            break;
        case "status":
            $query .= " ORDER BY Status";
            break;
    }
?>