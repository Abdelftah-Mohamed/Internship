<?php
header("Content-Type: application/json");
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id)) {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $data->id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "User deleted"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Delete failed"]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Missing id"]);
}

$conn->close();
?>
