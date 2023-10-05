<<?php
require_once("../connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = isset($_POST["userId"]) ? $_POST["userId"] : null;
    $name = $_POST["name"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $nacimiento = $_POST["nacimiento"];
    $direccion = $_POST["direccion"];
    $password = isset($_POST["password"]) ? password_hash($_POST["password"], PASSWORD_DEFAULT) : null;

    if (!$userId) {
        echo json_encode(["error" => "User ID is missing"]);
        exit;
    }

    // Validación y filtrado de datos
    // ...

    if ($password) {
        $stmt = $mysqli->prepare("UPDATE users SET name = ?, apellido = ?, email = ?, 
            nacimiento = ?, direccion = ?, password = ? WHERE id = ?");
        $stmt->bind_param('ssssssi', $name, $apellido, $email, $nacimiento, $direccion, $password, $userId);
        header("location: ../views/admin/index.php");
    } else {
        $stmt = $mysqli->prepare("UPDATE users SET name = ?, apellido = ?, email = ?, 
            nacimiento = ?, direccion = ? WHERE id = ?");
        $stmt->bind_param('sssssi', $name, $apellido, $email, $nacimiento, $direccion, $userId);
        header("location: ../views/admin/index.php");   
    }

    if ($stmt->execute()) {
        // Actualización exitosa, redirige aquí
    } else {
        echo json_encode(["error" => "Database error: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid request method"]);
}
