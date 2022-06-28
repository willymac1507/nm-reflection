<?php

/**
 * @return array
 */
function getAllLatest(): array
{
    include 'connection.php';
    $query = 'SELECT * FROM latest_cards ORDER BY posted_date DESC LIMIT 3';
    $results = $db->prepare($query);
    $results->execute();
    return $results->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * @return array
 */
function getAllOffices(): array
{
    include 'connection.php';
    $query = 'SELECT * FROM offices';
    $results = $db->prepare($query);
    $results->execute();
    return $results->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * @param $latest
 * @return string
 */
function getLatestCardHtml($latest): string
{
    try {
        $posted_date = new DateTime($latest['posted_date']);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit();
    }
    return '<div class="card card--latest latest--' . $latest['department'] . '">'
        . '<a href="#" class="latest__image">'
        . '<img src="' . $latest['title_img'] . '" alt="' . $latest['title_name'] . '"></a>'
        . '<a href="#" class="button button--news">news</a>'
        . '<a href="#" class="latest__headline">' . $latest['headline'] . '</a>'
        . '<p class="latest__content">' . $latest['content'] . '</p>'
        . '<button class="button button--latest" >read more</button >'
        . '<div class="poster">'
        . '<img class="poster__avatar" src="' . $latest['posted_img'] . '" alt = "logo">'
        . '<div class="poster__details">'
        . '<div class="poster__name">' . $latest['posted_by'] . '</div >'
        . '<div class="poster__date">' . date_format($posted_date, 'jS F Y') . '</div>'
        . '</div>'
        . '</div>'
        . '</div>';
}

/**
 * @param $office
 * @return string
 */
function getOfficeCardHtml($office): string
{
    return '<div class="office__container">'
        . '<div class="card card--office">'
        . '<img src="' . $office['image'] . '" alt="' . $office['name'] . '" class="office__image">'
        . '<div>'
        . '<a href="#" class="office__name">' . $office['name'] . '</a>'
        . '<div class="office__address">'
        . $office['addr1'] . '<br>'
        . $office['addr2'] . '<br>'
        . $office['addr3'] . '<br>'
        . $office['addr4'] . '<br>'
        . $office['postcode']
        . '</div>'
        . '<a href = "#" class="office__phone">' . $office['phone'] . '</a>'
        . '<button class="button button--office">view more</button>'
        . '</div></div>'
        . '<div>'
        . '<div class="map--responsive" >'
        . '<iframe '
        . 'src="' . $office['map-src'] . '" '
        . 'width="100%" height = "100%" style = "border:0;" allowfullscreen = "" '
        . 'loading = "lazy" referrerpolicy = "no-referrer-when-downgrade"></iframe>'
        . '</div></div></div>';
}

/**
 * @return array
 */
function buildBreadcrumbs(): array
{
    $crumbArray = [];
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

    foreach ($path as $page) {
        $crumbName = str_replace(['_', '-'], ' ', $page);
        $crumbName = str_replace(['.php', '.html'], '', $crumbName);
        $crumbName = ucwords($crumbName);
        $crumbArray[] = $crumbName;
    }

    return $crumbArray;
}

/**
 * @param $section
 * @return void
 */
function hasMessages($section): void
{
    if ($section == 'contact') {
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
                if (isset($_SESSION['errors'])) {
                    foreach ($_SESSION['errors'] as $error) {
                        echo '<div class="message--failure">The '
                            . $error['field'] . ' is ' . $error['error']
                            . '</div>';
                    }
                }
            }
        }
    } elseif ($section == 'news') {
        if (isset($_GET['message'])) {
            if ($_GET['message'] == 3) {
                if (isset($_SESSION['errors'])) {
                    foreach ($_SESSION['errors'] as $error) {
                        echo '<div class="message--failure">The '
                            . $error['field'] . ' is ' . $error['error']
                            . '</div>';
                    }
                }
            } elseif ($_GET['message'] == 4) {
                echo '<div class="message--success">'
                    . 'Thanks. Your request has been sent, and we will be in touch!'
                    . '</div>';
            } elseif ($_GET['message'] == 5) {
                echo '<div class="message--failure">'
                    . 'Sorry. There was an error sending your request. Please try again.'
                    . '</div>';
            }
        }
    }
}

/**
 * form validation function
 * @param $name
 * @param $email
 * @param $telephone
 * @param $subject
 * @param $message
 * @return array|null
 */
