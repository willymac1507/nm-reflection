<?php
session_start();
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

    $validForm = formValidation($name, $email, $telephone, $subject, $message);
    if (!empty($validForm)) {
        $_SESSION['name'] = $name;
        $_SESSION['company'] = $company;
        $_SESSION['email'] = $email;
        $_SESSION['telephone'] = $telephone;
        $_SESSION['subject'] = $subject;
        $_SESSION['message'] = $message;
        $_SESSION['errors'] = $validForm;

        header('Location: ../contact-us.php?message=2#messages');
        exit();
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
        header('Location: ../contact-us.php?message=1#messages');
    } else {
        header('Location: ../contact-us.php?message=0#messages');
    }
}


