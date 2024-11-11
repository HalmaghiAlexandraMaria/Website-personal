<?php
$servername = "localhost";
$username = "root";
$password = ""; // parola implicită este goală
$dbname = "login_system";

// Crearea conexiunii
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Conexiunea a eșuat: " . $conn->connect_error);
}
?>