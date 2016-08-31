<?php

require_once "../db/TicketPDO.php";
require_once "../inc/classes/Class.Ticket.php";

if($_POST)
{	
    $subject = $_POST['subject'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $operatingSystem = $_POST['os'];
    $softwareIssue = $_POST['softwareissue'];
    $comments = $_POST['comments'];
    $status = 'pending';

    $pdo = TicketPDO::getInstance();

    $ticket = new Ticket($subject, $firstName, $lastName, $email, $operatingSystem, $softwareIssue, $comments, $status);
    $pdo->insertData($ticket);

    $id = $ticket->getTicketId();

    echo json_encode($id);
    exit;
} else {
    echo json_encode("error");
    exit;
}
?>