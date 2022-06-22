<?php
session_start();
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $referrer = $_GET['referrer'];
    $name = htmlspecialchars($_POST['name']);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (isset($_POST['opt-in'])) {
        $marketing = filter_input(INPUT_POST, 'opt-in', FILTER_SANITIZE_NUMBER_INT);
    } else {
        $marketing = 0;
    }
    $datePosted = date("Y-m-d H:i:s");

    $validForm = newsFormValidation($name, $email);
    if (!empty($validForm)) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['errors'] = $validForm;
        header('Location: ' . $referrer . '?message=3#newsMessages');
        exit();
    }

    if (addSubscriber($name, $email, $marketing, $datePosted)) {
        header('Location: ' . $referrer . '?message=4#newsMessages');
    } else {
        header('Location: ' . $referrer . '?message=5#newsMessages');
    }
}


