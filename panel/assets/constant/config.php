<?php
date_default_timezone_set('Asia/Kolkata');

$host = "localhost";   // Database host
$dbname = "gym_erp"; // Database name
$username = "root";    // DB username
$password = "";        // DB password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Set PDO error mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected successfully!";
} 
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
