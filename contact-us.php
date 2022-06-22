<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include 'inc/header.php';
echo '<main>';

include 'inc/offices.php';
include 'inc/contactMessages.php';
hasMessages('contact');
include 'inc/contact.php';
include 'inc/newsMessages.php';
hasMessages('news');
include 'inc/newsletter.php';
echo '</main>';
include 'inc/footer.php';
session_unset();
session_destroy();
