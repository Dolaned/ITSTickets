<?php

class Comment
{
    private $ticketid;
    private $commentName;
    private $commentTxt;
    private $type;

    public function __construct($ticketid, $commentName, $commentTxt, $type) {
        $this->setTicketId($ticketid);
        $this->setCommentName($commentName);
        $this->setCommentTxt($commentTxt);
        $this->setType($type);
    }


    /* Setters */
    public function setTicketId($ticketid) {
        $this->ticketid = $ticketid;
    }

    public function setCommentName($commentName) {
        $this->commentName = $commentName;
    }

    public function setCommentTxt($commentTxt) {
        $this->commentTxt = $commentTxt;
    }

    public function setType($type) {
        if($type != "student" || $type != "staff") {
            $type = "student";
        }
        $this->type = $type;
    }


    /* Getters */
    public function getTicketId() {
        return $this->ticketid;
    }

    public function getCommentName() {
        return $this->commentName;
    }

    public function getCommentTxt() {
        return $this->commentTxt;
    }

    public function getType() {
        return $this->type;
    }
}