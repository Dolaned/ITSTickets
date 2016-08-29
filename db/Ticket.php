<?php

class Ticket
{
	private $subject;
    private $firstName;
    private $lastName;
    private $email;
    private $operatingSystem;
    private $softwareIssue;
    private $comments;
    private $status;

    public function __construct($subject, $firstName, $lastName, $email, $operatingSystem, $softwareIssue, $comments, $status) {
        $this->subject = $subject;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->operatingSystem = $operatingSystem;
        $this->softwareIssue = $softwareIssue;
        $this->comments = $comments;
        $this->status = $status;
    }
	
	public function getSubject() {
        return $this->subject;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getOS() {
        return $this->operatingSystem;
    }

    public function getSoftwareIssue() {
        return $this->softwareIssue;
    }

    public function getComments() {
        return $this->comments;
    }
	
	public function getStatus() {
        return $this->status;
    }
}