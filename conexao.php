<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "bduda2025";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>