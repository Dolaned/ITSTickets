<?php

<<<<<<< HEAD
class Ticket
{
    private $TicketId;
    private $userId;
    private $TicketDate;
    private $operatingSystem;
    private $softwareIssue;
    private $ticketOtherIssue;

    /**
     * Ticket constructor.
     * @param $TicketDate
     * @param $operatingSystem
     * @param $softwareIssue
     * @param $ticketOtherIssue
     */
    public function __construct($TicketDate, $operatingSystem, $softwareIssue, $ticketOtherIssue)
    {
        $this->TicketDate = $TicketDate;
        $this->operatingSystem = $operatingSystem;
        $this->softwareIssue = $softwareIssue;
        $this->ticketOtherIssue = $ticketOtherIssue;
=======
class Ticket {
    private $TicketId;
    private $TicketDate;
    private $operatingSystem;
    private $ticketOtherIssue;
    private $userId;

    
    function __construct(){

        
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
>>>>>>> ef9be6e81e16d21d2da34ced6ffb9a03082cc6ab
    }

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function getSoftwareIssue()
    {
        return $this->softwareIssue;
    }

    /**
     * @param mixed $softwareIssue
     */
    public function setSoftwareIssue($softwareIssue)
    {
        $this->softwareIssue = $softwareIssue;
    }

=======
    public function getTicketDate()
    {
        return $this->TicketDate;
    }

    /**
     * @param mixed $TicketDate
     */
    public function setTicketDate($TicketDate)
    {
        $this->TicketDate = $TicketDate;
    }

    /**
     * @return mixed
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    /**
     * @param mixed $operatingSystem
     */
    public function setOperatingSystem($operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;
    }
>>>>>>> ef9be6e81e16d21d2da34ced6ffb9a03082cc6ab

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
=======
    public function getTicketOtherIssue()
    {
        return $this->ticketOtherIssue;
    }

    /**
     * @param mixed $ticketOtherIssue
     */
    public function setTicketOtherIssue($ticketOtherIssue)
    {
        $this->ticketOtherIssue = $ticketOtherIssue;
>>>>>>> ef9be6e81e16d21d2da34ced6ffb9a03082cc6ab
    }

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function getTicketDate()
    {
        return $this->TicketDate;
    }
=======
    public function getTicketId()
    {
        return $this->TicketId;
    }

    /**
     * @param mixed $TicketId
     */
    public function setTicketId($TicketId)
    {
        $this->TicketId = $TicketId;
    }
    
>>>>>>> ef9be6e81e16d21d2da34ced6ffb9a03082cc6ab

    /**
     * @param mixed $TicketDate
     */
    public function setTicketDate($TicketDate)
    {
        $this->TicketDate = $TicketDate;
    }

    /**
     * @return mixed
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    /**
     * @param mixed $operatingSystem
     */
    public function setOperatingSystem($operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;
    }

    /**
     * @return mixed
     */
    public function getTicketOtherIssue()
    {
        return $this->ticketOtherIssue;
    }

    /**
     * @param mixed $ticketOtherIssue
     */
    public function setTicketOtherIssue($ticketOtherIssue)
    {
        $this->ticketOtherIssue = $ticketOtherIssue;
    }

    /**
     * @return mixed
     */
    public function getTicketId()
    {
        return $this->TicketId;
    }

    /**
     * @param mixed $TicketId
     */
    public function setTicketId($TicketId)
    {
        $this->TicketId = $TicketId;
    }

<<<<<<< HEAD
    /**
     * Generate a random string, using a cryptographically secure
     * pseudorandom number generator (random_int)
     *
     * For PHP 7, random_int is a PHP core function
     * For PHP 5.x, depends on https://github.com/paragonie/random_compat
     *
     * @param int $length      How many characters do we want?
     * @param string $keyspace A string of all possible characters
     *                         to select from
     * @return string
     */
    function createUniqueId($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }


=======
    function createUniqueId(){
        $this->TicketId = "RANDOM STRING HERE";

    }
    
    
    
>>>>>>> ef9be6e81e16d21d2da34ced6ffb9a03082cc6ab
}


