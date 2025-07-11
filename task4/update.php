<?php
header("Content-Type: application/json");
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id) && isset($data->fname) && isset($data->lname)) {
    $stmt = $conn->prepare("UPDATE users SET fname = ?, lname = ? WHERE id = ?");
    $stmt->bind_param("ssi", $data->fname, $data->lname, $data->id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "User updated"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Update failed"]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Missing id or name data"]);
}

$conn->close();
?>
