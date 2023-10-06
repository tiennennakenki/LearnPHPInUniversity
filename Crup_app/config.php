<?php
    const DBHOST = 'localhost';
    const DBUSER = 'root';
    const DBPASS = '';
    const DBNAME = 'crup_app';

    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

    if($conn->connect_error){
        die("Could not connect database". $conn->connect_error);
    }
    
?>