<?php
include_once ("classes/Class.SQLLitePDO.php");
include_once ("SqliteHandler.php");
include_once ("classes/Class.User.php");
include_once ("classes/Class.Ticket.php");

/**
 * Created by IntelliJ IDEA.
 * User: dylanaird
 * Date: 6/08/2016
 * Time: 4:25 PM
 */
if(isset($_POST)) {

    $pdo = new SqliteHandler();

    //get post form, generate UID, turn into Ticket object, pass ticket into Ticket object
    // and push to create ticket, return object. parse back to JSON.
    if (isset($_POST['ticketform'])){

        //Create User and ticket objects then pass them by reference to the create ticket function.
        $user = new User($_POST['fname'],$_POST['lname'] ,$_POST['email']);
        $ticket = new Ticket(time(),$_POST[''] ,$_POST[''] , $_POST['']);
        //generate string id to be presented to the user later.
        $ticket->setTicketId($ticket->createUniqueId(10));

        //push the two objects to PDO
        $pdo->createTicket($ticket, $user);
    }



}else{
    echo json_encode(array("Type" => "Error", "Message" => "No form has been posted"), JSON_PRETTY_PRINT);
}