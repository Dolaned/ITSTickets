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
if(isset($_POST)){

    $pdo = new SqliteHandler();

    //get post form, generate UID, turn into Ticket object, pass ticket into Ticket object
    // and push to create ticket, return object. parse back to JSON.

    if(isset($_POST['ticketform']));
        $user = new User();
        $ticket = new Ticket();


}