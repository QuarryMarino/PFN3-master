<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("../connection/connection.php");
    $name = $_POST["name"] ?? "";
    $apellido = $_POST["apellido"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $nacimiento = $_POST["Nacimiento"] ?? "";
    $clases = $_POST["clases"] ?? '';
    $roll = $_POST["roll_id"] ?? "";
    $direccion = $_POST["direccion"] ?? "";
    

    
   if (empty($name) || empty($apellido) || empty($email) || empty($password) || empty($nacimiento) || empty($roll)) {
        $error_message = "campos obligatorios";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

       $stmt = $mysqli->prepare("INSERT INTO users (name, apellido, email, password, Nacimiento, clases, roll_id, direccion)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssssssss', $name, $apellido, $email, $password, $nacimiento, $clases, $roll, $direccion);


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
