<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 31/08/2016
 * Time: 4:22 PM
 */
require_once "../db/CommentPDO.php";
require_once "../inc/classes/Class.Comment.php";

if($_POST)
{
    $ticketid = $_POST['id'];
    $name = $_POST['name'];
    $text = $_POST['text'];
    $type = "staff";

    $pdo = CommentPDO::getInstance();

    $comment = new Comment($ticketid, $name, $text, $type);
    $pdo->insertData($comment);

    echo json_encode("success");
    exit;
} else {
    echo json_encode("error");
    exit;
}
?>