<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php'; // Include fișierul de configurare pentru conexiunea la baza de date

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

// Verificăm dacă formularul a fost trimis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preluăm datele din formular
    $email = $_POST['email'];
    $username = $_POST['new_user'];
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT); // Hash parola pentru securitate

    // Pregătim interogarea SQL pentru a preveni injecția SQL
    $sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Eroare la pregătirea interogării: " . $conn->error;
        exit;
    }

    // Legăm parametrii la interogare
    $stmt->bind_param("sss", $email, $username, $password);

    // Executăm interogarea
    if ($stmt->execute()) {
        // Înregistrare reușită - Redirecționare către pagina de login
        header("Location: login.html");
        exit(); // Oprește execuția pentru a preveni alte erori
    } else {
        echo "Eroare la înregistrare: " . $stmt->error;
    }

    // Închidem declarația pregătită
    $stmt->close();
}

// Închidem conexiunea la baza de date
$conn->close();
?>