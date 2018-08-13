<?php

/*

 * Подключаем библиотеку

 */

require_once 'phpQuery/phpQuery.php';

require_once 'phpQuery/lib.php';



/*

 *Показываем все ошибки и увеличиваем время выполнения скрипта до 1го часа

 */

ini_set('error_reporting', E_ALL);

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

ini_set('max_execution_time', 3600);

$url = 'https://kupi-skovorodu.ru/catalog/blinnye/';
$headers = get_headers($url, 1);


// print 'First step gave: ' . $headers[0] . '<br />';

// uncomment below to see the different redirection URLs
// print_r($headers['Location']);

// $headers['Location'] will contain either the redirect URL, or an array
// of redirection URLs
$first_redirect_url = isset($headers['Location'][0]) ?
    $headers['Location'][1] : $headers['Location'];

//print "First redirection is to: {$first_redirect_url}<br />";

// assuming you have fopen wrappers enabled...
$start_page =  file_get_contents($first_redirect_url);
$start_page = $pars->curl($first_redirect_url);
//https://kupi-skovorodu.ru/catalog/blinnye/
$start_page = phpQuery::newDocumentHTML($start_page, $charset = 'utf-8');


$start_page = $start_page->find('.catalogProducts .lineProducts:first-child');
// echo "<pre>";
// var_dump($start_page);
// echo "</pre>";
$products = array();



foreach ($start_page->find('li') as $key => $value){
    $products['names'][] = trim(pq($value)->find('.ga-catalogClickName')->text());

    $products['brands'][] = trim(pq($value)->find('.brandHref')->text());

    $products['art_number'][] = pq($value)->find('.artnumber')->text();

    $products['images'][] =  'https://kupi-skovorodu.ru' . pq($value)->find('.ga-catalogClickPhotoItem img')->attr('src');

    $products['links'][] =  'https://kupi-skovorodu.ru' . pq($value)->find('.ga-catalogClickPhotoItem')->attr('href');

    $products['prices'][] = substr(pq($value)->find('p.price')->text(), 0, -6);

}

// echo "<pre>";
// print_r($products);
// echo "</pre>";

$large_image_link = array();

foreach ($products['links'] as $link) {

    $start_page = $pars->curl($link);

    $start_page = phpQuery::newDocumentHTML($start_page, $charset = 'utf-8');



    $large_image_link[] = 'https://kupi-skovorodu.ru' .  $start_page->find('.imgBig > img')->attr('src');

}