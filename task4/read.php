<?php
 
include 'db.php';
header("Content-Type: application/json");
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $users[] = $row;
  }
}

echo json_encode($users, JSON_PRETTY_PRINT);
$conn->close();
?>
