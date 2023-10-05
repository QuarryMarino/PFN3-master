<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_id"])) {
    require_once("../connection/connection.php");
    $classId = $_POST["delete_id"];

    if ($classId) {
        $stmt = $mysqli->prepare("DELETE FROM classes WHERE id = ?");
        $stmt->bind_param('i', $classId);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Class deleted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "atabase error: " . $mysqli->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Class ID is missing"]);
    }
} else {
    // Handle invalid request method (GET or other)
    echo json_encode(["error" => "Invalid request method"]);
}

// Close the database connection
$mysqli->close();
