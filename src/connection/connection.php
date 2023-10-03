<?php
try {
    $mysqli = new mysqli("localhost", "root", "", "Proyect_Finish3");
} catch (mysqli_sql_exception $e) {
    echo "ERROR: " . $e->getMessage();
}
