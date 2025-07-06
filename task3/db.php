<?php
$host = "localhost";
$user = "root";       
$pass = "";           
$dbname = "curd_api";

 $conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("fail to connect " . $conn->connect_error);
} else {
    echo "connect to data base <br>";
}
?>