<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 31/08/2016
 * Time: 3:48 PM
 */
require_once "../db/TicketPDO.php";
if($_POST)
{
    $ID = $_POST['id'];
    $STATUS = $_POST['status'];
    if($STATUS=="resolved" || $STATUS=="unresolved" || $STATUS=="pending" || $STATUS=="inprogress")
    {
        TicketPDO::changeStatus($ID, $STATUS);
        echo json_encode("success");
        exit;
    }
    else
    {
        echo json_encode("error");
        exit;
    }

}
else
{
    echo json_encode("error");
    exit;
}