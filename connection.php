<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bank";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if($con){
        //echo "connection OK";
    }
    else{
        echo "Connecton Failed";
    }
    

?>