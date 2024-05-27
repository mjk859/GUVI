<?php
$host = 'localhost';
$db = 'your_database';
$user = 'your_username';
$pass = 'your_password';

try {
    $mysqli = new mysqli($host, $user, $pass, $db);
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
} catch (Exception $e) {
    die('Database connection error: ' . $e->getMessage());
}

require 'vendor/autoload.php'; // Include Composer autoload file
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$mongoDB = $mongoClient->your_mongo_database;
?>
