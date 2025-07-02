<?php
include 'db.php';
$sql = "create table users (
id int auto_increment primary key  ,
fname varchar(100) not null ,
lname varchar(100) not null
)";
$conn->query($sql);
$sql= "insert into users (fname,lname) values ('ahmed' , 'mahamed')";
$conn->query($sql);
$sql= "insert into users (fname,lname) values ('omar' , 'hany')";
$conn->query($sql);
$sql= "insert into users (fname,lname) values ('abdo' , 'mahamed')";
$conn->query($sql);
$sql= "insert into users (fname,lname) values ('sayed' , 'mahamed')";
$conn->query($sql)
?>