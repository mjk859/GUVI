<?php
require 'config.php';

header('Content-Type: application/json');

session_start();
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['message' => 'Not authenticated']);
    exit();
}

$userId = $_SESSION['user_id'];

$userProfile = $mongoDB->users->findOne(['_id' => $userId]);

if ($userProfile) {
    echo json_encode($userProfile);
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Profile not found']);
}
?>
