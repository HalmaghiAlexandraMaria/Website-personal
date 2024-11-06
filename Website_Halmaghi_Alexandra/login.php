<?php
include 'config.php';

if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['password'];

    // Verificare utilizator în baza de date
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Login reușit - Redirecționare către index.php
            header("Location: index.html");
            exit(); // Oprește execuția pentru a preveni alte erori
        } else {
            echo "Parolă incorectă.";
        }
    } else {
        echo "Utilizator inexistent.";
    }
    $stmt->close();
}
$conn->close();
?>