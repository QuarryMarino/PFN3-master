<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("../connection/connection.php");
    $name = $_POST["name"] ?? "";
    $apellido = $_POST["apellido"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $Nacimiento = $_POST["Nacimiento"] ?? "";
    $clases = $_POST["clases"] ?? null;
    $roll = $_POST["roll_id"] ?? "";
    $direccion = $_POST["direccion"] ?? "";

    
   if (empty($name) || empty($apellido) || empty($email) || empty($password) || empty($nacimiento) || empty($roll)) {
        $error_message = "All fields are required";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $mysqli->prepare("INSERT INTO users (name, apellido, email, password, nacimiento, classes, roll_id, direccion)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssssss', $name, $apellido, $email, $password, $nacimiento, $classes, $roll_id, $direccion);

        if ($stmt->execute()) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            $error_message = "Database error: " . $mysqli->error;
        }

        $stmt->close();
    }
} else {
    $error_message = "Invalid request method";
}

if (isset($error_message)) {
    echo '<script>alert("' . $error_message . '");</script>';
}
