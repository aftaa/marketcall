<?php

/*
 * 3. Написать на PHP парсер html страницы (на входе url), который на выходе будет отображать количество
 * и название всех используемых html тегов. Использование готовых парсеров и библиотек запрещено.
 * (обязательно использование ООП подхода, демонстрирующее взаимодействие объектов)
 */

if (PHP_VERSION < '7.2') {
    echo 'Minimum PHP version is 7.2';
    exit();
}

use core\BadUrlException;
use core\PageBuilder;
use core\Url;
use core\UrlLoaderException;

require_once 'config.php';

if (!empty($_REQUEST['go'])) {
    $error = '';

    try {
        $url = new Url($_REQUEST['url']);
        $pageBuilder = new PageBuilder($url);
        $page = $pageBuilder->buildPage();
    } catch (BadUrlException|UrlLoaderException $e) {
        $error = $e->getMessage();
    } catch (Exception $e) {
        $error = "Неизвестная ошибка: {$e->getMessage()}";
    }
}

require_once 'index.htm';