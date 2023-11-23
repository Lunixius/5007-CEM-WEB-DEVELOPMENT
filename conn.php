<?php
session_start();

// Database credentials
$db_host = 'localhost';
$db_name = 'forum';
$db_username = 'root';
$db_password = '';

// Create a PDO instance
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Fatal Error: Connection Failed! " . $e->getMessage());
}
?>
