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