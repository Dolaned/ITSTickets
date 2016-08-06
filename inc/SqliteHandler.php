<?php

/**
 * Created by IntelliJ IDEA.
 * User: dylanaird
 * Date: 6/08/2016
 * Time: 4:13 PM
 */
class SqliteHandler extends SQLLitePDO{

    private $handler;
    private $dbName = "identifier.sqlite";

    function __construct()
    {
        parent::__construct($this->dbName);
        $this->handler = new SQLLitePDO($this->dbName);

    }

    function submitTicket(){

    }
    function getTicket(){

    }
}