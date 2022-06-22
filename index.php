<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
};
include 'inc/header.php';
echo '<main>';
include 'inc/banner.php';
include 'inc/services.php';
include 'inc/about.php';
include 'inc/latest.php';
include 'inc/clients.php';
include 'inc/newsMessages.php';
hasMessages('news');
include 'inc/newsletter.php';
echo '</main>';
include 'inc/footer.php';
session_unset();
session_destroy();
