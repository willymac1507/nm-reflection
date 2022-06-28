<?php

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
if (getenv('APP_ENV') != 'production') {
    $dotenv->safeLoad();
}
$dotenv->required([
    'DB_DSN',
    'DB_USER',
    'DB_PASS'
]);
