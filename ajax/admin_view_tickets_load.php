<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 31/08/2016
 * Time: 3:16 PM
 */
require_once "../db/TicketPDO.php";
    if($_POST)
    {
        $data = TicketPDO::getAllTickets();
        echo json_encode($data);
        exit;
    }
    else
    {
        echo json_encode("error");
        exit;
    }