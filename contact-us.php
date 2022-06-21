<?php
session_start();
include 'inc/header.php';
echo '<main>';

include 'inc/offices.php';
include 'inc/messages.php';
if (isset($_GET['message'])) {
    if ($_GET['message'] == 1) {
        echo '<div class="message--success">'
            . 'Thanks. Your request has been sent, and we will be in touch!'
            . '</div>';
    } elseif ($_GET['message'] == 0) {
        echo '<div class="message--failure">'
            . 'Sorry. There was an error sending your request. Please try again.'
            . '</div>';
    } elseif ($_GET['message'] == 2) {
        foreach ($_SESSION['errors'] as $error) {
            echo '<div class="message--failure">'
                . $error
                . '</div>';
        }
    }
}
include 'inc/contact.php';
include 'inc/newsletter.php';
echo '</main>';
include 'inc/footer.php';
session_unset();
session_destroy();
