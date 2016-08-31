<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 31/08/2016
 * Time: 12:14 PM
 */

require_once "../db/TicketPDO.php";

if($_POST)
{
    $id = $_POST['id'];
    $email = $_POST['email'];
    if(strlen($id) >= 1)
    {
        $data = TicketPDO::getData($id);
        echo json_encode($data);
        exit;
    }
    elseif (strlen($id) >= 1)
    {
        $data2 = TicketPDO::getDataEmail($email);
        echo json_encode($data2);
        exit;
    }
} else {
    echo json_encode("error");
    exit;
}