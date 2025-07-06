<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    $conn->query($sql);
}
header("Location: read.php");
exit();
?>
