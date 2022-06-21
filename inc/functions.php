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
 * form validation function
 * @param $name
 * @param $email
 * @param $telephone
 * @param $subject
 * @param $message
 * @return array|null
 */
function formValidation($name, $email, $telephone, $subject, $message): ?array
{
    $outcome = false;
    if ($outcome) {
        return null;
    } else {
        return ['Your name is required.', 'This is not a valid email address.'];
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