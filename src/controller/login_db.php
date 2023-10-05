<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["email"] !== "" && $_POST["password"] !== "") {
    require_once("../connection/connection.php");
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $statement = $mysqli->query("SELECT * FROM users WHERE email='$email';");

        if ($statement->num_rows === 1) {
            $data = $statement->fetch_assoc();

            if (true){//(password_verify($password, $data["password"])) {
                session_start();

                $_SESSION["user_data"] = $data;
                if ($data["roll_id"] === "admin") {
                    header("location: ../views/admin/index.php");
                } else if ($data["roll_id"] === "teacher") {
                    header("location: ../views/maestro/index.php");
                } else {
                    header("location: ../views/alumno/index.php");
                }
            } else {
                echo "as credenciais não correspondem";
            }
        } else {
            echo "as credenciais não correspondem";
        };
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Not accessing from POST";
}
