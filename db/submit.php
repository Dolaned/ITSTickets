<?php

include('TicketPDO.php');

if($_POST)
{	
    $subject = $_POST['subject'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $operatingSystem = $_POST['os'];
    $softwareIssue = $_POST['softwareIssue'];
    $comments = $_POST['comments'];
    $status = $_POST['status'];

    $pdo = TicketPDO::getInstance();

    $ticket = new Ticket($subject, $firstName, $lastName, $email, $operatingSystem, $softwareIssue, $comments, $status);
    $pdo->insertData($ticket);

    ?>

    <p>Ticket Added!</p>
    <p>Please click on the <a href="db/results.php">link</a> to see all the tickets.</p>

    <?php
} else {
    ?>
    <p>Invalid data posted!</p>
<?php
}
?>
