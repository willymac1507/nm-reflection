<?php

include 'bootstrap.php';

$username = $_SERVER['DB_USER'];
$password = $_SERVER['DB_PASS'];
$dsn = $_SERVER['DB_DSN'];

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Unable to connect to the database.";
    echo $e->getMessage();
    exit;
}
