<?php

require_once "../db/TicketPDO.php";

if($_POST)
{
    $id = $_POST['id'];
    $data = TicketPDO::getData($id);
    echo json_encode($data);
    exit;
} else {
    echo json_encode("error");
    exit;
}
?>