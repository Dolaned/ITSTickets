<?php

class Ticket
{
    private $TicketId;
    private $TicketDate;
    private $operatingSystem;
    private $softwareIssue;
    private $ticketOtherIssue;
    private $ticketSubject;
    private $ticketFirstname;
    private $ticketLastname;
    private $ticketEmail;
    private $ticketStatus;

    /**
     * Ticket constructor.
     * @param $TicketDate
     * @param $operatingSystem
     * @param $softwareIssue
     * @param $ticketOtherIssue
     */

    public function __construct($subject, $firstName, $lastName, $email, $operatingSystem, $softwareIssue, $comments, $status) {
        $this->setStatus($status);
        $this->setEmail($email);
        $this->setLastname($lastName);
        $this->setFirstname($firstName);
        $this->setTicketOtherIssue($comments);
        $this->setSoftwareIssue($softwareIssue);
        $this->setOperatingSystem($operatingSystem);
        $this->setTicketSubject($subject);

        $this->setTicketDate(time());
        $this->setTicketId($this->createUniqueId(16));
    }

    /**
     * @return mixed
     */
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

    public function setEmail($email) {
        $this->ticketEmail = $email;
    }

    public function setFirstname($firstname) {
        $this->ticketFirstname = $firstname;
    }

    public function setLastname($lastname) {
        $this->ticketLastname = $lastname;
    }

    public function setStatus($status) {
        if($status != "pending" || $status != "resolved" || $status != "unresolved" || $status != "inprogress") {
            $status = "pending";
        }
        $this->ticketStatus = $status;
    }


    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getTicketSubject()
    {
        return $this->ticketSubject;
    }

    /**
     * @param mixed $ticketSubject
     */
    public function setTicketSubject($ticketSubject)
    {
        $this->ticketSubject = $ticketSubject;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
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

    public function getStatus() {
        return $this->ticketStatus;
    }

    public function getFirstname() {
        return $this->ticketFirstname;
    }

    public function getLastname() {
        return $this->ticketLastname;
    }

    public function getEmail() {
        return $this->ticketEmail;
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
            $str .= $keyspace[rand(0, $max)];
        }
        return $str;
    }

    

}