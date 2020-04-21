<?php
    $jsonString = file_get_contents("db/db_conf.json");
    $db = json_decode($jsonString, true);
    $db_conx = mysqli_connect($db['db_address'], $db['db_user'], $db['db_pass'], $db['db_name']);
        if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
            exit();
        }
    include_once("db_vars.php");
?>