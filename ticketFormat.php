<?php

/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 11/08/2016
 * Time: 3:40 PM
 */
class ticketFormat
{
    private $subject;
    private $firstname;
    private $lastname;
    private $email;
    private $os;
    private $comment;

    public function __construct($subject, $firstname, $lastname, $email, $os, $comment)
    {
        $this->subject= $subject;
        $this->firstname=$firstname;
        $this->lastname= $lastname;
        $this->email = $email;
        $this->os = $os;
        $this->comment = $comment;
    }


    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

}
?>