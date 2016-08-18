<?php


include('Ticket.php');

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
            $this->db = new PDO('sqlite:tickets.sqlite3');
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
					subject TEXT,
                    firstName TEXT,
                    lastName TEXT,
                    email TEXT,
                    operatingSystem TEXT,
                    softwareIssue TEXT,
                    comments TEXT,
					status TEXT)");
        } catch(PDOException $e) {
                // Print PDOException message
                echo $e->getMessage();
        }
    }

    public function insertData(Ticket $ticket) {
        try {
            // Prepare INSERT statement to SQLite3 file db
            $insert = "INSERT INTO tickets (subject, firstName, lastName, email, operatingSystem, softwareIssue, comments, status)
                VALUES (:subject, :firstName, :lastName, :email, :operatingSystem, :softwareIssue, :comments, :status)";
			$subject= $ticket->getSubject();
			$firstName= $ticket->getFirstName();
            $lastName = $ticket->getLastName();
            $email = $ticket->getEmail();
            $operatingSystem = $ticket->getOS();
            $softwareIssue= $ticket->getSoftwareIssue();
            $comments= $ticket->getComments();
            $status= $ticket->getStatus();
            $sql = $this->db->prepare($insert);
            $sql->bindParam(':subject', $subject);
            $sql->bindParam(':firstName', $firstName);
            $sql->bindParam(':lastName', $lastName);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':operatingSystem', $operatingSystem);
            $sql->bindParam(':softwareIssue', $softwareIssue);
            $sql->bindParam(':comments', $comments);
            $sql->bindParam(':status', $status);
            $sql->execute();
        } catch(PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }
    }

    public function getData()
    {
        try {
            // Prepare INSERT statement to SQLite3 file db
            $result = $this->db->query('SELECT * FROM tickets');
            return $result;
        } catch (PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }
    }


}