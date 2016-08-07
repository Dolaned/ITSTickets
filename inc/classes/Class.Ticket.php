<?php

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
    





    function createUniqueId(){
        $this->TicketId = "RANDOM STRING HERE";

    }
    
    
    
}


