<?php

require_once "../db/CommentPDO.php";

if($_POST)
{
    $id = $_POST['id'];

    $data = CommentPDO::getData($id);
    echo json_encode($data);
    exit;
}
?>