<?php

    $DB_host = getenv('IP');
    $DB_user = getenv('C9_USER');
    $DB_pass = "";
    $DB_name = "c9";
    
try{
    $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    var_dump($DB_con);
}catch(PDOException $e){
    echo $e->getMessage();
}

//include_once 'class.crud.php';

//$crud = new crud($DB_con);

?>