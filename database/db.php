<?php
///Lets Connecting the Database With PHP...
//Make Array For All Data to Database Connection..
    $db['db_host'] = "localhost";
    $db['db_user'] = "root";
    $db['db_pass'] = "";
    $db['db_name'] = "cms_app";

    //Loop Throw Here and make Const (Global Variable)...
    foreach($db as $key => $value){
        define(strtoupper($key), $value, false);
    }

    //use the Variables (Const) for MySQLi Connection..
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Checking the Connection..
    if(!$connection){
        die("Database Connection ERROR! ".mysqli_errno($connection));
    }

    //Successful Connection..
    // echo "Database is Connected!";
?>
