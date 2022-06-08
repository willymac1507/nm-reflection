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
