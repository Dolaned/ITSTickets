<?php


require_once "../inc/classes/Class.Ticket.php";

class TicketPDO
{
    private $db;
    private static $instance;

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new TicketPDO();
        }

        return static::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct() {
        try {
			// Create (connect to) SQLite database in file
            $this->db = new PDO('sqlite:../db/tickets.sqlite3');
            // Set errormode to exceptions
            $this->db->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
            $this->createTables();
        } catch(PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }
    }

    public function createTables() {
        try {
			// Create table messages
            $this->db->exec("CREATE TABLE IF NOT EXISTS tickets (
                    id INTEGER PRIMARY KEY,
                    ticketid TEXT,
					subject TEXT,
                    firstName TEXT,
                    lastName TEXT,
                    email TEXT,
                    operatingSystem TEXT,
                    softwareIssue TEXT,
                    comments TEXT,
					status TEXT,
					`date` TEXT)");
        } catch(PDOException $e) {
                // Print PDOException message
                echo $e->getMessage();
        }
    }

    public function insertData(Ticket $ticket) {
        try {
            // Prepare INSERT statement to SQLite3 file db
            $insert = "INSERT INTO tickets (subject, firstName, lastName, email, operatingSystem, softwareIssue, comments, status, ticketid, `date`)
                VALUES (:subject, :firstName, :lastName, :email, :operatingSystem, :softwareIssue, :comments, :status, :ticketid, :date)";
			$subject= $ticket->getTicketSubject();
			$firstName= $ticket->getFirstname();
            $lastName = $ticket->getLastname();
            $email = $ticket->getEmail();
            $operatingSystem = $ticket->getOperatingSystem();
            $softwareIssue= $ticket->getSoftwareIssue();
            $comments= $ticket->getTicketOtherIssue();
            $status= $ticket->getStatus();
            $ticketid = $ticket->getTicketId();
            $date = $ticket->getTicketDate();

            $sql = $this->db->prepare($insert);
            $sql->bindParam(':subject', $subject);
            $sql->bindParam(':firstName', $firstName);
            $sql->bindParam(':lastName', $lastName);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':operatingSystem', $operatingSystem);
            $sql->bindParam(':softwareIssue', $softwareIssue);
            $sql->bindParam(':comments', $comments);
            $sql->bindParam(':status', $status);
            $sql->bindParam(':ticketid', $ticketid);
            $sql->bindParam(':date', $date);
            $sql->execute();
        } catch(PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }
    }

    public static function getData($tid)
    {
        $instance = self::getInstance();
        try {
            $find = "SELECT * FROM tickets WHERE ticketid = :ticketid LIMIT 1";
            $sql = $instance->db->prepare($find);
            $sql->bindParam(':ticketid', $tid, PDO::PARAM_STR);
            $sql->execute();

            $result = $sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Print PDOException message
            return $e->getMessage();
        }
    }

    public static function getDataEmail($temail)
    {
        $instance = self::getInstance();
        try
        {
            $find = "SELECT * FROM tickets WHERE email = :emailadd";
            $sql = $instance->db->prepare($find);
            $sql->bindParam(':emailadd', $temail, PDO::PARAM_STR);
            $sql->execute();

            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
        catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public static function getAllTickets()
    {
        $instance = self::getInstance();
        try{
            $find = "SELECT * FROM tickets";
            $sql = $instance->db->prepare($find);
            $sql->execute();

            $allTickets = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $allTickets;
        }
        catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public static function deleteTicket($tid)
    {
        $instance = self::getInstance();
        try
        {
            $find = "DELETE FROM tickets WHERE ticketid = :ticketID";
            $sql = $instance->db->prepare($find);
            $sql->bindparam(':ticketID', $tid, PDO::PARAM_STR);
            $sql->execute();
            return "";
        }
        catch (PDOException $e) {
        // Print PDOException message
            return $e->getMessage();
        }

    }

}

