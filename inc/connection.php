<?php

try {
    $db = new PDO("mysql:host=localhost:8889;dbname=netmatters_reflection;", "root", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Unable to connect to the database.";
    echo $e->getMessage();
    exit;
}
