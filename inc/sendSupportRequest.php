<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
};
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $company = htmlspecialchars($_POST['company']);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telephone = htmlspecialchars($_POST['telephone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    if (isset($_POST['opt-in'])) {
        $marketing = filter_input(INPUT_POST, 'opt-in', FILTER_SANITIZE_NUMBER_INT);
    } else {
        $marketing = 0;
    }
    $datePosted = date("Y-m-d H:i:s");

    $validForm = contactFormValidation($name, $email, $telephone, $subject, $message);
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


