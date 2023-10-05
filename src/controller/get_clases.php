<?php
require_once("../connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $stmt = $mysqli->prepare("SELECT clases.*, users.name AS teacher_name, users.apellido AS teacher_apellido FROM clases LEFT JOIN users ON clases.id_teacher = users.id");

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $class = $result->fetch_all(MYSQLI_ASSOC);

        if ($class) {
            echo json_encode($class);
        } else {
            echo json_encode(["error" => "Class not found"]);
        }
    } else {
        echo json_encode(["error" => "Database error: " . $mysqli->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid request method"]);
}