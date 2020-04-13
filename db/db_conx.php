<?php
    include_once("db_conf.php");
    $db_conx = mysqli_connect($db_address, $db_username, $db_pass, $db_schema);
    // Evaluate the connection
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
        exit();
    } else {
        echo "Successful database connection, happy coding!!!";
    }
?>