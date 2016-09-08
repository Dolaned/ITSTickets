<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 31/08/2016
 * Time: 5:27 PM
 */
require_once "../db/TicketPDO.php";

if($_POST)
{
    $id = $_POST['id'];
    if(strlen($id) >= 1)
    {
        $data = TicketPDO::getData($id);
        echo json_encode($data);
        exit;
    }

} else {
    echo json_encode("error");
    exit;
} 