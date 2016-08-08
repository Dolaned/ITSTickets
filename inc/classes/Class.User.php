<?php

/**
 * Created by IntelliJ IDEA.
 * User: dylanaird
 * Date: 7/08/2016
 * Time: 4:14 PM
 */
class User {

    private $userId;
    private $userFirstName;
    private $userLastName;
    private $userEmail;
    private $userContactNumber;

    /**
     * @return mixed
     */
    public function getUserContactNumber()
    {
        return $this->userContactNumber;
    }

    /**
     * @param mixed $userContactNumber
     */
    public function setUserContactNumber($userContactNumber)
    {
        $this->userContactNumber = $userContactNumber;
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
    public function getUserFirstName()
    {
        return $this->userFirstName;
    }

    /**
     * @param mixed $userFirstName
     */
    public function setUserFirstName($userFirstName)
    {
        $this->userFirstName = $userFirstName;
    }

    /**
     * @return mixed
     */
    public function getUserLastName()
    {
        return $this->userLastName;
    }

    /**
     * @param mixed $userLastName
     */
    public function setUserLastName($userLastName)
    {
        $this->userLastName = $userLastName;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param mixed $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }


    function __construct(){

    }
}