<?php


require_once "../inc/classes/Class.Comment.php";

class CommentPDO
{
    private $db;
    private static $instance;

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new CommentPDO();
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
            $this->db->exec("CREATE TABLE IF NOT EXISTS tickets_comments (
                    id INTEGER PRIMARY KEY,
                    ticketid TEXT,
                    `name` TEXT,
                    comments TEXT,
                    `type` TEXT)");
        } catch(PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }
    }

    public function insertData(Comment $comment) {
        try {
            // Prepare INSERT statement to SQLite3 file db
            $insert = "INSERT INTO tickets_comments (ticketid, `name`, comments, `type`)
                VALUES (:ticketid, :name, :comments, :type)";
            $ticketid = $comment->getTicketId();
            $name = $comment->getCommentName();
            $comments = $comment->getCommentTxt();
            $type = $comment->getType();

            $sql = $this->db->prepare($insert);
            $sql->bindParam(':ticketid', $ticketid);
            $sql->bindParam(':name', $name);
            $sql->bindParam(':comments', $comments);
            $sql->bindParam(':type', $type);
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
            $find = "SELECT * FROM tickets_comments WHERE ticketid = :ticketid";
            $sql = $instance->db->prepare($find);
            $sql->bindParam(':ticketid', $tid, PDO::PARAM_STR);
            $sql->execute();

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Print PDOException message
            return $e->getMessage();
        }
    }


}