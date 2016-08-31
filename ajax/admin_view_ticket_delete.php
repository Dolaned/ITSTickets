<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 31/08/2016
 * Time: 3:34 PM
 */
require_once "../db/TicketPDO.php";
    if($_POST)
    {
        $ID = $_POST['id'];
        TicketPDO::deleteTicket($ID);
        echo json_encode("SUCCESS");
        exit;
    }
    else
    {
        echo json_encode("error");
        exit;
    }