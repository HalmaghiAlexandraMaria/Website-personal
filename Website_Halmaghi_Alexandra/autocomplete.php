<?php
include 'config.php';

$searchTerm = $_GET['term'];
$sql = "SELECT username FROM users WHERE username LIKE ?";
$stmt = $conn->prepare($sql);
$term = "%" . $searchTerm . "%";
$stmt->bind_param("s", $term);
$stmt->execute();
$result = $stmt->get_result();

$usernames = [];
while ($row = $result->fetch_assoc()) {
    $usernames[] = $row['username'];
}

echo json_encode($usernames);
$stmt->close();
$conn->close();
?>