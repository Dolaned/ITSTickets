<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 31/08/2016
 * Time: 12:14 PM
 */

require_once "../db/TicketPDO.php";

if ($_POST)
{
    $id = $_POST['id'];
    $email = $_POST['email'];
    $orderby = $_POST['orderBy'];
    $ascdesc = $_POST['ascdesc'];
    if(strlen($id) >= 1)
    {
        $data = TicketPDO::getData($id);
        echo json_encode($data);
        exit;
    }
    else if (strlen($email) >= 1)
    {
        $data2 = TicketPDO::getDataEmail($email, $orderby, $ascdesc);
        echo json_encode($data2);
        exit;
    }
} else {
    echo json_encode("error");
    exit;
}