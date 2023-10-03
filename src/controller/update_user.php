<?php
require_once("../connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = isset($_POST["userId"]) ? $_POST["userId"] : null;
    $name = $_POST["name"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $nacimiento = $_POST["nacimiento"];
    $direccion = $_POST["direccion"];
    $contra = isset($_POST["contra"]) ? password_hash($_POST["contra"], PASSWORD_DEFAULT) : null; 
    if ($userId) {
        if ($password) {
            $stmt = $mysqli->prepare("UPDATE users SET name = ?, apellido = ?, email = ?, 
                birthdate = ?, address = ?, contra = ? WHERE id = ?");
            $stmt->bind_param('ssssssi', $name, $apellido, $email, $nacimiento, $direccion, $contra, $userId);
        } else {
            $stmt = $mysqli->prepare("UPDATE users SET name = ?, apellido = ?, email = ?, 
                nacimiento = ?, direccion = ? WHERE id = ?");
            $stmt->bind_param('sssssi', $name, $apellido, $email, $nacimiento, $direccion, $userId);
        }

        if ($stmt->execute()) {
            $statement = $mysqli->query("SELECT * FROM users WHERE id='$userId';");
            $data = $statement->fetch_assoc();
            session_start();
            $_SESSION["user_data"] = $data;
            echo json_encode(["message" => "User updated successfully"]);
            if ($data["roll"] === "admin") {
                header("location: ../views/admin/index.php");
            } else if ($data["roll"] === "teacher") {
                header("location: ../views/maestro/index.php");
            } else {
                header("location: ../views/alumno/index.php");
            }
        } else {
            echo json_encode(["error" => "Database error: " . $mysqli->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "User ID is missing"]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}
