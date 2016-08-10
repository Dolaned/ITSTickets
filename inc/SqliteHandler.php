<?php

/**
 * Created by IntelliJ IDEA.
 * User: dylanaird
 * Date: 6/08/2016
 * Time: 4:13 PM
 */
class SqliteHandler extends SQLLitePDO{

    private $handler;
    private $dbName = "identifier.sqlite";

    /**
     * @param handler SQLLitePDO a new local instance of the sqlite database.
     *
     *
     * */
    function __construct()
    {
        parent::__construct($this->dbName);
        $this->handler = new SQLLitePDO($this->dbName);
        $this->handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    /**
     *
     */
    function createTicket(Ticket &$ticket, User &$user){

        try{
            $userSql = 'INSERT INTO tbl_user_info (firstname, lastname, email)
              VALUES (:firstname, :lastname:, :email)';
            $ticketSql = 'INSERT INTO tbl_tickets (ticketid,userid, os, softwareissue,otherissue, ticketdate)
              VALUES (:ticketid,:userid, :os, :softwareIssue, :otherissue, :ticketdate)';

            $stmt = $this->handler->prepare($userSql);

            // Bind parameters to statement variables
            $stmt->bindParam(':firstname', $user->getUserFirstName());
            $stmt->bindParam(':lastname', $user->getUserLastName());
            $stmt->bindParam(':email', $user->getUserEmail());

            //execute the statement
            if($stmt->execute()){
                //grab the inserted user id
                $ticket->setUserId($this->handler->lastInsertId());

                //start execution of ticket
                $stmt2  = $this->handler->prepare($ticketSql);

                $stmt2->bindParam(':userid', $ticket->getUserId());
                $stmt->bindParam(':ticketid',$ticket->getTicketId());
                $stmt2->bindParam(':os',$ticket->getOperatingSystem());
                $stmt2->bindParam(':softwareissue', $ticket->getSoftwareIssue());
                $stmt2->bindParam(':otherissue', $ticket->getTicketOtherIssue());
                $stmt2->bindParam('ticketdate',$ticket->getTicketDate());

                if($stmt2->execute()){
                    echo json_encode(array("Type" => "Success", "Message" => $ticket->getTicketId()), JSON_PRETTY_PRINT);
                }

            }



            return true;


            //start transaction try to insert, if not json encode error, if success json
            //encode success and unique id for user to find ticket later
        }catch(SQLiteException $e){

            echo $e;
            return false;
        }


    }

    /**
     *
     */
    function getTicket($uid){

    }

    function updateTicket($uid, $_POST){

    }
}