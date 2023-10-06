<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test_connection_php";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed:" . mysqli_connect_error());
    }
    else{
        echo "Thành công</br>";
    }
?>