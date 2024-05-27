<?php
require 'config.php';

header('Content-Type: application/json');

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

if ($stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)")) {
    $stmt->bind_param("sss", $username, $email, $password);
    
    if ($stmt->execute()) {
        $userId = $mysqli->insert_id;

        $userProfile = [
            '_id' => $userId,
            'username' => $username,
            'email' => $email,
            'created_at' => new MongoDB\BSON\UTCDateTime()
        ];

        $mongoDB->users->insertOne($userProfile);

        echo json_encode(['message' => 'Registration successful']);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Registration failed']);
    }

    $stmt->close();
} else {
    http_response_code(500);
    echo json_encode(['message' => 'Database error']);
}

$mysqli->close();
?>
