<?php
require 'config.php';

header('Content-Type: application/json');

$email = $_POST['email'];
$password = $_POST['password'];

if ($stmt = $mysqli->prepare("SELECT id, password FROM users WHERE email = ?")) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        session_start();
        $_SESSION['user_id'] = $id;
        echo json_encode(['message' => 'Login successful']);
    } else {
        http_response_code(401);
        echo json_encode(['message' => 'Invalid email or password']);
    }

    $stmt->close();
} else {
    http_response_code(500);
    echo json_encode(['message' => 'Database error']);
}

$mysqli->close();
?>