function contactFormValidation($name, $email, $telephone, $subject, $message): ?array
{
    $errors = [];
    $phonePattern = '/^(?:(?:\(?(?:0(?:0|11)\)?[\s-]?\(?|\+)44\)?[\s-]?(?:\(?0\)?[\s-]?)?)|(?:\(?0))(?:(?:\d{5}\)' .
        '?[\s-]?\d{4,5})|(?:\d{4}\)?[\s-]?(?:\d{5}|\d{3}[\s-]?\d{3}))|(?:\d{3}\)?[\s-]?\d{3}[\s-]?\d{3,4})|(?:\d' .
        '{2}\)?[\s-]?\d{4}[\s-]?\d{4}))(?:[\s-]?(?:x|ext\.?|\#)\d{3,4})?$/';
    $emailPattern = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[\d{1,3}\.\d{1,3}\.\d' .
        '{1,3}\.\d{1,3}])|(([a-zA-Z\-\d]+\.)+[a-zA-Z]{2,}))$/';
    if (strlen($name) == 0) {
        $errors[] = array("field"=>"name", "error"=>"blank", "id"=>"contact-name");
    }
    if (strlen($email) == 0) {
        $errors[] = array("field"=>"email", "error"=>"blank", "id"=>"contact-email");
    } else {
        if (!preg_match($emailPattern, $email) == 1) {
            $errors[] = array("field"=>"email", "error"=>"invalid", "id"=>"contact-email");
        }
    }
    if (strlen($telephone) == 0) {
        $errors[] = array("field"=>"telephone", "error"=>"blank", "id"=>"contact-tel");
    } else {
        if (!preg_match($phonePattern, $telephone) == 1) {
            $errors[] = array("field"=>"telephone", "error"=>"invalid", "id"=>"contact-tel");
        }
    }
    if (strlen($subject) == 0) {
        $errors[] = array("field"=>"subject", "error"=>"blank", "id"=>"contact-subject");
    }
    if (strlen($message) == 0) {
        $errors[] = array("field"=>"message", "error"=>"blank", "id"=>"contact-message");
    }
    if (!count($errors) == 0) {
        return $errors;
    } else {
        return null;
    }
}

/**
 * form validation function
 * @param $name
 * @param $email
 * @return array|null
 */
function newsFormValidation($name, $email): ?array
{
    $errors = [];
    $pattern = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}' .
        '])|(([a-zA-Z\-\d]+\.)+[a-zA-Z]{2,}))$/';
    if (strlen($name) == 0) {
        $errors[] = array("field"=>"name", "error"=>"blank", "id"=>"news-name");
    }
    if (strlen($email) == 0) {
        $errors[] = array("field"=>"email", "error"=>"blank", "id"=>"news-email");
    } else {
        if (!preg_match($pattern, $email) == 1) {
            $errors[] = array("field"=>"email", "error"=>"invalid", "id"=>"news-email");
        }
    }
    if (!count($errors) == 0) {
        return $errors;
    } else {
        return null;
    }
}

/**
 * @param $name
 * @param $company
 * @param $email
 * @param $telephone
 * @param $subject
 * @param $message
 * @param $marketing
 * @param $datePosted
 * @return bool
 */
function addContact($name, $company, $email, $telephone, $subject, $message, $marketing, $datePosted): bool
{
    include 'connection.php';
    $sql = "INSERT INTO contacts (name, company, email, telephone, subject, message, marketing, date_posted)"
        . "VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $query = $db->prepare($sql);
    $query->bindParam(1, $name, PDO::PARAM_STR);
    $query->bindParam(2, $company, PDO::PARAM_STR);
    $query->bindParam(3, $email, PDO::PARAM_STR);
    $query->bindParam(4, $telephone, PDO::PARAM_STR);
    $query->bindParam(5, $subject, PDO::PARAM_STR);
    $query->bindParam(6, $message, PDO::PARAM_STR);
    $query->bindParam(7, $marketing, PDO::PARAM_BOOL);
    $query->bindParam(8, $datePosted, PDO::PARAM_STR);
    try {
        $query->execute();
        return true;
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage();
        return false;
    }
}

/**
 * @param $name
 * @param $email
 * @param $marketing
 * @param $date_posted
 * @return bool
 */
function addSubscriber($name, $email, $marketing, $date_posted): bool
{
    include 'connection.php';
    $sql = "INSERT INTO subscribers (name, email, date_posted, marketing)"
        . "VALUES (?, ?, ?, ?)";
    $query = $db->prepare($sql);
    $query->bindParam(1, $name, PDO::PARAM_STR);
    $query->bindParam(2, $email, PDO::PARAM_STR);
    $query->bindParam(3, $date_posted, PDO::PARAM_STR);
    $query->bindParam(4, $marketing, PDO::PARAM_STR);
    try {
        $query->execute();
        return true;
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage();
        return false;
    }
}