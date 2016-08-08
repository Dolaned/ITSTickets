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

    /**
     * @param handler SQLLitePDO a new local instance of the sqlite database.
     *
     *
     * */
    function __construct()
    {
        parent::__construct($this->dbName);
        $this->handler = new SQLLitePDO($this->dbName);
        $this->handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    /**
     *
     */
    function createTicket($ticket, $user){

        try{
            //start transaction try to insert, if not json encode error, if success json
            //encode success and unique id for user to find ticket later
        }catch(SQLiteException $e){
            return $e;
        }


    }

    /**
     *
     */
    function getTicket($uid){

    }

    function updateTicket($uid, $_POST){

    }
}