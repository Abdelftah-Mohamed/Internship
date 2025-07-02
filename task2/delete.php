<?php
include 'db.php';
$sql = "delete  from users where fname = 'omar' ";
$conn->query($sql);
?>