<?php
header("Content-Type: application/json");
include 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->fname) && isset($data->lname)) {
    $stmt = $conn->prepare("INSERT INTO users (fname, lname) VALUES (?, ?)");
    $stmt->bind_param("ss", $data->fname, $data->lname);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "User inserted"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Insert failed"]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Missing fname or lname"]);
}

$conn->close();
?>
