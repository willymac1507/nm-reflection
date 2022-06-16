<?php

include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    if (isset($_POST['opt-in'])) {
        $marketing = filter_input(INPUT_POST, 'opt-in', FILTER_SANITIZE_NUMBER_INT);
    } else {
        $marketing = 0;
    }
    $datePosted = date("Y-m-d H:i:s");
}

if (addContact($name, $company, $email, $telephone, $subject, $message, $marketing, $datePosted)) {
//    echo '<h1>Success</h1>';
//    echo '<p>Name: '. $name . '</p>';
//    echo '<p>Company: '. $company . '</p>';
//    echo '<p>Email: '. $email . '</p>';
//    echo '<p>Telephone: '. $telephone . '</p>';
//    echo '<p>Subject: '. $subject . '</p>';
//    echo '<p>Message: '. $message . '</p>';
//    echo '<p>Opt-in: '. $marketing . '</p>';
    header('Location: /../contact-us.php?success=1');
} else {
    header('Location: /../contact-us.php?success=0');
}


