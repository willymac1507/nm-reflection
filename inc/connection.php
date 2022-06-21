<?php

try {
//    $db = new PDO("mysql:host=localhost:8889;dbname=netmatters_reflection;", "root", "root");
    $db = new PDO("mysql:host=localhost:3306;dbname=willmccl_netmatters_reflection;", "willmccl_admin", 'MyDbAdmin01!');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Unable to connect to the database.";
    echo $e->getMessage();
    exit;
}
