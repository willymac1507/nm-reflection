<?php
include 'inc/header.php';
echo '<main>';
if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
        echo '<div class="message--success">'
            . 'Thanks. Your request has been sent, and we will be in touch!'
            . '</div>';
    } else {
        echo '<div class="message--failure">'
            . 'Sorry. There was an error sending your request. Please try again.'
            . '</div>';
    }
}
include 'inc/offices.php';
include 'inc/contact.php';
include 'inc/newsletter.php';
echo '</main>';
include 'inc/footer.php';
