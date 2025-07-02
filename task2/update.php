<?php
include 'db.php';
$sql = "update users set fname = 'omar' where lname = 'abdo'  " ;
$conn->query($sql);
$sql = "update users set fname = 'omar' where lname = 'sayed'  " ;
$conn->query($sql);

?>